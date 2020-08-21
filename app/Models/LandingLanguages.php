<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class LandingLanguages extends Model
{
    protected $fillable = ['name','description','slug'];
    public $timestamps = false;


    public function menu(){
        return $this->hasMany(LandingMenu::class,'lang_id')->select(['id','title','link','lang_id']);
    }

    public function text(){
        return $this->hasMany(LandingSection::class,'lang_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function scopeLang($query, $arg)
    {
        return $query->where('lang', strtoupper($arg));
    }

}
