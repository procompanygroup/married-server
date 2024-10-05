<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'client_id',
        'package_id',
        'status',
        'confirm_date',
        'trans_num',
        'user_id',
        'notes',
        'payment_method',
        'amount',
        'order_num',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id')->withDefault();
    }
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class,'package_id')->withDefault();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }
    public function clientspackages(): HasMany
    {
      //  return $this->belongsTo(Package::class,'package_id')->withDefault();
        return $this->hasMany(ClientPackage::class, 'order_id');
    }

}
