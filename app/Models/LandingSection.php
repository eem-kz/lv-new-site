<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingSection extends Model
{
    public function scopeLang($query, $arg){
        return $query->where('lang', strtoupper($arg));
    }
}
