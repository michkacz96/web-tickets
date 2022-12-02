<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->type == 'E' || $this->type == 'e'){
            return [
            'type' => Rule::in(['P', 'E']),
            'customer' => ['required'],
            'value' => ['required', 'email']
            ];
        } elseif($this->type == 'P' || $this->type == 'p'){
            return [
                'type' => Rule::in(['P', 'E']),
                'customer' => ['required'],
                'value' => ['required', 'max:12']
            ];
        }
        
    }

    protected function prepareForValidation(){
        $this->type = strtoupper($this->type);

        $this->merge([
            'type' => $this->type,
            'customer_id' => $this->customer,
            'value' => $this->value
        ]);
    }
}
