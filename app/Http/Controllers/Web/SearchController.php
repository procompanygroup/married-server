<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\AdvanceRequest;
use Illuminate\Http\Request;
 
use App\Models\ClientOption;
use App\Models\ClientPoint;
use App\Models\OptionValue;
 
 
use App\Models\Property;
 
use App\Models\Client;
 
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdatePassRequest;
use App\Http\Requests\Client\PullRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\LoginClientRequest;
use Illuminate\Http\RedirectResponse;
 
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Web\PropertyController;
use App\Http\Controllers\Web\ClientOptionController;

 
class SearchController extends Controller
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
     * Display the specified resource.
     */
  
    public function show($lang)
    {
      if (Auth::guard('client')->check()) {
        $id = Auth::guard('client')->user()->id;
        $propctrler = new PropertyController();
        $client = (object) $propctrler->clientwithprop($id, $lang);    
        $propgroup = $propctrler->propgroup($lang);
        $birthdateStr = (string) Carbon::create($client->client->birthdate)->format('d-m-Y');
        Carbon::setLocale('ar');
        $user_reg_date = $client->client->created_at->translatedFormat('l jS F Y - H:m');
  
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
            'birthdateStr' => $birthdateStr,
            'user_reg_date' => $user_reg_date,
            'prop_group' => $propgroup,
            'nowyear' => $nowyear,
          ]
        );
  
      } else {
        return redirect()->route('login.client');
      }
  
    }
    public function advance_search(AdvanceRequest $request, $lang)
  {
    StoreClientRequest::$lang = $lang;
    $formdata = $request->all();
    // return  $formdata;
    // return redirect()->back()->with('success_message', $formdata);
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );

    if ($validator->fails()) {

      return response()->json($validator);
    } else {

      $clientopctrlr = new ClientOptionController();
      $birthdate = Carbon::create($formdata["birthdate"])->format('Y-m-d');
      $id = Auth::guard('client')->user()->id;
      Client::find($id);   
                
                // $clientopctrlr->updateorcreate_opcountry($id,'residence',$formdata['residence'], $formdata['city']);
                // $clientopctrlr->updateorcreate_opcountry($id,'nationality',$formdata['nationality']);
                // if ($formdata['gender'] == 'male') {
                //   $clientopctrlr->updateorcreate_op($id,'wife_num', $formdata['wife_num']);
                //   $clientopctrlr->updateorcreate_op($id,'family_status', $formdata['family_status']);
                //   //beard
                //   $clientopctrlr->updateorcreate_op($id,'beard', $formdata['beard']);
                // } else {
                //   $clientopctrlr->updateorcreate_op($id,'wife_num_female', $formdata['wife_num_female']);
                //   $clientopctrlr->updateorcreate_op($id,'family_status_female', $formdata['family_status_female']);
                //   //veil
                //   $clientopctrlr->updateorcreate_op($id,'veil', $formdata['veil']);
                // }
                // $clientopctrlr->updateorcreate_opgenerated($id,'children_num',$formdata['children_num']);
                // $clientopctrlr->updateorcreate_opgenerated($id,'weight',$formdata['weight']);
                // //height
                // $clientopctrlr->updateorcreate_opgenerated($id,'height',$formdata['height']);
                // //skin
                // $clientopctrlr->updateorcreate_op($id,'skin', $formdata['skin']);
                // $clientopctrlr->updateorcreate_op($id,'body', $formdata['body']);
                // //religiosity
                // $clientopctrlr->updateorcreate_op($id,'religiosity', $formdata['religiosity']);
                // //prayer
                // $clientopctrlr->updateorcreate_op($id,'prayer',$formdata['prayer']);
                // //smoking
                // $clientopctrlr->updateorcreate_op($id,'smoking',$formdata['smoking']);
                // //education
                // $clientopctrlr->updateorcreate_op($id,'education',$formdata['education']);
                // $clientopctrlr->updateorcreate_op($id,'work',$formdata['work']);
                // //financial     
                // $clientopctrlr->updateorcreate_op($id,'financial',$formdata['financial']);
                // //job
                // $clientopctrlr->updateorcreate_opgenerated($id,'job',$formdata['job']);
                // //income
                // $clientopctrlr->updateorcreate_op($id,'income',$formdata['income']);
                // //health
                // $clientopctrlr->updateorcreate_op($id,'health',$formdata['health']);
                // //partner
                // $clientopctrlr->updateorcreate_opgenerated($id,'partner',$formdata['partner']);
                // //about_me
                // $clientopctrlr->updateorcreate_opgenerated($id,'about_me',$formdata['about_me']);
     
      //  return redirect()->back();
      return response()->json("ok");
    }
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
}
