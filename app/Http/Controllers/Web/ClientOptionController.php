<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\OptionValue;
 
use App\Models\ClientOption;
use App\Models\Property;
class ClientOptionController extends Controller
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
    public function addmultiop($client_id,$option_id)
    {
        $optionval=OptionValue::find($option_id); 
        $clientoption=new ClientOption();
        $clientoption->client_id=$client_id;
        $clientoption->property_id=$optionval->property_id;
        $clientoption->option_id=$option_id;
        $clientoption->val_str=$optionval->value;
        $clientoption->val_int=$optionval->value_int;
        $clientoption->type=$optionval->type;
        $clientoption->save();
        return  $clientoption->id;
    }

    public function addopgenerated($client_id,$option_val,$prop_name)
    {
        $prop=Property::where('name',$prop_name)->first();
        $clientoption=new ClientOption();
        $clientoption->client_id= $client_id;
        $clientoption->property_id=$prop->id;
        if($prop->type=='integer'){
            $clientoption->val_int=$option_val;
        }else{
        $clientoption->val_str=$option_val;
        }     
        $clientoption->type=$prop->type;
        $clientoption->save();
        return  $clientoption->id;
    }

    public function addopcountry_city($client_id,$prop_name,$country_id,$city_id=null) {
 $prop=Property::where('name',$prop_name)->first();
$clientoption=new ClientOption();
$clientoption->client_id= $client_id;
$clientoption->property_id=$prop->id;      
$clientoption->type=$prop->type;
$clientoption->country_id=$country_id;
$clientoption->city_id=$city_id; 
$clientoption->save();
return  $clientoption->id;
    }
}
