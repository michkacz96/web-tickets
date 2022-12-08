<?php

namespace App\Models;

class DateGetter
{
    public function getLocalCreatedAt(){
        if($this->created_at){
            return auth()->user()->convertDateTimeToLocal($this->created_at);
        }
        
    }

    public function getLocalDeletedAt(){
        if($this->deleted_at){
            return auth()->user()->convertDateTimeToLocal($this->deleted_at);
        }
    }
}
