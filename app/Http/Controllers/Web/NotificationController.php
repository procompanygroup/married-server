<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MemberNotify;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class NotificationController extends Controller
{
    //
    public function index($lang)
    {
        $id = Auth::guard('client')->user()->id;

        $sitedctrlr = new SiteDataController();
        $transarr = $sitedctrlr->FillTransData($lang);
        $defultlang = $transarr['langs']->first();

        $Dbnotify_list = auth()->guard('client')->user()->notifications;

        $notify_list = $Dbnotify_list->map(function ($notification) {
            return $this->member_notify_convert($notification);
        });
        $type = 'notify';
        return view(
            "site.page.favorite-list.my-notifications",
            [
                "notify_list" =>  $notify_list,
                'lang' => $lang,
                'defultlang' => $defultlang,
                'type' => $type,
            ]
        );
    }

    public function member_notify_convert($notification)
    {
        $body = '';
        $sincedate = Carbon::parse($notification->created_at)->diffForHumans();
        if ($notification->data['side'] == 'member') {
            $client = Client::find($notification->data['fromclient_id']);
            $client_name = $client->name;
            $client_image = $client->image_path;
            $client_id = $client->id;
        
            switch ($notification->data['type']) {

                case 'visit';
                    $body = 'قام بزيارة ملفك';
                    break;
                case 'like-me';
                    $body = 'أضافك إلى قائمة الاهتمام الخاصة به';
                    break;
                case 'not-like-me';
                    $body = ' حذفك من قائمة الاهتمام الخاصة به';
                    break;
                case 'blacklist-me';
                    $body = 'قام بتجاهلك';
                    break;
                case 'not-blacklist-me';
                    $body = 'حذفك من قائمة التجاهل الخاصة به';
                    break;
                case 'chat-me';
                    $body = 'أرسل لك رسالة';
                    break;
                case 'show-image';
                    $body = 'سمح لك بمشاهدة صورته';
                    break;
                    case 'not-show-image';
                    $body = 'منعك من مشاهدة صورته';
                    break;
                default;
                   $body ='';
                    break;
            }
            $notifyArr = [
                'client_id' => $client_id,
                'client_name' => $client_name,
                'client_image' => $client_image,
                'sincedate' => $sincedate,
                'side'=> $notification->data['side'],
                'body' => $body,   
            ];
        }else{
            $notifyArr = [
                'client_id' => 0,
                'client_name' =>'',
                'client_image' => '',
                'sincedate' => $sincedate,
                'side'=> $notification->data['side'],
                'body' => $notification->data['body'],       
            ];
        }
   
        return $notifyArr;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store_member_notify($client_id,$data)
    {
     
     Client::find($client_id)->notify(new MemberNotify($data));
     return 1;
    }
    public function store_members_notify($client_ids,$data)
    {
          //list of users
 $clints=Client::whereIntegerInRaw('id',$client_ids)->get() ;
 Notification::send( $clints, new MemberNotify($data));
   
     return 1;
    }

}
