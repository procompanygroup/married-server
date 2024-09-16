<?php

namespace App\Http\Requests\ReportOption;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportOptionRequest extends FormRequest
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
      
       'content'=>'required|string',   
         
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
     'content.required'=>__('messages.this field is required',[],'ar'),  
    ];
    
}
}
