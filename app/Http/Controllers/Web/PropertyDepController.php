<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\LangPost;
use Illuminate\Http\Request;
use App\Models\PropertyDep;
use App\Models\Property;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Dep\StoreDepRequest;
class PropertyDepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $List = PropertyDep::get();
        return view('admin.propertydep.show', ["List" => $List]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.propertydep.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepRequest $request)
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
      $newObj = new PropertyDep;
      $newObj->name = $formdata['name'];   
      $newObj->save();
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
    public function edit( $id)
    {
        $item = PropertyDep::find($id);
          $lang_list = Language::orderByDesc('is_default')->with(
            [
              'langposts' => function ($q) use ($id) {
                $q->where('dep_id', $id);
              }
            ]
          )->get();
          //
          //   return $item;
          return view("admin.propertydep.edit", ["item" => $item, 'lang_list' => $lang_list]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDepRequest $request,  $id)
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
              PropertyDep::find($id)->update([              
                'name' => $formdata['name'],               
              ]);         
          return response()->json("ok");
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = PropertyDep::find($id);
        if (!($item === null)) {
          //delete image
          // $medstor = new MediaStoreController();
          // $list = MediaPost::where('post_id', $id)->get();
          // foreach ($list as $mediapost) {
          //   $medstor->deleteimage($mediapost->media_id);
          // }
    
          //delete   MediaPost records
        //  MediaPost::where('post_id', $id)->delete();
        $propctrlr=new PropertyController();

     $proplist=   Property::where('dep_id', $id)->get();
     foreach($proplist as $proprow){
        $propctrlr->destroy($proprow->id);
     }
        LangPost::where('dep_id', $id)->delete();
        PropertyDep::find($id)->delete();
        }
        return redirect()->back();
    }
}
