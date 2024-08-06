<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuesRequest extends FormRequest
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
        'category_id'=>'required|integer|gt:0',
        'lang_id'=>'required|integer|gt:0', 
        'type'=>'required|in:text,image',
     
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
