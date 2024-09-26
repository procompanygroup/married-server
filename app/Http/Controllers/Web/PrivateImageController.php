<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\PrivateImage;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Client\UpdateMemberImageRequest;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Web\NotificationController;
class PrivateImageController extends Controller
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
    public function update(UpdateMemberImageRequest $request)
    {
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
            if (Auth::guard('client')->check()) {
                $id = Auth::guard('client')->user()->id;
                $old_ids= PrivateImage::where('client_id', $id)->select('showto_id')->get();
                $old_ids = data_get($old_ids, '*.showto_id');
                $notifyctrlr=new NotificationController();
                if ($formdata['client_group'] == 1) {
                    Client::find($id)->update([
                        'show_image' => 1
                    ]);
                    if (isset($formdata['fav'])) {

                        PrivateImage::where('client_id', $id)->delete();
                        $tableArr = [];
                        $now = Carbon::now();
                        foreach ($formdata['fav'] as $key => $value) {
                            $rowArr = [
                                'client_id' => $id,
                                'showto_id' => $value,
                                'is_show' => 1,
                                'created_at'=>$now,
                                'updated_at'=>$now,
                            ];
                            $tableArr[] = $rowArr;
                        }
                        PrivateImage::insert($tableArr);
                        $new_ids = collect($formdata['fav']);

 
$allow_ids = $new_ids->diff($old_ids)->all();
$data=[
  'fromclient_id'=>$id,
  'type'=>'show-image',
  'side'=>'member',      
];
$notifyctrlr->store_members_notify($allow_ids, $data);
//
 $notallow_id=collect($old_ids)->diff($formdata['fav'])->all();
 $data=[
  'fromclient_id'=>$id,
  'type'=>'not-show-image',
  'side'=>'member',      
];
$notifyctrlr->store_members_notify($notallow_id, $data);
                    }else{
                      //no one
                      Client::find($id)->update([
                        'show_image' => 0
                    ]);
                
                    PrivateImage::where('client_id', $id)->delete();
               
                    $data=[
                            'fromclient_id'=>$id,
                            'type'=>'not-show-image',
                            'side'=>'member',      
                          ];
                          $notifyctrlr->store_members_notify($old_ids, $data);
                          
                    }

                } else {
                    //no one 
                    Client::find($id)->update([
                        'show_image' => 0
                    ]);
                
                    PrivateImage::where('client_id', $id)->delete();
               
                    $data=[
                            'fromclient_id'=>$id,
                            'type'=>'not-show-image',
                            'side'=>'member',      
                          ];
                          $notifyctrlr->store_members_notify($old_ids, $data);
                }

                return response()->json('ok');
            }
            return response()->json('login');
        }
    }
    public function show_to_members($lang)
    {
      if (Auth::guard('client')->check()) {
        $id = Auth::guard('client')->user()->id; 
        $client = Client::find($id);       
        $sitedctrlr = new SiteDataController();
        $transarr = $sitedctrlr->FillTransData($lang);
        $defultlang = $transarr['langs']->first();  
        $favctrlr=new FavoriteController();
        $clients_res =  $this->private_image_list($id,$lang, $client);
        $countshow=collect($clients_res)->where('is_showimage',1)->count();
        return view(
          "site.page.image-clients",
          [
            "client" => $client,
            'lang' => $lang,
            'defultlang' => $defultlang,    
  'clients'=> $clients_res,
  'countshow'=>$countshow,
  'type'=>'images',
          ]
        );
      } else {
        return redirect()->route('login.client');
      }
  
    }
    public function private_image_list($id,$lang,$authclient)
    {
  
      $imagelist = PrivateImage::with([
        'client' => function ($q) use ($id) {
          $q->with(
            [
              'clientoptions' => function ($q) {
                $q->with([
                  'property:id,name,is_active,type,is_multivalue,notes',
                  'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
                  'country:id,name_ar,code',
                  'city:id,name_en,name_ar,code,country_id',
  
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
                     
            ]
          );
        }
      ])->where('showto_id', $id)->orderByDesc('created_at')->get();
      $favelist=Favorite::where('client_id',$id)->get();

      $clients_res = $this->selectandmap_withimage($imagelist, $lang,$authclient,$favelist);
      return  $clients_res;
    }
   public function selectandmap_withimage($imagelist, $lang,$authclient,$favelist)
    {

      $propctrlr = new PropertyController();
      $clients_res = $imagelist->map(function ($privateimage) use ($lang, $propctrlr,$authclient,$favelist) {
  
        return $this->client_prop_withimage_map($privateimage->client, $lang, $propctrlr, $favelist,$authclient);
  
      });
      return $clients_res;
  
    }
    public function client_prop_withimage_map($client, $lang, PropertyController $propctrlr, $favelist,$authclient)
    {
  
      // $wife_num=$client->clientoptions()->with('optionvalue','property')->wherehas('property', function ($query) {
      //     $query->where('name', 'wife_num');
      // })->first();
      // $wife_num = $this->client_prop_filter($client->clientoptions, 'wife_num');

      $clientoptions = $propctrlr->client_prop_list($client->clientoptions);
      $countrytoptions = $propctrlr->country_prop_list($client->clientoptions);

    $favemodel=$favelist->where('client_id',$authclient->id)->where('fav_to_client_id',$client->id)->where('is_favorite',1)->first();
  $blackmodel=$favelist->where('client_id',$authclient->id)->where('fav_to_client_id',$client->id)->where('is_blacklist',1)->first();
    $is_favorite=0;
    if( $favemodel){
        $is_favorite=1;
     }
     $is_blacklist=0;
     if( $blackmodel){
         $is_blacklist=1;
      }
    $clientArr = [
        'client' => $client->withoutRelations(),
        'residence' => $propctrlr->country_prop_filter($countrytoptions, 'residence'),
        'nationality' => $propctrlr->country_prop_filter($countrytoptions, 'nationality'),
  
        'family_status' => $propctrlr->client_prop_filter($clientoptions, 'family_status'),
        'family_status_female' => $propctrlr->client_prop_filter($clientoptions, 'family_status_female'),
        'wife_num' => $propctrlr->client_prop_filter($clientoptions, 'wife_num'),
        'since_register' => $client->created_at->diffForHumans(),
    //    'favorite_id' => $favorite->id,
       // 'since_favorite_date' => Carbon::parse($favorite->favorite_date)->diffForHumans(),
 'is_favorite'=> $is_favorite,
 'is_blacklist'=> $is_blacklist,
      ];
      return $clientArr;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete_imgshow($client_id,$clientshow_id)
    {
        PrivateImage::where('client_id', $client_id)->where('showto_id', $clientshow_id)->delete();
       return 1;
    }
  
}
