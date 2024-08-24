<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Web\SiteDataController;
class UpdateNameRequest extends FormRequest
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
      $sitedctrlr = new SiteDataController();
      $transarr = $sitedctrlr->FillTransData( $this->lang);
       $defultlang = $transarr['langs']->first();
      $translate= $sitedctrlr->getbycode($defultlang->id, ['profile-error']);
       return[   
        'name'=>'required|between:1,15|unique:clients,name,'.Auth::guard('client')->user()->id,        
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
  $translate= $sitedctrlr->getbycode($defultlang->id, ['register-error']);
   return[       
     'name.required,name.between'=> $sitedctrlr->gettrans($translate,'required'),
     'name.between'=> 'الاسم يجب ان يكون اقل من 15 حرف',
      'name.unique'=> 'اسم المستخدم غير متاح'
    ];
    
}

}
