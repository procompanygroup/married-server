<?php

namespace App\Http\Requests\AiAdmin;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class StoreRangeRequest extends FormRequest
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
       'mainop_id'=>'required|not_in:0', 
       'group_op'=>'required',           
       
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
     'mainop_id.required'=>__('messages.this field is required',[],'ar') ,
   
    ];
    
}
}
