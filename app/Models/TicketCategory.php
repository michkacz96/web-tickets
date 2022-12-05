<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public static function getCategories(){
        $tab = [];
        $categoies = self::all();

        foreach($categoies as $category){
            $tab += [
                $category->id => $category->name
            ];
        }

        return $tab;
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
