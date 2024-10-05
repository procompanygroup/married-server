<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $fillable = [
        'name',
'code',
'chat_count',
'search_count',
'favorite_count',
'hidden_feature',
'show_img',
'special_member',
'edit_name',

'expire_duration',
'is_expire',
'is_active',
'image',
'price',
    ];

    public function clientspackages(): HasMany
    {
        return $this->hasMany(ClientPackage::class, 'package_id');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'package_id');
    }


}
