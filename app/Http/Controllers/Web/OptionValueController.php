<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OptionValue;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Option\StoreOptionRequest;
use App\Models\Language;
use App\Models\LangPost;
class OptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $List = OptionValue::with('property.propertydep')->get();
        return view('admin.optionvalue.show', ["List" => $List]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $List = Property::with('propertydep')->where('is_multivalue', 1)->get();
        return view('admin.optionvalue.create', ['property_list' => $List]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionRequest $request)
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
//$prop=Property::find($formdata['property_id']);
$type= $formdata['type'];
            $newObj = new OptionValue();
            $newObj->name = $formdata['name'];
            $newObj->is_active = isset($formdata["is_active"]) ? 1 : 0;
            $newObj->type = $formdata['type'];
      
            $newObj->notes = $formdata['notes'];
            $newObj->property_id = $formdata['property_id'];
            if($type=='string'){
                $newObj->value = $formdata['op_val'];
            }else if($type=='integer'){
                $newObj->value_int = $formdata['op_val'];
            }
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
    public function edit(string $id)
    {
        $item = OptionValue::find($id);
        $List = Property::with('propertydep')->where('is_multivalue', 1)->get();
        $lang_list = Language::orderByDesc('is_default')->with(
            [
                'langposts' => function ($q) use ($id) {
                    $q->where('optionvalue_id', $id);
                }
            ]
        )->get();
        return view('admin.optionvalue.edit', ["item" => $item, 'lang_list' => $lang_list,'property_list' => $List]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOptionRequest $request, string $id)
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
//$prop=Property::find($formdata['property_id']);
$type= $formdata['type'];
            $newObj =  OptionValue::find($id);
         
            $newObj->name = $formdata['name'];
            $newObj->is_active = isset($formdata["is_active"]) ? 1 : 0;
            $newObj->type = $formdata['type'];
      
            $newObj->notes = $formdata['notes'];
            $newObj->property_id = $formdata['property_id'];
            if($type=='string'){
                $newObj->value = $formdata['op_val'];
            }else if($type=='integer'){
                $newObj->value_int = $formdata['op_val'];
            }
                 $newObj->save();
          
            return response()->json("ok");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $item = OptionValue::find($id);
        if (!($item === null)) {  
        LangPost::where('optionvalue_id', $id)->delete();
        OptionValue::find($id)->delete();
        }
        return redirect()->back();
    }
}
