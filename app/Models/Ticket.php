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
        'created_by',
        'assigned_to',
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

        if($this->close_date !== NULL){
            if($now >= $this->due_date){
                return true;
            }
        }
        return false;
    }

    public function setOverdue(){
        if($this->isOverdue()){
            $this->overdue = 1;
        }
    }

    public function getColorTable(){
        if($this->overdue){
            return 'class=table-danger';
        } elseif($this->status == 'C'){
            return 'class=table-success';
        } elseif($this->status == 'I'){
            return 'class=table-warning';
        } else{
            return 'class=table-default';
        }
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function assignedTo(){
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function getNameCreatedBy(){
        if($this->createdBy){
            return $this->createdBy->name;
        }
    }

    public function getNameAssignedTo(){
        if($this->assignedTo){
            return $this->assignedTo->name;
        }
    }

    public function customer(){
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    public function ticketCategory(){
        return $this->belongsTo(TicketCategory::class)->withTrashed();
    }
}
