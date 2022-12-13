<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_id',
        'status',
        'user_id',
        'msg'
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
     * Returns user data of given detail
     * @return App\Models\User
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Returns user data of given detail
     * @return App\Models\Ticket
     */
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
