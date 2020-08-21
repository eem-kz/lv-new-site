<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingSection extends Model
{
    protected $fillable = ['text','slug','lang_id'];
    public $timestamps = false;

    public function languages(){

        return $this->belongsTo(LandingLanguages::class, 'lang_id', 'id');

    }
}
