<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskList extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Returns relation with user data
     * @return App\Models\User
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Returns relation with ticket
     * @return App\Models\Ticket
     */
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
