<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;

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
    /**
     * Returns time and date converted from servers UTC to user's timezone of created_at property
     * @return string created_at
     */
    public function getLocalCreatedAt(){
        if($this->created_at){
            return auth()->user()->convertDateTimeToLocal($this->created_at);
        } 
    }

    /**
     * Returns time and date converted from servers UTC to user's timezone of deleted_at property
     * @return string deleted_at
     */
    public function getLocalDeletedAt(){
        if($this->deleted_at){
            return auth()->user()->convertDateTimeToLocal($this->deleted_at);
        }
    }

    /**
     * Returns array of avaiable statuses
     * @return array statuses
     */
    public static function getStatuses(){
        return self::$statuses;
    }

    /**
     * Returns status' full name of given object from statuses array
     * @return string
     */
    public function getStatusName(){
        return self::$statuses[$this->status];
    }

    /**
     * Returns true or false if given task is overdue. Calculate on UTC
     * @return boolean
     */
    public function isOverdue(){
        if($this->close_date){
            $now = new DateTime("now");

            if($this->close_date !== NULL){
                if($now >= $this->due_date){
                    return true;
                }
            }
            return false;
        }
    }

    /**
     * Sets given task as overdue in database
     * @return boolean
     */
    public function setOverdue(){
        $this->overdue = 1;
        $this->save();

        return true;
    }

    /**
     * Returns Bootstrap 5 class with coresponding color for task table
     * @return string
     */
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

    /**
     * Returns user's name who created given ticket or nothing
     * @return string
     */
    public function getNameCreatedBy(){
        if($this->createdBy){
            return $this->createdBy->name;
        }
    }

    /**
     * Returns user's name who is assigned given ticket or nothing
     * @return string
     */
    public function getNameAssignedTo(){
        if($this->assignedTo){
            return $this->assignedTo->name;
        }
        // if($this->status == 'N' && !$this->assignedTo){
        //     if($this->created_by == auth()->user()->id){
        //         return '<a href="'.route('tickets.assign', ['ticket'=> $this->id]).'" class="text-primary">'.__('Assign ticket').'</a>';
        //     }
        // } else{
            
        // } 
    }

    /**
     * Returns true if currently signed in user is assigned to a task
     * @return boolean
     */
    public function isAssignedToUser(){
        if($this->assigned_to == auth()->user()->id && $this->status == 'A'){
            return true;
        } else{
            return false;
        }
    }

    /**
     * returns true when ticket is accepted by assigned user and changes status to 'In progress'
     * @return boolean
     */
    public function acceptTicket(){
        $this->status = 'I';
        $this->save();

        return true;
    }

    /**
     * returns true when ticket is declined by assigned user. Changes status to 'New' and deletes currently assigned user
     * @return boolean
     */
    public function refuseTicket(){
        $this->status = 'N';
        $this->assigned_to = null;
        $this->save();

        return true;
    }

    /**
     * Returns name of ticket's category. When category is deleted from database returns string 'Category deleted'
     * @return string
     */
    public function getNameTicketCategory(){
        if($this->ticketCategory){
            return $this->ticketCategory->name;
        } else{
            return __('Category deleted');
        }
    }

    /**
     * Returns customer's name assigned to the ticket. When customer is deleted from database returns string 'Customer deleted'
     * @return string
     */
    public function getNameCustomer(){
        if($this->customer){
            return $this->customer->name;
        } else{
            return __('Customer deleted');
        }
    }

    /**
     * Returns true after changing ticket's status to 'Assigned' and assigning @param user_id to assigned_to
     * @param integer $user_id
     * @return boolean
     */
    public function assignTo($user_id){
        $this->status = 'A';
        $this->assigned_to = $user_id;
        $this->save();
            
        return true;
    }

/**
 * !! Relations between models !!
 */

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function assignedTo(){
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    public function ticketCategory(){
        return $this->belongsTo(TicketCategory::class)->withTrashed();
    }
}
