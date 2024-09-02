<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OptionGroup;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyDep;
use App\Models\OptionValue;
use App\Http\Requests\AiAdmin\StoreRangeRequest;
use Illuminate\Support\Facades\Validator;
class OptionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function save_range(StoreRangeRequest $request)
    {
        // StoreRangeRequest
        $formdata = $request->all();
        // return response()->json(  $formdata);
        $validator = Validator::make(
            $formdata,
            $request->rules(),
            $request->messages()
        );
        if ($validator->fails()) {
            return response()->json($validator);
        } else {

            $main_id = $formdata['mainop_id'];
            $group_opArr = $formdata['group_op'];
            $sel_op = OptionValue::find($main_id);
            $prop_id = $sel_op->property_id;
            OptionGroup::where('option_id', $main_id)->delete();
            $i = 1;
            foreach ($group_opArr as $group_id) {

                $newObj = new OptionGroup();
                $newObj->option_id = $main_id;
                $newObj->group_id = $group_id;
                $newObj->property_id = $prop_id;
                $newObj->priority = $i;
                // $newObj->notes = $formdata['notes'];
                // $newObj->min = $formdata['min'];
                // $newObj->max = $formdata['max'];
                $newObj->save();
                $i++;

            }
            //relegiosity
if(isset($formdata['group_op2'])){
    $group_opArr = $formdata['group_op2'];
    $group_prop_id=isset($formdata['group_prop_id'])?$formdata['group_prop_id']:null;
    OptionGroup::where('group_prop_id',$group_prop_id)->where('option_id',$main_id)->delete();
    $i = 1;
    foreach ($group_opArr as $group_id) {

        $newObj = new OptionGroup();
        $newObj->option_id = $main_id;
        $newObj->group_id = $group_id;
        $newObj->property_id = $prop_id;
        $newObj->group_prop_id = $group_prop_id;
        $newObj->priority = $i;
        // $newObj->notes = $formdata['notes'];
        // $newObj->min = $formdata['min'];
        // $newObj->max = $formdata['max'];
        $newObj->save();
        $i++;

    }
}

            return response()->json("ok");
        }
    }


    public function property_show()
    {
        $except_arr = ['serial_id', 'income', 'job', 'partner', 'about_me', 'residence', 'nationality', 'city'
    ,'children_num','beard','veil','weight','height','age'];
        $List = Property::with('propertydep')->whereNotIn('name', $except_arr)->get();
        return view('admin.ai.property', ["List" => $List]);
    }
    public function option_show($id)
    {
        $List = OptionValue::where('property_id', $id)->get();
        $property = Property::find($id);
        return view('admin.ai.option', ["List" => $List, 'property' => $property]);

    }
    //id is option id
    public function option_range($id)
    {
        $dest_prop_id = $this->get_opposite_by_op_id($id);

      if( is_array($dest_prop_id)){
        // two property
        $dest_prop_id_rel=$dest_prop_id['dest_prop_id_rel'];
        $dest_prop_id_viel= $dest_prop_id['dest_prop_id_viel'];
        $Listdb = OptionValue::with('optionsranges')->where('property_id',$dest_prop_id_rel)->get();
        $vielListDb=OptionValue::with('optionsranges')->where('property_id',$dest_prop_id_viel)->get();
        $List =  $this->map_op_list( $Listdb ,$id);
        $vielList=$this->map_op_list( $vielListDb ,$id);
        return view('admin.ai.group-table', ["List" => $List,"vielList" => $vielList,'group_prop_id'=>$dest_prop_id_viel]);
      }else{
        $Listdb = OptionValue::with('optionsranges')->where('property_id', $dest_prop_id)->get();
        $List =  $this->map_op_list( $Listdb ,$id);
        return view('admin.ai.group-table', ["List" => $List ]);
    }
        //mainoptions       
   
        //return   $Listdb  ;
        
 

    }


    public function map_op_list($Listdb,$option_id)
    {
        $List = $Listdb->map(function ($option) use ($option_id) {
            $item = $option->optionsranges->where('option_id', $option_id)->where('group_id', $option->id)->first();
           
            return [
                'option' => $option,
                'is_group' => $item ? 1 : 0,
            ];

        });
        return  $List ;
    }
    public function get_opposite($dest_property_name)
    {
        $dest_prop_id = Property::where('name', $dest_property_name)->first()->id;
        return $dest_prop_id;

    }
    public function get_opposite_by_op_id($sel_op_id)
    {

        $sel_op = OptionValue::find($sel_op_id);
        $prop_id = $sel_op->property_id;
        $sel_prop = Property::find($prop_id);

        $dest_prop_id = 0;

        if ($sel_prop->name == 'wife_num') {
            $dest_prop_id = $this->get_opposite('wife_num_female');

        } else if ($sel_prop->name == 'family_status') {
            $dest_prop_id = $this->get_opposite('family_status_female');

        } else if ($sel_prop->name == 'wife_num_female') {
            $dest_prop_id = $this->get_opposite('wife_num');

        } else if ($sel_prop->name == 'family_status_female') {
            $dest_prop_id = $this->get_opposite('family_status');

        }
        else if ($sel_prop->name == 'religiosity') {
            $dest_prop_id_rel = $this->get_opposite('religiosity');
            $dest_prop_id_viel = $this->get_opposite('veil');
            $dest_prop_id=[
                'dest_prop_id_rel'=> $dest_prop_id_rel,
                'dest_prop_id_viel'=>$dest_prop_id_viel ,
            ];
        } 
         else {
            $dest_prop_id = $prop_id;
        }
        return $dest_prop_id;

    }
}
