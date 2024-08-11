<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
       'image'=>'file|mimes:jpg,bmp,png,jpeg,gif,svg',       
       'type'=>'required|not_in:0',     
       'dep_id'=>'required|gt:0',
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
