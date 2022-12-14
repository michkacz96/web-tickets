<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'name',
        'full_name',
        'address',
        'building_number',
        'apartment_number',
        'postal_code',
        'city',
        'province',
        'country',
        'tin_ssn'
    ];

    protected static $customerTypes = [
        'B' => 'Business',
        'I' => 'Individual'
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

    public static function getCustomerTypes(){
        return self::$customerTypes;
    }

    public function getCustomers(){
        $customers = self::all();
        $customer_tab = [];

        foreach($customers as $customer){
            $customer_tab += [
                $customer->id => $customer->name
            ];
        }

        return $customer_tab;
    }

    public function getCustomerType(){
        return self::$customerTypes[$this->type];
    }

    public function getAddress(){
        $separator = "/";

        if(empty($this->apartment_number)){
            $separator = "";
        }

        return $this->address.' '.$this->building_number.$separator.$this->apartment_number.' '.$this->postal_code.' '.$this->city;
    }

    public function getAddress2(){
        $separator = ", ";
        if(empty($this->country)){
            $separator = "";
        }
        return $this->province.$separator.$this->country;
    }

    public function getFullAddress(){
        $separator = ", ";

        if(empty($this->getAddress2())){
            $separator = "";
        }
        return $this->getAddress().$separator.$this->getAddress2();
    }

    public function customerContacts(){
        return $this->hasMany(CustomerContact::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
