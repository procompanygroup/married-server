<?php

namespace App\Http\Requests\Option;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
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
        $property_id = $this->property_id;
      $type=  Property::find($property_id)->type;
       return[
       'name'=>'required|string',            
       'type'=>'required|not_in:0|in:'.$type,     
       'property_id'=>'required|gt:0',
       'op_val'=>'required',
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
