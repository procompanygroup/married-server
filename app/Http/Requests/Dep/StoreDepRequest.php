<?php

namespace App\Http\Requests\Dep;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
  
       return[
       'name'=>'required|string', 
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
     'name.required'=>__('messages.this field is required',[],'ar') ,
   
    ];
    
}
}
