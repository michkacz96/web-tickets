<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
        return [
            'type' => Rule::in(['I', 'B']),
            'name' => ['required', 'max:255'],
            'full_name' => ['max:255'],
            'address' => ['max:100'],
            'building_number' => ['max:12'],
            'apartment_number' => ['max:6'],
            'postal_code' => ['max:12'],
            'city' => ['max:100'],
            'province' => ['max:100'],
            'country' => ['max:100'],
            'tin_ssn' => ['max:20']
        ];
    }

    protected function prepareForValidation(){
        $this->type = strtoupper($this->type);

        if(empty($this->full_name)){
            $this->full_name = $this->name;
        }

        $this->merge([
            'type' => $this->type,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'building_number' => $this->building_number,
            'apartment_number' => $this->apartment_number,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'province' => $this->province,
            'country' => $this->country,
            'tin_ssn' => $this->tin_ssn
        ]);
    }
}
