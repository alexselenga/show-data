<?php

namespace app\components;

use yii\helpers\Inflector;

class TestHelper
{
    public static function truncateString($string, $wordLimit = 12)
    {
        $string = preg_replace("/\s+/", ' ', $string);
        $words = explode(' ', $string);
        $words = array_slice($words, 0, $wordLimit);
        return implode(' ', $words);
    }


    public static function underscore2camel($id)
    {
        return Inflector::id2camel($id, '_');
    }

    public static function ru2en($string)
    {
        return Inflector::transliterate($string);
    }
}