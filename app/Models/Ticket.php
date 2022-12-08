<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    private $dateGetter;
    
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
        } else{
            return '<a href="'.route('tickets.assign', ['ticket'=> $this->id]).'" class="text-primary">'.__('Assign ticket').'</a>';
        }
    }

    public function getNameTicketCategory(){
        if($this->ticketCategory){
            return $this->ticketCategory->name;
        } else{
            return 'Category deleted';
        }
    }

    public function getNameCustomer(){
        if($this->customer){
            return $this->customer->name;
        } else{
            return 'Customer deleted';
        }
    }

    public function assignTo($user_id){
        try{
            if($this->status = 'N'){
                $this->status = 'A';
                $this->assigned_to = $user_id;
                $this->save();
            } else{
                throw new Exception('The ticket\'s status is diefrent than NEW');
            }
        } catch(Exception $e){
            return $e;
        }
        
    }


    public function customer(){
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    public function ticketCategory(){
        return $this->belongsTo(TicketCategory::class)->withTrashed();
    }
}
