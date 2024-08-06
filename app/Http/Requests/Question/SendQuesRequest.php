<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class SendQuesRequest extends FormRequest
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
      // 'content'=>'required|string',
        'cat'=>'required|integer|gt:0',
        'lang'=>'required|integer|gt:0', 
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
     'content.required'=>__('messages.this field is required',[],'ar') ,
    // 'title.alpha_num'=>'The title format must be alphabet',
   
    ];
    
}
}
