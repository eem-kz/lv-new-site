<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 30.09.2019
 * Time: 23:13
 */

namespace App\Services;


class Localization
{
    /**
     * @return \Illuminate\Config\Repository|mixed|null|string
     */
    public function getLocale()
    {
        $defaultLocale = config("app.locale");

        $locale = request()->segment(1, $defaultLocale);

        if ($locale && in_array($locale, config("app.locales"))) {
            return $locale;
        }
        return abort(404);

    }

}