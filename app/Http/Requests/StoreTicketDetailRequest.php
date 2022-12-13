<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ticket;

class StoreTicketDetailRequest extends FormRequest
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
            'ticket' => ['required'],
            'message' => ['required', 'max:1000']
        ];
    }

    protected function prepareForValidation(){
        $ticket = Ticket::find($this->ticket);

        $this->merge([
            'ticket_id' => $ticket->id,
            'status' => $ticket->status,
            'user_id' => auth()->user()->id,
            'msg' => $this->message
        ]);
    }
}
