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

    /**
     * @param $date
     * @return false|string
     */
    public  function convertDateToMysqlFormat($date)
    {
        return date("Y-m-d", strtotime( preg_replace("/(\d{2})-(\d{2})-(\d{4})/", "$3-$2-$1", $date) ));
    }


    /**
     * @param $date
     * @return null|string|string[]
     */
    public function reverseConvertDate($date)
    {
        return preg_replace("/(\d{4})-(\d{2})-(\d{2})/", "$3-$2-$1", $date);
    }

    /**
     * @param $str
     * @param array $options
     * @return bool|mixed|null|string|string[]
     */
    public function slugKazToLat($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
                'delimiter' => '-',
                'limit' => 50,
                'lowercase' => true,
                'replacements' => array(),
                'transliterate' => true,
        );

        // Merge options
        $options = array_merge($defaults, $options);

        $char_map = array(

            // Russian
                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
                'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
                'Я' => 'Ya', 'Ә'=>'A', 'І'=>'I', 'Ң'=>'N', 'Ғ'=>'G', 'Ү'=>'Y', 'Ұ'=>'Y',  'Қ'=>'Q', 'Ө'=>'O', 'Һ'=>'H',

                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
                'я' => 'ya', 'ә'=>'a', 'і'=>'i', 'ң'=>'n', 'ғ'=>'g', 'ү'=>'y', 'ұ'=>'y',  'қ'=>'q', 'ө'=>'o', 'һ'=>'h',
        );

        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }

        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }



}