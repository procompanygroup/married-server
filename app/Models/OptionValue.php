<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class OptionValue extends Model
{
    use HasFactory;
    protected $table = 'optionsvalues';
    protected $fillable = [
        'name',
        'is_active',
        'value',
        'value_int',
        'notes',
        'property_id',
        'type',

    ];
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_id')->withDefault();
    }
    public function clientoptions(): HasMany
    {
        return $this->hasMany(OptionValue::class,'property_id');
    }
}
