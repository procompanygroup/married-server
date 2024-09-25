<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Web\SiteDataController;
class UpdateMemberImageRequest extends FormRequest
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
       'client_group'=>'required|in:0,1',        
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
   'client_group'=> 'required',
 
    ];
    
}

}
