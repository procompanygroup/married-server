<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OptionValue;
use App\Models\Property;
use App\Models\PropertyDep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use File;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Models\Language;
use App\Models\LangPost;
use App\Models\Country;
use App\Http\Controllers\Web\CountryController;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $List = Property::with('propertydep')->get();
        return view('admin.property.show', ["List" => $List]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $List = PropertyDep::get();
        return view('admin.property.create', ['dep_list' => $List]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $formdata = $request->all();
        $validator = Validator::make(
            $formdata,
            $request->rules(),
            $request->messages()
        );
        if ($validator->fails()) {
            return response()->json($validator);
        } else {

            $newObj = new Property();
            $newObj->name = $formdata['name'];
            $newObj->is_active = isset($formdata["is_active"]) ? 1 : 0;
            $newObj->type = $formdata['type'];
            $newObj->is_multivalue = isset($formdata["is_multivalue"]) ? 1 : 0;
            $newObj->notes = $formdata['notes'];
            $newObj->dep_id = $formdata['dep_id'];

            $newObj->save();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $this->storeImage($file, $newObj->id);
            }
            return response()->json("ok");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $List = PropertyDep::get();
        $item = Property::find($id);
        $lang_list = Language::orderByDesc('is_default')->with(
            [
                'langposts' => function ($q) use ($id) {
                    $q->where('property_id', $id);
                }
            ]
        )->get();
        return view('admin.property.edit', ["item" => $item, 'lang_list' => $lang_list, 'dep_list' => $List]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePropertyRequest $request, string $id)
    {
        $formdata = $request->all();
        $validator = Validator::make(
            $formdata,
            $request->rules(),
            $request->messages()
        );
        if ($validator->fails()) {
            return response()->json($validator);
        } else {
            Property::find($id)->update([
                'name' => $formdata['name'],
                'is_active' => isset($formdata["is_active"]) ? 1 : 0,
                'type' => $formdata['type'],
                'is_multivalue' => isset($formdata["is_multivalue"]) ? 1 : 0,
                'notes' => $formdata['notes'],
                'dep_id' => $formdata['dep_id'],

            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $this->storeImage($file, $id);
            }
            return response()->json("ok");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Property::find($id);
        if (!($item === null)) {
            //delete image
            $oldimagename = $item->image;
            $strgCtrlr = new StorageController();
            $path = $strgCtrlr->path['properties'];
            Storage::delete("public/" . $path . '/' . $oldimagename);

            $opctrlr = new OptionValueController();
            $optilist = OptionValue::where('property_id', $id)->get();
            foreach ($optilist as $optrow) {
                $opctrlr->destroy($optrow->id);
            }
            LangPost::where('property_id', $id)->delete();
            Property::find($id)->delete();
        }
        return redirect()->back();
    }
    public function storeImage($file, $id)
    {
        $imagemodel = Property::find($id);
        $oldimage = $imagemodel->image;
        $oldimagename = basename($oldimage);
        $strgCtrlr = new StorageController();
        $ext = $file->getClientOriginalExtension();


        $path = $strgCtrlr->path['properties'];

        if (Str::lower($ext) == 'svg') {
            if ($file !== null) {
                $ext = $file->getClientOriginalExtension();
                $filename = rand(10000, 99999) . $id . '.' . $ext;
                Storage::delete("public/" . $path . '/' . $oldimagename);
                $path = $file->storeAs($path, $filename, 'public');
                Property::find($id)->update([
                    "image" => $filename
                ]);
            }
        } else {
            if ($file !== null) {

                $filename = rand(10000, 99999) . $id . ".webp";
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image = $image->toWebp(75);
                if (!File::isDirectory(Storage::url('/' . $path))) {
                    Storage::makeDirectory('public/' . $path);
                }
                $image->save(storage_path('app/public') . '/' . $path . '/' . $filename);

                Property::find($id)->update([
                    "image" => $filename
                ]);
                Storage::delete("public/" . $path . '/' . $oldimagename);
            }
        }


        return 1;
    }
    public function byname(string $name, $lang)
    {
        //  $List = PropertyDep::get();
        $item = Property::where('name', $name)->with([
            'langposts' => function ($q) use ($lang) {
                $q->wherehas('language', function ($query) use ($lang) {
                    $query->where('code', $lang);
                });
            },
            'optionsvalues' => function ($q) use ($lang) {
                $q->with([
                    'langposts' => function ($query) use ($lang) {
                        $query->wherehas('language', function ($query) use ($lang) {
                            $query->where('code', $lang);

                        });
                    }
                ])->where('is_active', 1)
                ;
            }

        ])->first();

        return $item;
        //  return view('admin.property.edit', ["item" => $item, 'lang_list' => $lang_list, 'dep_list' => $List]);
    }

    public function propmap(Property $item)
    {
        $optionsvalues = $item->optionsvalues->map(function ($optionsvalue) {
            return [
                "id" => $optionsvalue->id,
                "name" => $optionsvalue->name,
                "value" => $optionsvalue->type == "integer" ? $optionsvalue->value_int : $optionsvalue->value,
                "tr_title" => $optionsvalue->langposts->first() ? $optionsvalue->langposts->first()->title_trans : $optionsvalue->name,
            ];
        });
        $itemArr = [
            "id" => $item->id,
            "name" => $item->name,
            "is_active" => $item->is_active,
            "type" => $item->type,
            'tr_title' => $item->langposts->first()? $item->langposts->first()->title_trans: $item->name,
            'optionsvalues' => $optionsvalues,
        ];

        return collect($itemArr);
    }

    public function propgroup($lang)
    {
        $countryctrlr = new CountryController();
        $countries = $countryctrlr->getAll();
        $prop = $this->byname('wife_num', $lang);
        $wife_num = $this->propmap($prop);

        $prop = $this->byname('family_status', $lang);
        $family_status = $this->propmap($prop);

        $prop = $this->byname('skin', $lang);
        $skin = $this->propmap($prop);
        $prop = $this->byname('body', $lang);
        $body = $this->propmap($prop);

        $prop = $this->byname('religiosity', $lang);
        $religiosity = $this->propmap($prop);
        $prop = $this->byname('prayer', $lang);
        $prayer = $this->propmap($prop);
        $prop = $this->byname('smoking', $lang);
        $smoking = $this->propmap($prop);

        $prop = $this->byname('beard', $lang);
        $beard = $this->propmap($prop);

        $prop = $this->byname('education', $lang);
        $education = $this->propmap($prop);

        $prop = $this->byname('work', $lang);
        $work = $this->propmap($prop);
        $prop = $this->byname('income', $lang);
        $income = $this->propmap($prop);

        $prop = $this->byname('financial', $lang);
        $financial = $this->propmap($prop);

        $prop = $this->byname('health', $lang);
        $health = $this->propmap($prop);

        $prop = $this->byname('wife_num_female', $lang);
        $wife_num_female = $this->propmap($prop);

        $prop = $this->byname('family_status_female', $lang);
        $family_status_female = $this->propmap($prop);

        $prop = $this->byname('veil', $lang);
        $veil = $this->propmap($prop);


        $groupArr = [
            'wife_num' => $wife_num,
            'family_status' => $family_status,
            'countries' => $countries,
            'skin' => $skin,
            'body' => $body,
            'religiosity' => $religiosity,
            'prayer' => $prayer,
            'smoking' => $smoking,
            'beard' => $beard,
            'education' => $education,
            'work' => $work,
            'income' => $income,
            'financial' => $financial,
            'health' => $health,
            'wife_num_female' => $wife_num_female,
            'family_status_female' => $family_status_female,
            'veil' => $veil,

        ];
        return $groupArr;
    }
}
