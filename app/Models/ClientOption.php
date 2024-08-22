<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ClientOption extends Model
{
    use HasFactory;

    protected $table = 'clients_options';
    protected $fillable = [
        'client_id',
        'property_id',
        'option_id',
        'val_str',
        'val_int',
        'val_date',
        'notes',
        'type',
        'country_id',
        'city_id',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_id')->withDefault();
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(Property::class,'client_id')->withDefault();
    }
    public function optionvalue(): BelongsTo
    {
        return $this->belongsTo(OptionValue::class,'option_id')->withDefault();
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class,'country_id')->withDefault();
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,'city_id')->withDefault();
    }
}
