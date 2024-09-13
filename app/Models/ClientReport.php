<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ClientReport extends Model
{
    use HasFactory;
    protected $table = 'clients_reports';
    protected $fillable = [
        'sender_id',
        'report_to_client_id',
        'is_report',
    ];
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Client::class,'sender_id')->withDefault();
    }
    public function reporttoclient(): BelongsTo
    {
        return $this->belongsTo(Client::class,'report_to_client_id')->withDefault();
    }

}
