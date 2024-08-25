<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Web\SiteDataController;
class AdvanceRequest extends FormRequest
{
    /**
     * Determine if the Clientis authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public static $lang="";
protected   $minpass=6;
protected   $maxpass=16;
protected  $minMobileLength=10;
protected $maxMobileLength=15;
protected $maxlength=500;
protected $alphaexpr='/^[\pL\s\_\-\0-9]+$/u';
protected $alphaAtexpr='/^[\pL\s\_\-\@\.\0-9]+$/u';
    public function rules( ): array
    {
       
     // $this->lang=$lang;
       return[
         
           'name'=>'required|string|between:1,15|unique:clients,name|regex:'.$this->alphaAtexpr,               
         'email'=>'required|email|unique:clients,email',      
         'password'=>'required|between:'. $this->minpass.','. $this->maxpass,
         'confirm_password' => 'same:password',  
         'wife_num'=> 'sometimes|required|not_in:0',
         'wife_num_female'=> 'sometimes|required|not_in:0',
         'family_status'=> 'sometimes|required|not_in:0',
         'family_status_female'=> 'sometimes|required|not_in:0',         
         'veil'=> 'sometimes|required|not_in:0',
         'beard'=> 'sometimes|required|not_in:0',
         'birthdate'=> 'required|date',
         'children_num'=> 'required|not_in:-1',
         'residence'=> 'required|not_in:0',
         'nationality'=> 'required|not_in:0',
         'city'=> 'required|not_in:0',
         'weight'=> 'required|not_in:0',
         'height'=> 'required|not_in:0',
         'skin'=> 'required|not_in:0',
         'religiosity'=> 'required|not_in:0',
         'prayer'=> 'required|not_in:0',
         'smoking'=> 'required|not_in:0',
       
         'education'=> 'required|not_in:0',
         'financial'=> 'required|not_in:0',
         'job'=> 'required',
         'income'=> 'required|not_in:0',
         'health'=> 'required|not_in:0',
         'partner'=> 'nullable|string|max:1000',
         'about_me'=> 'nullable|string|max:1000',

         'first_name'=> 'required|string|max:100',
         'mobile'=> 'required|min:9|max:15',
         'acceptConditions'=> 'required',
         'gender'=>'required|in:male,female',
      //  'image'=>'nullable|file|image',   
       ];   
    
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{
   $sitedctrlr = new SiteDataController();
   $transarr = $sitedctrlr->FillTransData( $this->lang);
    $defultlang = $transarr['langs']->first();
   $translate= $sitedctrlr->getbycode($defultlang->id, ['register','register-error']);  
   return[   
      'confirm_password.same' => $sitedctrlr->gettrans($translate,'input-same') ,          
     'name.required'=> $sitedctrlr->gettrans($translate,'required'), 
     'name.regex'=>$sitedctrlr->gettrans($translate,'no-symbols') ,  
     'name.between'=>$sitedctrlr->gettrans($translate,'input-between') , 
     //'name.unique'=>$sitedctrlr->gettrans($translate,'user-name-exist'),  
     'email.required'=>  $sitedctrlr->gettrans($translate,'required'),
     'email.email'=>$sitedctrlr->gettrans($translate,'input-email') ,
   'email.unique'=>$sitedctrlr->gettrans($translate,'email-exist')  ,  
     'password.between'=>$sitedctrlr->gettrans($translate,'password-between'),   
     'password.required'=> $sitedctrlr->gettrans($translate,'required'),
     'image.file'=> $sitedctrlr->gettrans($translate,'file-image'),
     'image.image'=> $sitedctrlr->gettrans($translate,'file-image'),
    ];
    
}

}
