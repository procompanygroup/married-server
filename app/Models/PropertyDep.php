<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class PropertyDep extends Model
{
    use HasFactory;
    protected $table = 'properties_deps';
    protected $fillable = [
        'name',
        'image',
        'notes',
    ];
  
    public function property(): HasMany
    {
        return $this->hasMany(Property::class,'dep_id');
    }
    public function langposts(): HasMany
    {
        return $this->hasMany(LangPost::class,'property_id');
    }
}
