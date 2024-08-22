<?php

namespace App\Http\Requests\Site\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\SiteDataController;
class BeforRequest extends FormRequest
{
    /**
     * Determine if the Clientis authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public static $lang="";
 
 
    public function rules(): array
    {     
       return[                      
        'data.gender'=>'required|in:male,female',
         'data.oathed'=>'required',    
         
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
     'data.gender.required'=>$sitedctrlr->gettrans($translate,'required') ,  
     'data.oathed.required'=>$sitedctrlr->gettrans($translate,'required') ,  
     'data.gender.in'=>$sitedctrlr->gettrans($translate,'required') ,  
    //  'name.between'=>$sitedctrlr->gettrans($translate,'input-between') ,
    //  'name.regex'=>$sitedctrlr->gettrans($translate,'no-symbols') , 

    //  'name.unique'=>__('messages.The user_name is already exist',[],'ar'),   
    //  'gender'=>$sitedctrlr->gettrans($translate,'required') , 
    //  'country'=>$sitedctrlr->gettrans($translate,'required') , 
    //  'image.file'=> $sitedctrlr->gettrans($translate,'file-image'),
    //  'image.image'=> $sitedctrlr->gettrans($translate,'file-image'),
    ];
    
}

}
