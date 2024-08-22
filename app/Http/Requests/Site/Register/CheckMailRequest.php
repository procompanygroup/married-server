<?php

namespace App\Http\Requests\Site\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\SiteDataController;
class CheckMailRequest extends FormRequest
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
        'data.email'=> 'required|email|unique:clients,email',              
       ];   
    
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{   

   return[        
    // 'email.required'=>__('message.email is already exist',[],'ar'),  ,  
    // 'data.oathed.required'=>$sitedctrlr->gettrans($translate,'required') ,  
    
 
    ];
    
}

}
