<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LangPost extends Model
{
    use HasFactory;

    protected $table = 'lang_posts';
    protected $fillable = [
        'lang_id',
        'category_id',
        'post_id',
        'dep_id',
        'property_id',
        'optionvalue_id',
        'main_table',
        'title_trans',
        'content_trans',
        'notes',
        'name',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class)->withDefault();
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id')->withDefault();
    }
    public function propertydep(): BelongsTo
    {
        return $this->belongsTo(PropertyDep::class,'dep_id')->withDefault();
    }
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_id')->withDefault();
    }
    public function optionvalue(): BelongsTo
    {
        return $this->belongsTo(OptionValue::class,'optionvalue_id')->withDefault();
    }
   

}
