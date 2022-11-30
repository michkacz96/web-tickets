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

    public static function getCustomerTypes(){
        return self::$customerTypes;
    }

    public function getAddress(){
        return $this->address.' '.$this->building_number.'/'.$this->apartment_number;
    }
}
