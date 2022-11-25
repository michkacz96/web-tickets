<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentLanguage extends Model
{
    use HasFactory;

    public static function getText($var, $lang = NULL){
        if($lang == NULL){
            $lang = 'en-us';
        }

        return Self::select(str_replace("-", "_", $lang))->where("VAR_NAME", "=", $var)->value(str_replace("-", "_", $lang));
    }
}
