<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ticketOwner(){
        return $this->hasMany(Ticket::class);
    }

    public function convertDateTimeToLocal($dateTime){
        $dbdateUTC = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime, 'UTC');
        $localtime = $dbdateUTC->setTimezone($this->timezone);
        return $localtime;
    }

    public function convertDateTimeToUtc($dateTime){
        $localtime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime, $this->timezone);
        $dbdateUTC = $dbdateUTC->setTimezone('UTC');
        return $dbdateUTC;
    }
}
