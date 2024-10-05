<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientPackage extends Model
{
    use HasFactory;
    protected $table = 'clients_packages';
    protected $fillable = [
        'client_id',
        'package_id',
        'chat_count',
        'search_count',
        'hidden_feature',
        'show_img',
        'special_member',
        'edit_name',
        'favorite_count',
        'expire_duration',
        'chat_count_remain',
        'search_count_remain',
        'favorite_count_remain',
        'status',
        'start_date',
        'end_date',
        'order_id',
        'is_expire',
    ];


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id')->withDefault();
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'package_id')->withDefault();
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id')->withDefault();
    }

}
