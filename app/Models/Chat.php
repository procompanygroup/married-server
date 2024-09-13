<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $fillable = [
        'sender_id',
        'reciver_id',
        'content',
        'is_read',
        'read_at',
    ];
    public function sender(): BelongsTo
    {
        return $this->belongsTo(Client::class,'sender_id')->withDefault();
    }
    public function reciver(): BelongsTo
    {
        return $this->belongsTo(Client::class,'reciver_id')->withDefault();
    }

}
