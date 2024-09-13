<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Hash;
 
class UpdateSpecialRequest extends FormRequest
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
        'is_special'=>'required|in:1,0', 
        'id'=>'required|integer|gt:0',        
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
