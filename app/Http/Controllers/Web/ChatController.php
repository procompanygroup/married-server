<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
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
             })->with('sender','reciver')->get();

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
     
    $dbList= Chat::where(function($query)use($sender_id,$reciver_id) {
     return $query->orWhere(
      function($query)use($sender_id,$reciver_id) {
        return $query
               ->where('sender_id',$sender_id)
               ->where('reciver_id', $reciver_id);
       })->orWhere(
          function($query)use($sender_id,$reciver_id) {
            return $query
                   ->where('sender_id',$reciver_id)
                   ->where('reciver_id', $sender_id);
           });
    })->where('id','>',$last_id)->with('sender','reciver')->get();
     
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
