<?php

namespace App\Http\Requests\ClientSetting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Hash;
 
class UpdateHiddenRequest extends FormRequest
{
    /**
     * Determine if the Clientis authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
     
 
    public function rules(): array
    {      
     //required
       return[      
        'is_hidden'=>'nullable ', 
            
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
     
    ];
    
}

}
