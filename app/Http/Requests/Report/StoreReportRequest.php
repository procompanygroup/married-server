<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
       'report-sel'=>'required|string',   
       //'sender_id'=>'required|integer|in:'.auth()->guard('client')->user()->id,   
       'member_id'=>'required|integer|not_in:0',   
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
     'report-sel.required'=>__('messages.this field is required',[],'ar'),  
    ];
    
}
}
