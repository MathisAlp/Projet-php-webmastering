<?php
namespace ism\lib;

class FormatDate{

    public static function dateToStringFr($date){
        $date = \DateTime::createFromFormat('YYYY-mm-dd', $date);
        return $date->format('d-m-Y');
    }
    public static function createDateEn(){
        $date = new \DateTime();
        return $date->format('Y-m-d');
    }
}