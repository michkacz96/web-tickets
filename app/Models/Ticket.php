<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'status',
        'customer_id',
        'ticket_category_id',
        'user_id',
        'due_date'
    ];

    private static $statuses = [
        'N' => 'New',
        'A' => 'Assigned',
        'I' => 'In progress',
        'C' => 'Closed'
    ];

    public static function getStatuses(){
        return self::$statuses;
    }

    public function getStatus(){
        return self::$statuses[$this->status];
    }

    public function isOverdue(){
        $now = new DateTime("now");

        if($now >= $this->due_date){
            return true;
        } else{
            return false;
        }
    }

    public function setOverdue(){
        if($this->isOverdue()){
            $this->overdue = 1;
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    public function ticketCategory(){
        return $this->belongsTo(TicketCategory::class)->withTrashed();
    }
}
