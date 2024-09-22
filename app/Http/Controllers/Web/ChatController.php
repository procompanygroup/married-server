<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\Client;
use App\Http\Controllers\Web\PropertyController;
use Illuminate\Support\Carbon;
class ChatController extends Controller
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
    public function send(Request $request)
    {
        $formdata = $request->all();
  
        if (Auth::guard('client')->check()) {

            $auth_id = Auth::guard('client')->user()->id;
$sender_id=$auth_id;
$reciver_id=$formdata['reciver_id'];
 
  if($auth_id==$sender_id){
     
    $newObj=new Chat();

    $newObj->sender_id = $sender_id;
    $newObj->reciver_id = $reciver_id;
    $newObj->content = $formdata['content'];
    $newObj->is_read = 0;
  $newObj->save();
   $chatArr=$this->mapmsg( $newObj,$auth_id);
  //  $newObj->read_at = $formdata['read_at'];
  return response()->json($chatArr);
  }else{
    return response()->json('error');
  }
        }else{
            return response()->json('error');
          }

    }

    public function show(Request $request)
    {
        $formdata = $request->all();
        if (Auth::guard('client')->check()) {
            $auth_id = Auth::guard('client')->user()->id;
$sender_id=  $auth_id;
$reciver_id=$formdata['reciver_id'];
  if($auth_id==$sender_id){
     
    // $dbList= Chat::orWhere(
    //     function($query)use($sender_id,$reciver_id) {
    //       return $query
    //              ->where('sender_id',$sender_id)
    //              ->where('reciver_id', $reciver_id);
    //      })->orWhere(
    //         function($query)use($sender_id,$reciver_id) {
    //           return $query
    //                  ->where('sender_id',$reciver_id)
    //                  ->where('reciver_id', $sender_id);
    //          })->with('sender','reciver')->latest()->take(10)->get();
    $dbList=$this->chat_query($sender_id,$reciver_id);
             $dbList= $dbList->latest()->take(10)->get();
           // $dbList=$dbList->sortByDesc('id');
           //  $dbList=$dbList->sortBy('id');
           $dbList= $dbList->reverse()->values();
           $List=  $this->mapclientmsg($dbList,$auth_id);

             return response()->json($List);
  //  $newObj->read_at = $formdata['read_at'];
   
  }else{
    return response()->json('error');
  }
        }else{
            return response()->json('error');
          }

    }
    
    public function showlast(Request $request)
    {
        $formdata = $request->all();
        if (Auth::guard('client')->check()) {
            $auth_id = Auth::guard('client')->user()->id;
$sender_id=  $auth_id;
$reciver_id=$formdata['reciver_id'];
$last_id=$formdata['last_id'];
  if($auth_id==$sender_id){

    // $dbList= Chat::where(function($query)use($sender_id,$reciver_id) {
    //  return $query->orWhere(
    //   function($query)use($sender_id,$reciver_id) {
    //     return $query
    //            ->where('sender_id',$sender_id)
    //            ->where('reciver_id', $reciver_id);
    //    })->orWhere(
    //       function($query)use($sender_id,$reciver_id) {
    //         return $query
    //                ->where('sender_id',$reciver_id)
    //                ->where('reciver_id', $sender_id);
    //        });
    // })->where('id','>',$last_id)->with('sender','reciver')->get();
    $dbList=$this->chat_query($sender_id,$reciver_id);
    $dbList= $dbList->where('id','>',$last_id)->get();
          //   $dbList= $dbList->where('id','>',$last_id)->with('sender','reciver')->get();
           $List=  $this->mapclientmsg($dbList,$auth_id);

             return response()->json($List);
  //  $newObj->read_at = $formdata['read_at'];
   
  }else{
    return response()->json('error');
  }
        }else{
            return response()->json('error');
          }

    }
    public function mapclientmsg( $dbchat_list,$authuser_id)
    {
      
      $List = $dbchat_list->map(function ($chat) use ($authuser_id) {
        $arr = [];
        $side='';
        if($authuser_id==$chat->sender_id){
            $side='r';
        }else{
            $side='l';
        }
          $arr = [
            'id' => $chat->id,
            'sender_id' => $chat->sender_id,
            'reciver_id' => $chat->reciver_id,
            'sender_name' => $chat->sender->name,
            'reciver_name' => $chat->reciver->name,
'side'=>$side,
            'create_date' => $chat->created_at->format('d/m/Y'),
            'create_time' => $chat->created_at->format('H:m'),             
            'content' => $chat->content,     
            'sender_image' => $chat->sender->image_path,
            'reciver_image' =>$chat->reciver->image_path,
          ];
         
        return $arr;
      });
      return $List;
  
    }

    public function mapmsg( $chatmodel,$authuser_id)
    {      
 
        $arr = [];
        $side='';
        if($authuser_id==$chatmodel->sender_id){
            $side='r';
        }else{
            $side='l';
        }
          $arr = [
            'id' => $chatmodel->id,
            'sender_id' => $chatmodel->sender_id,
            'reciver_id' => $chatmodel->reciever_id,
            'sender_name' => $chatmodel->sender->name,
            'reciver_name' => $chatmodel->reciver->name,
'side'=>$side,
            'create_date' => $chatmodel->created_at->format('d/m/Y'),
            'create_time' => $chatmodel->created_at->format('H:m'),             
            'content' => $chatmodel->content,     
            'sender_image' => $chatmodel->sender->image_path,
            'reciver_image' =>$chatmodel->reciver->image_path,
          ];
         
        return $arr;
  
  
    }
    public function chat_query($sender_id,$reciver_id)
    {
    $dbList= Chat::orWhere(
      function($query)use($sender_id,$reciver_id) {
        return $query
               ->where('sender_id',$sender_id)
               ->where('reciver_id', $reciver_id);
       })->orWhere(
          function($query)use($sender_id,$reciver_id) {
            return $query
                   ->where('sender_id',$reciver_id)
                   ->where('reciver_id', $sender_id);
           })->with('sender','reciver');
           return $dbList;
          }
    public function inbox($lang)
    {
      $id = Auth::guard('client')->user()->id;
      $sitedctrlr = new SiteDataController();
      $transarr = $sitedctrlr->FillTransData($lang);
      $defultlang = $transarr['langs']->first();
      
       $List= Chat::orWhere('sender_id',$id)->orWhere('reciver_id',$id)->select('id','sender_id','reciver_id')->get();
      $senderids= data_get($List, '*.sender_id');
      $reciverids=data_get($List, '*.reciver_id');    
      $allids=array_merge($senderids, $reciverids);
      $allids= collect($allids)->unique()->values();
      //delete auth id
      $allids=$allids->reject(function ($value)use( $id ) {
        return $value == $id;
    })->values();
    $all_last_arr=[];
    foreach ( $allids as  $client_id) {
      $dbList=$this->chat_query($id,$client_id);
      $dblastchat=  $dbList->orderByDesc('created_at')->first()->makeHidden(['sender','reciver']);
//$chat=$dblastchat
$client=$this->clientwith_map($client_id);
$chat=$this->chatwith_map($dblastchat);
$rowArr=[
  'client'=> $client,
  'chat'=>$chat,
  'created_at'=>$dblastchat->created_at , 
];
      $all_last_arr[]=$rowArr;
    }
   
      $all_last_arr=collect($all_last_arr)->sortByDesc('created_at');
      return view(
        "site.page.favorite-list.inbox",
        [
         "chat_list" =>  $all_last_arr,
          'lang' => $lang,
          'defultlang' => $defultlang,
        
        ]
      );
    }
    /**
     * Store a newly created resource in storage.
     */

    public function clientwith_map($client_id)
    {
      $dbclient=Client::with(
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
              }
            ]
          )->find($client_id);
          $propctrlr=new PropertyController();
      $client = $this->client_prop_map($dbclient,  $propctrlr);
      return $client;
    }
    public function client_prop_map($client, PropertyController $propctrlr)
    {   
      $clientoptions = $propctrlr->client_prop_list($client->clientoptions);
      $countrytoptions = $propctrlr->country_prop_list($client->clientoptions);
      $clientArr = [
        'client' => $client->withoutRelations(),
        'residence' => $propctrlr->country_prop_filter($countrytoptions, 'residence'),
        'nationality' => $propctrlr->country_prop_filter($countrytoptions, 'nationality'),
  
        'family_status' => $propctrlr->client_prop_filter($clientoptions, 'family_status'),
        'family_status_female' => $propctrlr->client_prop_filter($clientoptions, 'family_status_female'),
        'wife_num' => $propctrlr->client_prop_filter($clientoptions, 'wife_num'),
      //  'since_register' => $client->created_at->diffForHumans(),
       // 'visited_id' => $favorite->id,
        //'since_visit_date' => Carbon::parse($favorite->created_at)->diffForHumans(),
      ];
      return $clientArr;
    }

    public function chatwith_map( $chatmodel)
    {  
           $arr = [
            'id' => $chatmodel->id,
            'since_date' => Carbon::parse($chatmodel->created_at)->diffForHumans(),  
           
            'content' => $chatmodel->content,       
          ];         
        return $arr;
      }

    /**
     * Display the specified resource.
     */
     

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
    public function destroymember_chat($id)
    {
          //delete  
          $item = Chat::find($id);
          if (!( $item  === null)) {
            $id = Auth::guard('client')->user()->id;
            if($item->sender_id== $id || $item->reciver_id==$id){
          //    Chat::find($id)->delete();
             $chatlist=$this->chat_query($item->sender_id,$item->reciver_id);
             $res=$chatlist->delete();
             return response()->json("ok");
            }         
          }
          return response()->json("error",422);
      
         
    }
}
