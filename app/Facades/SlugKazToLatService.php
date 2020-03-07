<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;



class SlugKazToLatService extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SlugKazToLat';
    }


}