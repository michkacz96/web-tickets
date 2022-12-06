<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTicketRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:512'],
            'status' => Rule::in(['N', 'A', 'I', 'C']),
            'customer_id' => ['required', 'integer'],
            'ticket_category_id' => ['required', 'integer']
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'title' => $this->title,
            'description' => $this->description,
            'customer_id' => $this->customer,
            'ticket_category_id' => $this->category
        ]);
    }
}
