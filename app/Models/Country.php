<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
      //  'name_en',
       // 'name_fr',
        'code'

    ];

    public function clientoptions(): HasMany
    {
        return $this->hasMany(OptionValue::class,'country_id');
    }
    public function cities(): HasMany
    {
        return $this->hasMany(City::class,'country_id');
    }




}
