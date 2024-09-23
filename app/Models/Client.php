<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Controllers\Web\StorageController;
use App\Notifications\ClientResetPasswordNotification;
use Illuminate\Support\Carbon;
//use App\Http\Controllers\Web\StorageController;
class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'email_verified_at',
        'first_name',
        'last_name',
        'user_name',
        'role',
        'token',
        'mobile',
        'createuser_id',
        'updateuser_id',
        'image',
        'is_active',
        'desc',
        'country',
        'gender',
        'birthdate',
        'facebook_id',
        'total_balance',
        'balance',
        'lang_id',

        'code',
        'expire_at',
        'lastseen_at',
        'is_special',
        'is_hidden',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = ['image_path', 'gender_conv', 'age'];
    public function getImagePathAttribute()
    {
        $conv = "";
        $strgCtrlr = new StorageController();
        if (is_null($this->image)) {
            $conv = $strgCtrlr->DefaultPath($this->gender);
        } else if ($this->image == '') {
            $conv = $strgCtrlr->DefaultPath($this->gender);
        } else {
            $url = $strgCtrlr->ClientPath();
            $conv = $url . $this->image;
        }

        return $conv;
    }

    public function getGenderConvAttribute()
    {
        $conv = "-";
        if ($this->gender) {
            if ($this->gender == 'male') {
                $conv = __('general.male', ['ar']);
            } else {
                $conv = __('general.female', ['ar']);
            }
        }

        return $conv;
    }

    //


    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }
    public function pointtrans(): HasMany
    {
        return $this->hasMany(PointTrans::class, 'client_id');
    }
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id')->withDefault();
    }
    public function clientoptions(): HasMany
    {
        return $this->hasMany(ClientOption::class, 'client_id');
    }

    public function chatsenders(): HasMany
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }
    public function chatsrecivers(): HasMany
    {
        return $this->hasMany(Chat::class, 'reciver_id');
    }
 
    public function blacklists(): HasMany
    {
        return $this->hasMany(Blacklist::class, 'client_id');
    }
    public function blacktoclients(): HasMany
    {
        return $this->hasMany(Blacklist::class, 'black_to_client_id');
    }

    public function reporters(): HasMany
    {
        return $this->hasMany(ClientReport::class, 'sender_id');
    }
    public function reporttoclients(): HasMany
    {
        return $this->hasMany(ClientReport::class, 'report_to_client_id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'client_id');
    }
    public function favoritestoclients(): HasMany
    {
        return $this->hasMany(Favorite::class, 'fav_to_client_id');
    }
    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class, 'client_id');
    }
    public function visitedclients(): HasMany
    {
        return $this->hasMany(Visitor::class, 'visited_id');
    }

    public function clientsimages(): HasMany
    {
        return $this->hasMany(PrivateImage::class, 'client_id');
    }
    public function clientsshowto(): HasMany
    {
        return $this->hasMany(PrivateImage::class, 'showto_id');
    }

    public function generateCode()
    {
        $this->timestamps = false;
        $this->code = rand(100000, 999999);
        $this->expire_at = now()->addMinutes(15);
        $this->save();
    }

    public function restCode()
    {
        $this->timestamps = false;
        $this->code = null;
        $this->expire_at = null;
        $this->save();
    }

}
