<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'type',
        'value',
        'tags'
    ];

    private static $contatcTypes = [
        'E' => 'Email',
        'P' => 'Phone'
    ];

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
    
    public static function getContactTypes(){
        return self::$contatcTypes;
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
