<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class OptionGroup extends Model
{
    use HasFactory;
    protected $table = 'options_groups';
    public $timestamps = false;
    protected $fillable = [
        'option_id',
        'group_id',
        'property_id',
        'priority',
        'notes',
        'minop',
        'maxop',
        'country_id',
        'city_id',
    ];

  public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_id')->withDefault();
    }
    public function mainoption(): BelongsTo
    {
        return $this->belongsTo(OptionValue::class,'option_id')->withDefault();
    }
    public function optionrange(): BelongsTo
    {
        return $this->belongsTo(OptionValue::class,'group_id')->withDefault();
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
