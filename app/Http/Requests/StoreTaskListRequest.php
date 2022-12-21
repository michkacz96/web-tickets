<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskListRequest extends FormRequest
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
            'private' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'ticket_id' => ['integer'],
            'user_id' => ['required', 'integer']
        ];
    }

    protected function prepareForValidation(){
        $isPublic = $this->isPublic;
        if($isPublic == 'public'){
            $isPublic = 0;
        } else{
            $isPublic = 1;
        }

        if(isset($this->useTask) && $this->useTask == 1){
            $this->merge([
                'private' => $isPublic,
                'name' => $this->name,
                'ticket_id' => $this->ticket,
                'user_id' => auth()->user()->id
            ]);
        } else{
            $this->merge([
                'private' => $isPublic,
                'name' => $this->name,
                'user_id' => auth()->user()->id
            ]);
        }

        
    }
}
