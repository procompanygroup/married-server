<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PrivateImage extends Model
{
    use HasFactory;
    protected $table = 'private_images';
    protected $fillable = [
'client_id',
'showto_id',
'is_show',

    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id')->withDefault();
    }
    public function showtoclient(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'showto_id')->withDefault();
    }
}
