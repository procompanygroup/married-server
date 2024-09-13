<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Blacklist extends Model
{
    use HasFactory;
    protected $table = 'blacklists';
    protected $fillable = [
        'client_id',
        'black_to_client_id',
        'is_black',

    ];
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id')->withDefault();
    }
    public function blacktoclient(): BelongsTo
    {
        return $this->belongsTo(Client::class,'black_to_client_id')->withDefault();
    }
}
