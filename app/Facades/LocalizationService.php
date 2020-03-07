<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.03.2020
 * Time: 17:41
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class LocalizationService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Localization";
    }

}