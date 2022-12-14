<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TicketDetail;

class UpdateTicketDetailRequest extends FormRequest
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
        $ticket = TicketDetail::find($this->ticket);

        $this->merge([
            'ticket_id' => $ticket->ticket_id,
            'status' => $ticket->status,
            'user_id' => $ticket->user_id,
            'message' => $this->message
        ]);
    }
}
