<?php

namespace app\components;

class Formatter extends \yii\i18n\Formatter
{
    public $nullDisplay = '[нет данных]';
    public $phoneFormat = '/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{2})([0-9]{2})/';
    public $phoneMask = '$1 ($2) $3-$4-$5';

    public function asPhone($number)
    {
        if ($number == null) {
            return $this->nullDisplay;
        } else {
            return $this->formatPhone($number);
        }
    }

    private function formatPhone($number)
    {
        $number = preg_replace('/[^0-9]/', '', $number);
        $number = preg_replace($this->phoneFormat, $this->phoneMask, $number);
        return $number;
    }
}