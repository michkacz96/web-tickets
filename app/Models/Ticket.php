<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    private static $statuses = [
        'N' => 'New',
        'A' => 'Assigned',
        'I' => 'In progress',
        'C' => 'Closed'
    ];

    public ststic function getStatuses(){
        return self::$statuses;
    }
}
