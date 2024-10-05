<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\AdvanceRequest;
use App\Models\OptionGroup;
use Illuminate\Http\Request;

use App\Models\ClientOption;
use App\Models\ClientPoint;
use App\Models\OptionValue;


use App\Models\Property;

use App\Models\Client;

use App\Http\Requests\Client\StoreClientRequest;
// use App\Http\Requests\Client\UpdatePassRequest;
// use App\Http\Requests\Client\PullRequest;
// use App\Http\Requests\Client\UpdateClientRequest;
// use DB;
// use Illuminate\Support\Facades\Validator;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;
// use Illuminate\Support\Facades\Storage;
// use File;
// use Illuminate\Support\Str;
// use App\Http\Requests\Auth\LoginClientRequest;
// use Illuminate\Http\RedirectResponse;

// use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Web\PropertyController;
//use App\Http\Controllers\Web\ClientOptionController;


class SearchController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public $result_num=100;
  public $createdlimit=30;//days
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
   * Display the specified resource.
   */

  public function show($lang)
  {
    if (Auth::guard('client')->check()) {
      $id = Auth::guard('client')->user()->id;
      $client = Client::find($id);
      $propctrler = new PropertyController();
      //  $client = (object) $propctrler->clientwithprop($id, $lang);    
      $propgroup = $propctrler->propgroup($lang);
      //$birthdateStr = (string) Carbon::create($client->birthdate)->format('d-m-Y');
      // Carbon::setLocale('ar');
      //  $user_reg_date = $client->created_at->translatedFormat('l jS F Y - H:m');

      $sitedctrlr = new SiteDataController();
      $transarr = $sitedctrlr->FillTransData($lang);
      $defultlang = $transarr['langs']->first();
      $nowyear = Carbon::now()->format('Y');
      return view(
        "site.page.advance-search",
        [
          "client" => $client,
          'lang' => $lang,
          'defultlang' => $defultlang,
          //  'birthdateStr' => $birthdateStr,
          // 'user_reg_date' => $user_reg_date,
          'prop_group' => $propgroup,
          'nowyear' => $nowyear,
        ]
      );

    } else {
      return redirect()->route('login.client');
    }

  }


  public function all_search($lang)
  {
    if (Auth::guard('client')->check()) {
      $id = Auth::guard('client')->user()->id;
      $client = Client::find($id);
      $propctrler = new PropertyController();
      //  $client = (object) $propctrler->clientwithprop($id, $lang);    
      $propgroup = $propctrler->propgroup($lang);
      //$birthdateStr = (string) Carbon::create($client->birthdate)->format('d-m-Y');
      // Carbon::setLocale('ar');
      //  $user_reg_date = $client->created_at->translatedFormat('l jS F Y - H:m');

      $sitedctrlr = new SiteDataController();
      $transarr = $sitedctrlr->FillTransData($lang);
      $defultlang = $transarr['langs']->first();
      $nowyear = Carbon::now()->format('Y');
      return view(
        "site.page.all-search",
        [
          "client" => $client,
          'lang' => $lang,
          'defultlang' => $defultlang,
          //  'birthdateStr' => $birthdateStr,
          // 'user_reg_date' => $user_reg_date,
          'prop_group' => $propgroup,
          'nowyear' => $nowyear,
        ]
      );

    } else {
      return redirect()->route('login.client');
    }

  }


  public function advance_search(Request $request, $lang)
  {


    $formdata = $request->all();
    // $clientopctrlr = new ClientOptionController();

    $id = Auth::guard('client')->user()->id;
            //        
             
            $clientpackctrlr=new ClientPackageController();
            $clientpack_id=  $clientpackctrlr->check_search_count($id);
        if( $clientpack_id>0){
          $res=$clientpackctrlr->decrease_search_count($clientpack_id);
        }else{
          return  redirect()->back();
        }
        //
    $client = Client::find($id);
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
    if ($client->gender == 'male') {
      // Client search
      //  $cliens_list=DB::table('clients')->where('gender','female') ;
      $cliens_list = Client::where('gender', 'female');
    } else {
      $cliens_list = Client::where('gender', 'male');
    }
    if (isset($formdata["age"])) {

      $age = $formdata["age"];
      $str_arr = explode(",", $age);
      $minAge = $str_arr[0];
      $maxAge = $str_arr[1];
      $minDate = Carbon::today()->subYears((integer) $maxAge); // make sure to use Carbon\Carbon in the class
      $maxDate = Carbon::today()->subYears((integer) $minAge - 1)->endOfDay();
      $cliens_list = $cliens_list->whereBetween('birthdate', [$minDate, $maxDate]);
    }

    $cliens_list = $cliens_list->select('id')->get();
    $clintids = data_get($cliens_list, '*.id');
    // $cliensoptions_list = ClientOption::whereIntegerInRaw('client_id', $clintids);

    $clintids = $this->num_res("weight", $clintids, $formdata["weight"]);
    $clintids = $this->num_res("height", $clintids, $formdata["height"]);

    $clintids = $this->country_res("residence", $clintids, $formdata["residence"]);

    $clintids = $this->country_res("nationality", $clintids, $formdata["nationality"]);
    if ($client->gender == 'male') {
      $clintids = $this->one_op_res("wife_num_female", $clintids, $formdata["wife_num_female"]);
      $clintids = $this->multi_op_res("family_status_female", $clintids, $formdata["family_status_female"]);
      $clintids = $this->multi_op_res("veil", $clintids, $formdata["veil"]);
    } else {
      $clintids = $this->one_op_res("wife_num", $clintids, $formdata["wife_num"]);
      $clintids = $this->multi_op_res("family_status", $clintids, $formdata["family_status"]);
      $clintids = $this->one_op_res("beard", $clintids, $formdata["beard"]);
    }

    $clintids = $this->multi_op_res("skin", $clintids, $formdata["skin"]);
    $clintids = $this->multi_op_res("body", $clintids, $formdata["body"]);

    $clintids = $this->multi_op_res("education", $clintids, $formdata["education"]);
    $clintids = $this->multi_op_res("work", $clintids, $formdata["work"]);
    $clintids = $this->multi_op_res("financial", $clintids, $formdata["financial"]);
    $clintids = $this->multi_op_res("religiosity", $clintids, $formdata["religiosity"]);
    $clintids = $this->multi_op_res("prayer", $clintids, $formdata["prayer"]);
    $clintids = $this->one_op_res("smoking", $clintids, $formdata["smoking"]);
    //  return  $cliens_list->with('clientoptions')->get() ;->toSql();  
    $clintids = array_slice($clintids, 0, $this->result_num);
    $clients_res= $this->selectandmap($clintids,$lang);
 
    $type = '';
    if (isset($formdata["type"])) {
      $type = $formdata["type"];

    }
    return view(
      "site.page.search-result",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'type' => $type,
      ]
    );

  }

  public function num_res($property_name, $clintids, $options)
  {
    if (isset($options)) {
      //$options = $formdata["weight"];

      $str_arr = explode(",", $options);
      $minOp = $str_arr[0];
      $maxOP = $str_arr[1];
      $property_id = Property::where('name', $property_name)->first()->id;
      $c_options_tmp = ClientOption::where('property_id', $property_id)
        ->whereBetween('val_int', [$minOp, $maxOP])
        ->whereIntegerInRaw('client_id', $clintids)->groupBy('client_id')->get();
      $clintids = data_get($c_options_tmp, '*.client_id');
    }
    return $clintids;
  }
  public function country_res($property_name, $clintids, $options)
  {
    if (isset($options)) {
      if (!(count($options) == 1 && $options[0] == 0)) {
        $options = array_map('intval', $options);
        $property_id = Property::where('name', $property_name)->first()->id;
        $c_options_tmp = ClientOption::where('property_id', $property_id)
          ->whereIntegerInRaw('country_id', $options)
          ->whereIntegerInRaw('client_id', $clintids)->groupBy('client_id')->get();
        $clintids = data_get($c_options_tmp, '*.client_id');
      }
    }
    return $clintids;
  }
  public function multi_op_res($property_name, $clintids, $options)
  {
    if (isset($options)) {
      if (!(count($options) == 1 && $options[0] == 0)) {
        $options = array_map('intval', $options);
        $property_id = Property::where('name', $property_name)->first()->id;
        $c_options_tmp = ClientOption::where('property_id', $property_id)
          ->whereIntegerInRaw('option_id', $options)
          ->whereIntegerInRaw('client_id', $clintids)
          ->groupBy('client_id')->get();
        $clintids = data_get($c_options_tmp, '*.client_id');
      }
    }
    return $clintids;
  }
  public function one_op_res($property_name, $clintids, $options)
  {
    if (isset($options)) {
      if (!($options == 0)) {
        $property_id = Property::where('name', $property_name)->first()->id;
        $c_options_tmp = ClientOption::where('property_id', $property_id)
          ->where('option_id', $options)
          ->whereIntegerInRaw('client_id', $clintids)
          ->groupBy('client_id')->get();
        $clintids = data_get($c_options_tmp, '*.client_id');
      }
    }
    return $clintids;
  }
  public function getnothealth_ids($clintids)
  {
  $hArr=  $this->gethealth_op('good');     
      if (!(is_null($hArr['option_id']))) { 
        $op_id=$hArr['option_id'];
        $prop_id=$hArr['property_id'];
        $c_options_tmp = ClientOption::where('property_id',$prop_id)->whereNot('option_id', $op_id)->whereNotNull('option_id')->whereNot('option_id',0)   
          ->whereIntegerInRaw('client_id', $clintids)
          ->groupBy('client_id')->get();
     
        $clintids = data_get($c_options_tmp, '*.client_id');
  
      }    
    return $clintids;
  }
  //
  public function client_prop_map($client, $lang, PropertyController $propctrlr)
  {

    // $wife_num=$client->clientoptions()->with('optionvalue','property')->wherehas('property', function ($query) {
    //     $query->where('name', 'wife_num');
    // })->first();
    // $wife_num = $this->client_prop_filter($client->clientoptions, 'wife_num');
    $clientoptions = $propctrlr->client_prop_list($client->clientoptions);
    $countrytoptions = $propctrlr->country_prop_list($client->clientoptions);

    if($client->favoritestoclients->first())
    { $is_favorite= is_null($client->favoritestoclients->first()->is_favorite)?0:$client->favoritestoclients->first()->is_favorite;
      $is_black=is_null($client->favoritestoclients->first()->is_blacklist)?0:$client->favoritestoclients->first()->is_blacklist;
    }else{
      $is_favorite= 0;
      $is_black=0;
    }
   

    $clientArr = [
      'client' => $client->withoutRelations(),
      'residence' => $propctrlr->country_prop_filter($countrytoptions, 'residence'),
      'nationality' => $propctrlr->country_prop_filter($countrytoptions, 'nationality'),

      'family_status' => $propctrlr->client_prop_filter($clientoptions, 'family_status'),
      'family_status_female' => $propctrlr->client_prop_filter($clientoptions, 'family_status_female'),
      'wife_num' => $propctrlr->client_prop_filter($clientoptions, 'wife_num'),
      'since_register' => $client->created_at->diffForHumans(),
      'is_favorite'=>$is_favorite,
      'is_blacklist'=>$is_black,

    ];
    return $clientArr;
  }
  //
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

  public function ai_show($lang)
  {
    if (Auth::guard('client')->check()) {

      $sitedctrlr = new SiteDataController();
      $transarr = $sitedctrlr->FillTransData($lang);
      $defultlang = $transarr['langs']->first();
      //  $nowyear = Carbon::now()->format('Y');
      return view(
        "site.page.ai-search",
        [
          // "client" => $client,
          'lang' => $lang,
          'defultlang' => $defultlang,
          //'birthdateStr' => $birthdateStr,
          //  'user_reg_date' => $user_reg_date,
          // 'prop_group' => $propgroup,
          //  'nowyear' => $nowyear,
        ]
      );

    } else {
      return redirect()->route('login.client');
    }

  }
  public function ai_search(Request $request, $lang)
  {
    //AdvanceRequest
    StoreClientRequest::$lang = $lang;
    $formdata = $request->all();
    $id = Auth::guard('client')->user()->id;
            //        
            $clientpackctrlr=new ClientPackageController();
            $clientpack_id=  $clientpackctrlr->check_search_count($id);
        if( $clientpack_id>0){
          $res=$clientpackctrlr->decrease_search_count($clientpack_id);
        }else{
          return  redirect()->back();
        }
        //
    $client = Client::with('clientoptions')->find($id);
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
    if ($client->gender == 'male') {

      // Client search
      //  $cliens_list=DB::table('clients')->where('gender','female') ;
      $cliens_list = Client::where('gender', 'female');
      //age
      $minAge = $client->age - 10;
      $maxAge = $client->age + 5;
      $minDate = Carbon::today()->subYears((integer) $maxAge); // make sure to use Carbon\Carbon in the class
      $maxDate = Carbon::today()->subYears((integer) $minAge - 1)->endOfDay();
      $cliens_list = $cliens_list->whereBetween('birthdate', [$minDate, $maxDate]);
      $cliens_list = $cliens_list->select('id')->get();
      $clintids = data_get($cliens_list, '*.id');

      //wife_num_female

      $group_option_list_ids = $this->getgroup_ids($client, 'wife_num');
      $clintids = $this->multi_op_res("wife_num_female", $clintids, $group_option_list_ids);

      //family_status_female
      $group_option_list_ids = $this->getgroup_ids($client, 'family_status');
      $clintids = $this->multi_op_res("family_status_female", $clintids, $group_option_list_ids);

      //weight
      $client_weight = $this->getclientvalue($client, "weight");
      $min = $client_weight - 15;
      $max = $client_weight + 10;
      $rang = implode(',', [$min, $max]);

      $clintids = $this->num_res("weight", $clintids, $rang);

      //height
      $client_height = $this->getclientvalue($client, "height");
      $min = $client_height - 10;
      $max = $client_height + 5;
      $rang = implode(',', [$min, $max]);
      $clintids = $this->num_res("height", $clintids, $rang);

      //
      $group_option_list_ids = $this->getgroup_ids($client, 'religiosity', 'veil');
      $clintids = $this->multi_op_res("veil", $clintids, $group_option_list_ids);

      //return $clintids;
    } else {

      //female

      $cliens_list = Client::where('gender', 'male');

      //age
      $minAge = $client->age - 5;
      $maxAge = $client->age + 10;
      $minDate = Carbon::today()->subYears((integer) $maxAge); // make sure to use Carbon\Carbon in the class
      $maxDate = Carbon::today()->subYears((integer) $minAge - 1)->endOfDay();
      $cliens_list = $cliens_list->whereBetween('birthdate', [$minDate, $maxDate]);
      $cliens_list = $cliens_list->select('id')->get();
      $clintids = data_get($cliens_list, '*.id');
      //wife_num

      $group_option_list_ids = $this->getgroup_ids($client, 'wife_num_female');
      $clintids = $this->multi_op_res("wife_num", $clintids, $group_option_list_ids);
      //family_status
      $group_option_list_ids = $this->getgroup_ids($client, 'family_status_female');
      $clintids = $this->multi_op_res("family_status", $clintids, $group_option_list_ids);

      //weight
      $client_weight = $this->getclientvalue($client, "weight");
      $min = $client_weight - 10;
      $max = $client_weight + 10;
      $rang = implode(',', [$min, $max]);

      $clintids = $this->num_res("weight", $clintids, $rang);
      //height
      $client_height = $this->getclientvalue($client, "height");
      $min = $client_height - 5;
      $max = $client_height + 10;
      $rang = implode(',', [$min, $max]);
      $clintids = $this->num_res("height", $clintids, $rang);
    }
    //both
    $client_res_id = $this->getclientcountry($client, 'nationality');
    $clintids = $this->country_res("nationality", $clintids, [$client_res_id]);

    //skin
    $group_option_list_ids = $this->getgroup_ids($client, 'skin');
    $clintids = $this->multi_op_res("skin", $clintids, $group_option_list_ids);

    //body
    $group_option_list_ids = $this->getgroup_ids($client, 'body');
    $clintids = $this->multi_op_res("body", $clintids, $group_option_list_ids);

    //education
    $group_option_list_ids = $this->getgroup_ids($client, 'education');
    $clintids = $this->multi_op_res("education", $clintids, $group_option_list_ids);

    //work
    $group_option_list_ids = $this->getgroup_ids($client, 'work');
    $clintids = $this->multi_op_res("work", $clintids, $group_option_list_ids);

    //financial
    $group_option_list_ids = $this->getgroup_ids($client, 'financial');
    $clintids = $this->multi_op_res("financial", $clintids, $group_option_list_ids);

    //religiosity
    $group_option_list_ids = $this->getgroup_ids($client, 'religiosity');
    $clintids = $this->multi_op_res("religiosity", $clintids, $group_option_list_ids);

    //prayer
    $group_option_list_ids = $this->getgroup_ids($client, 'prayer');
    $clintids = $this->multi_op_res("prayer", $clintids, $group_option_list_ids);

    //smoking
    $group_option_list_ids = $this->getgroup_ids($client, 'smoking');
    $clintids = $this->one_op_res("smoking", $clintids, $group_option_list_ids);

    $clintids = array_slice($clintids, 0, $this->result_num);
    //  $clintids = $this->one_op_res("beard",$clintids,$formdata["beard"]);
    $clients_res= $this->selectandmap($clintids,$lang);
    
    $type = '';
    if (isset($formdata["type"])) {
      $type = $formdata["type"];

    }

    return view(
      "site.page.search-result",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'ai' => 1,
        'type' => $type,
      ]
    );

  }

  public function getgroup_ids($client, $property_name, $group_prop_name = null)
  {
    $property = Property::where('name', $property_name)->first();
    $prop_id = $property->id;

    //get  client option of property wife num
    $seloption_id = $client->clientoptions->where('property_id', $prop_id)->first()->option_id;
    if (isset($group_prop_name)) {
      $group_prop = Property::where('name', $group_prop_name)->first();
      $group_prop_id = $group_prop->id;
      $group_option_list = OptionGroup::where('option_id', $seloption_id)->
        where('property_id', $prop_id)->
        where('group_prop_id', $group_prop_id)->
        select('group_id')->get();
    } else {
      $group_option_list = OptionGroup::where('option_id', $seloption_id)->select('group_id')->get();
    }

    $group_option_list_ids = data_get($group_option_list, '*.group_id');
    return $group_option_list_ids;
  }
  public function getclientvalue($client, $property_name)
  {
    //wieght
    $property = Property::where('name', $property_name)->first();
    $prop_id = $property->id;
    //get  client option of property wife num
    $selval = $client->clientoptions->where('property_id', $prop_id)->first()->val_int;
    return $selval;
  }
  public function getclientcountry($client, $property_name)
  {
    //wieght
    $property = Property::where('name', $property_name)->first();
    $prop_id = $property->id;
    //get  client option of property wife num
    $country_id = $client->clientoptions->where('property_id', $prop_id)->first()->country_id;
    return $country_id;
  }
  public function gethealth_op($healthop_name)
  {
    $property = Property::where('name', 'health')->first();
    $prop_id = $property->id;
$op = OptionValue::where('property_id', $prop_id)->where('value',$healthop_name)->first();
$op_id=null;
if($op ){
  $op_id=$op->id;
}
return ['property_id'=> $prop_id,
  'option_id'=>$op_id,
];
  }
  public function name_search(Request $request, $lang)
  {
    //AdvanceRequest

    $formdata = $request->all();
    $id = Auth::guard('client')->user()->id;
    $clientpackctrlr=new ClientPackageController();
    $clientpack_id=  $clientpackctrlr->check_search_count($id);
if( $clientpack_id>0){
 
  $client = Client::with('clientoptions')->find($id);
  $sitedctrlr = new SiteDataController();
  $transarr = $sitedctrlr->FillTransData($lang);
  $defultlang = $transarr['langs']->first();
  $name = $formdata['name'];
  if ($client->gender == 'male') {

    
    $cliens_list = Client::where('gender', 'female')->where('name', 'like', '%' . $name . '%')->select('id')->get();

    $clintids = data_get($cliens_list, '*.id');

  } else {

    //female
    $cliens_list = Client::where('gender', 'male')->where('name', 'like', '%' . $name . '%')->select('id')->get();
    $cliens_list = $cliens_list->take( $this->result_num);
    $clintids = data_get($cliens_list, '*.id');
  }

  $clients_res= $this->selectandmap($clintids,$lang);
  $type='';
  if(isset($formdata["type"])){
   $type=$formdata["type"];
  
  }
  $res=$clientpackctrlr->decrease_search_count($clientpack_id);
  return view(
    "site.page.search-result",
    [
      "clients" => (object) $clients_res,
      'lang' => $lang,
      'defultlang' => $defultlang,
      'ai' => 1,
      'type'=>$type,
    ]
  );
}else{
  return  redirect()->back();
}
    

  }

  public function quick_search(Request $request, $lang)
  {

    $formdata = $request->all();

    $resultArr=$this->first_query_search($lang);  
        //        
        $id=$resultArr['client_id'];
        $clientpackctrlr=new ClientPackageController();
        $clientpack_id=  $clientpackctrlr->check_search_count($id);
    if( $clientpack_id>0){
      $res=$clientpackctrlr->decrease_search_count($clientpack_id);
    }else{
      return  redirect()->back();
    }
    //
    $cliens_list=$resultArr['cliens_list'];
    $gender=$resultArr['gender'];
    $genderTrans= $resultArr['genderTrans'];
    $client= $resultArr['client'];
    $defultlang=$resultArr['defultlang'];

    if (isset($formdata["age"])) {

      $age = $formdata["age"];
      $str_arr = explode(",", $age);
      $minAge = $str_arr[0];
      $maxAge = $str_arr[1];
      $minDate = Carbon::today()->subYears((integer) $maxAge); // make sure to use Carbon\Carbon in the class
      $maxDate = Carbon::today()->subYears((integer) $minAge - 1)->endOfDay();
      $cliens_list = $cliens_list->whereBetween('birthdate', [$minDate, $maxDate]);
    }

    $cliens_list = $cliens_list->select('id')->get();
    $clintids = data_get($cliens_list, '*.id');
    // $cliensoptions_list = ClientOption::whereIntegerInRaw('client_id', $clintids);

    $clintids = $this->num_res("weight", $clintids, $formdata["weight"]);
    $clintids = $this->num_res("height", $clintids, $formdata["height"]);

    $clintids = $this->country_res("residence", $clintids, [0 => $formdata["residence"]]);

    $clintids = $this->country_res("nationality", $clintids, [0 => $formdata["nationality"]]);
    if ($client->gender == 'male') {
      $clintids = $this->one_op_res("wife_num_female", $clintids, $formdata["wife_num_female"]);
      $clintids = $this->one_op_res("family_status_female", $clintids, $formdata["family_status_female"]);

    } else {
      $clintids = $this->one_op_res("wife_num", $clintids, $formdata["wife_num"]);
      $clintids = $this->one_op_res("family_status", $clintids, $formdata["family_status"]);

    }

    $clintids = $this->one_op_res("skin", $clintids, $formdata["skin"]);


    $clintids = $this->one_op_res("education", $clintids, $formdata["education"]);

    $clintids = $this->one_op_res("financial", $clintids, $formdata["financial"]);
    
$clintids = array_slice($clintids, 0, $this->result_num);
  
   
    $clients_res= $this->selectandmap($clintids,$lang);
    $type='';
    if(isset($formdata["type"])){
     $type=$formdata["type"];
    
    }
  
    return view(
      "site.page.search-result",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'ai' => 1,
        'type'=>$type,
      ]
    );

  }
  public function first_query_search($lang)
  {
  $genderTrans='';
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
    $id=0;
    if (Auth::guard('client')->check()) {
    $id = Auth::guard('client')->user()->id;
    $client = Client::with('clientoptions')->find($id);
    $gender=$client->gender;
    }else{
      $gender='both';
      $genderTrans='الكل';
      $client=new Client();

    }

      if ($gender == 'male') {
      // Client search
      //  $cliens_list=DB::table('clients')->where('gender','female') ;
      $cliens_list = Client::where('gender', 'female');
      $genderTrans='إناث';
    } else if($gender == 'female') {
      $cliens_list = Client::where('gender', 'male');
      $genderTrans='ذكور';     
    }else{
      $cliens_list =Client::orderByDesc('created_at');
    }
    return [
      'client'=>$client ,
      'cliens_list'=>$cliens_list,
   'gender'=> $gender,
    'genderTrans'=>$genderTrans,
    'defultlang'=>$defultlang,
    'client_id'=>$id,
  ];
  }
  public function online_clients($lang)
  {
    $resultArr=$this->first_query_search($lang);  
    $cliens_list=$resultArr['cliens_list'];
    $gender=$resultArr['gender'];
    $genderTrans= $resultArr['genderTrans'];
    $client= $resultArr['client'];
    $defultlang=$resultArr['defultlang'];
    $datelimit=now()->subMinutes(5); 
    $cliens_list = $cliens_list->where('lastseen_at','>=',$datelimit);
    $cliens_list = $cliens_list->select('id')->get();
    $Allclintids = data_get($cliens_list, '*.id'); 
    if (Auth::guard('client')->check()) {
      //get current member nationality
      $client_res_id = $this->getclientcountry($client, 'nationality');
      //get members with same nationality
          $memberclintids = $this->country_res("nationality", $Allclintids, [$client_res_id]);
 
      }else{
        $memberclintids =   $Allclintids;
      }
   

             $clients_same=$this->selectandmap($memberclintids,$lang); 
     //get others
     $oherclintids=array_diff($Allclintids,$memberclintids);
     $clients_other=$this->selectandmap($oherclintids,$lang);
     //merg list
     $finalClients=array_merge($clients_same->toArray(),$clients_other->toArray());  
     $finalClients= array_slice($finalClients, 0, $this->result_num); 

     $type='online';
    return view(
      "site.page.online-clients",
      [
        "clients" => (object) $finalClients,
        'lang' => $lang,
        'defultlang' => $defultlang,
        //'ai' => 1,
        'type'=>$type,
        'genderTrans'=>$genderTrans,
      ]
    );
  }
  public function last_online_clients($lang)
  {
    $resultArr=$this->selectandmap_online_home( $lang); 
  
    return  $resultArr;
    
  }
  public function new_clients($lang)
  {
 
      $resultArr=$this->first_query_search($lang);  
    $cliens_list=$resultArr['cliens_list'];
    $gender=$resultArr['gender'];
    $genderTrans= $resultArr['genderTrans'];
    $client= $resultArr['client'];
    $defultlang=$resultArr['defultlang'];

    $datelimit=now()->subDays($this->createdlimit);
    $cliens_list = $cliens_list->where('created_at','>=',$datelimit);
    $cliens_list = $cliens_list->select('id')->get();
    $Allclintids = data_get($cliens_list, '*.id');

 
    if (Auth::guard('client')->check()) {
      //get current member nationality
      $client_res_id = $this->getclientcountry($client, 'nationality');
      //get members with same nationality
          $memberclintids = $this->country_res("nationality", $Allclintids, [$client_res_id]);
 
      }else{
        $memberclintids =   $Allclintids;
      }

        $clients_same=$this->selectandmap($memberclintids,$lang); 
//get others
$oherclintids=array_diff($Allclintids,$memberclintids);
$clients_other=$this->selectandmap($oherclintids,$lang);
//merg list
//$finalClients=array_merge($clients_same ,$clients_other );
$finalClients=array_merge($clients_same->toArray(),$clients_other->toArray());


$finalClients= array_slice($finalClients, 0, $this->result_num);
 
    //  return  $cliens_list->with('clientoptions')->get() ;->toSql();
    $type='new';
    return view(
      "site.page.online-clients",
      [
        "clients" => (object) $finalClients,
        'lang' => $lang,
        'defultlang' => $defultlang,
        //'ai' => 1,
         'type'=>$type,
         'genderTrans'=>$genderTrans,
      ]
    );

  }
  
  public function health_search($lang)
  {
    $resultArr=$this->first_query_search($lang);  
    $cliens_list=$resultArr['cliens_list'];
    $gender=$resultArr['gender'];
    $genderTrans= $resultArr['genderTrans'];
    $client= $resultArr['client'];
    $defultlang=$resultArr['defultlang'];

      $cliens_list = $cliens_list->select('id')->get();
      $clintids = data_get($cliens_list, '*.id');
   // $op_id = $this->gethealth_op('good');
  // return  $this->getnothealth_ids($clintids);   
   $clintids= $this->getnothealth_ids($clintids);
  
$clintids = array_slice($clintids, 0, $this->result_num);  
   
    $clients_res= $this->selectandmap($clintids,$lang);
    $type='health'; 
  //get select list
  $propctrler = new PropertyController();
  //  $client = (object) $propctrler->clientwithprop($id, $lang);    
  $propgroup = $propctrler->propgroupfor_health($lang);
    return view(
      "site.page.online-clients",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'ai' => 1,
        'type'=>$type,
        'genderTrans'=>$genderTrans,
        'prop_group' => $propgroup,
      ]
    );

  }
  public function health_search_by_inputs(Request $request, $lang)
  {
    $formdata = $request->all();
     
    $residence_id=$formdata['residence'];
    $health_id=0;
    if(isset($formdata['health'])){
      $health_id=$formdata['health'];
    } 
  
    $resultArr=$this->first_query_search($lang);  

    $cliens_list=$resultArr['cliens_list'];
    $gender=$resultArr['gender'];
    $genderTrans= $resultArr['genderTrans'];
    $client= $resultArr['client'];
    $defultlang=$resultArr['defultlang'];
      $cliens_list = $cliens_list->select('id')->get();

      $clintids = data_get($cliens_list, '*.id');
  
      $clintids = $this->country_res("residence", $clintids, [0 => $residence_id]);
      $clintids = $this->one_op_res("health", $clintids,$health_id);
$clintids = array_slice($clintids, 0, $this->result_num);  
   
    $clients_res= $this->selectandmap($clintids,$lang);
    $type='health'; 
  //get select list
  $propctrler = new PropertyController();
  //  $client = (object) $propctrler->clientwithprop($id, $lang);    
  $propgroup = $propctrler->propgroupfor_health($lang);
    return view(
      "site.page.online-clients",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'ai' => 1,
        'type'=>$type,
        'genderTrans'=>$genderTrans,
        'prop_group' => $propgroup,
        'residence_id'=> $residence_id,
        'health_id'=>$health_id,
      ]
    );

  }

  public function special_search($lang)
  {
    $resultArr=$this->first_query_search($lang);  
    $cliens_list=$resultArr['cliens_list'];
  //  $gender=$resultArr['gender'];
    $genderTrans= $resultArr['genderTrans'];
  //  $client= $resultArr['client'];
    $defultlang=$resultArr['defultlang'];
  //  $cliens_list= $cliens_list->where('is_special',1);
      $cliens_list = $cliens_list->select('id')->get()->where('is_special',1);
      $clintids = data_get($cliens_list, '*.id'); 
  
$clintids = array_slice($clintids, 0, $this->result_num);  
   
    $clients_res= $this->selectandmap($clintids,$lang);
    $type='special'; 
  //get select list
  $propctrler = new PropertyController();
  //  $client = (object) $propctrler->clientwithprop($id, $lang);    
  $propgroup = $propctrler->propgroupfor_health($lang);
    return view(
      "site.page.online-clients",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'ai' => 1,
        'type'=>$type,
        'genderTrans'=>$genderTrans,
        'prop_group' => $propgroup,
      ]
    );

  }
  public function selectandmap($clintids,$lang)
  {
    $auth_id =0;
    if (Auth::guard('client')->check()) {
      $auth_id = Auth::guard('client')->user()->id;
    }
    $clients_res_db = Client::with(
      [
        'clientoptions' => function ($q) {
          $q->with([
            'property:id,name,is_active,type,is_multivalue,notes',
            'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
            'country:id,name_ar,code',
            'city:id,name_en,name_ar,code,country_id'
          ])->select(
              'id',
              'client_id',
              'property_id',
              'option_id',
              'val_str',
              'val_int',
              'val_date',
              'notes',
              'type',
              'country_id',
              'city_id'
            );
        },
        'favoritestoclients' => function ($q) use ($auth_id) {
          $q->where('client_id', $auth_id);
      }
      ]
    )->whereIntegerInRaw('id', $clintids)->get();
    $propctrlr = new PropertyController();
    $clients_res = $clients_res_db->map(function ($client) use ($lang, $propctrlr) {

      return $this->client_prop_map($client, $lang, $propctrlr);

    });
    return  $clients_res;
  
  }
  public function selectandmap_online_home($lang)
  {
    $auth_id =0;
   
    $clients_res_db = Client::with(
      [
        'clientoptions' => function ($q) {
          $q->with([
            'property:id,name,is_active,type,is_multivalue,notes',
            'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
            'country:id,name_ar,code',
            'city:id,name_en,name_ar,code,country_id'
          ])->select(
              'id',
              'client_id',
              'property_id',
              'option_id',
              'val_str',
              'val_int',
              'val_date',
              'notes',
              'type',
              'country_id',
              'city_id'
            );
        },
        'favoritestoclients' => function ($q) use ($auth_id) {
          $q->where('client_id', $auth_id);
      }
      ]
    )->orderByDesc('lastseen_at')->take(20)->get();
    $propctrlr = new PropertyController();
    $clients_res = $clients_res_db->map(function ($client) use ($lang, $propctrlr) {

      return $this->client_prop_map($client, $lang, $propctrlr);

    });
    return  $clients_res;
  
  }
}
