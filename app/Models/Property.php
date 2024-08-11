<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Controllers\Web\StorageController;
class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'name',
        'is_active',
        'type',
        'is_multivalue',
        'notes',
        'image',
        'dep_id',

    ];
    protected $appends= ['image_path'];
    public function getImagePathAttribute(){
        $conv="";
        $strgCtrlr = new StorageController(); 
        if(is_null($this->image) ){
            $conv =$strgCtrlr->DefaultPath('image'); 
        }else if($this->image==''){
            $conv =$strgCtrlr->DefaultPath('image'); 
        } else {
            $url = $strgCtrlr->PropertyPath();
            $conv =  $url.$this->image;
        }     
       
            return  $conv;
     }
    public function optionsvalues(): HasMany
    {
        return $this->hasMany(OptionValue::class,'property_id');
    }
    public function clientoptions(): HasMany
    {
        return $this->hasMany(OptionValue::class,'property_id');
    }
    public function propertydep(): BelongsTo
    {
        return $this->belongsTo(PropertyDep::class,'dep_id')->withDefault();
    }
    public function langposts(): HasMany
    {
        return $this->hasMany(LangPost::class,'property_id');
    }
   
}
