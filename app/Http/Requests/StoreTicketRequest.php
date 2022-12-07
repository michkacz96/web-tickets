<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
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
            'ticket_category_id' => ['required', 'integer'],
            'due_date' => ['date_format:Y-m-d H:i:s']
        ];
    }

    protected function prepareForValidation(){
        if(isset($this->use_date)){
            $this->merge([
                'title' => $this->title,
                'description' => $this->description,
                'status' => 'N', //create always new ticket
                'customer_id' => $this->customer,
                'ticket_category_id' => $this->category,
                'created_by' => auth()->user()->id,
                'due_date' => date('Y-m-d H:i:s', strtotime($this->date.$this->time))
            ]);
        } else{
            $this->merge([
                'title' => $this->title,
                'description' => $this->description,
                'status' => 'N', //create always new ticket
                'customer_id' => $this->customer,
                'ticket_category_id' => $this->category,
                'created_by' => auth()->user()->id
            ]);
        }
        
    }
}
