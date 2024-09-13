<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Favorite extends Model
{
    use HasFactory;
    protected $table = 'favorites';
    protected $fillable = [
        'client_id',
        'fav_to_client_id',
        'is_favorite',
    ];
    
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id')->withDefault();
    }
    public function favtoclient(): BelongsTo
    {
        return $this->belongsTo(Client::class,'fav_to_client_id')->withDefault();
    }
}
