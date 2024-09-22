<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors';
    protected $fillable = [
     'client_id',
'visited_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id')->withDefault();
    }
    public function visited(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'visited_id')->withDefault();
    }

}
