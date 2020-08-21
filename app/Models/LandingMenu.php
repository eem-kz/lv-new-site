<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingMenu extends Model
{
    protected $fillable = ['title','link','lang_id', 'status'];
    public $timestamps = false;

    public function languages(){

        return $this->belongsTo(LandingLanguages::class, 'lang_id', 'id');

    }


}
