<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class City extends Model
{
  use HasFactory;
  protected $fillable = [
    'id',
   // 'name_en',
    'name_ar',
   // 'name_fr',
    'code',
    'country_id'

  ];
  public function clientoptions(): HasMany
  {
      return $this->hasMany(OptionValue::class,'city_id');
  }

  public function country(): BelongsTo
  {
      return $this->belongsTo(Country::class,'country_id')->withDefault();
  }


}
