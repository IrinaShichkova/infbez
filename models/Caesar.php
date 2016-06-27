<?php

namespace app\models;

use yii\base\Model;

class Caesar extends Model
{

    public static $strRu = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
    public static $strEn = 'abcdefghijklmnopqrstuvwxyz';


    public static function code($data, $key = 3)
    {

        $output = '';
        for ($i = 0; $i < mb_strlen($data); $i++)
        {
            $char = mb_substr ($data , $i, 1 );

            if (false !== ($n = mb_stripos(self::$strRu, $char))) {
                $k = $n+$key;
                if ($k > mb_strlen(self::$strRu)){
                    $k = $k - mb_strlen(self::$strRu);
                }
                $out = mb_substr(self::$strRu, $k, 1);
            } elseif (false !== ($n = mb_stripos(self::$strEn, $char))) {
                $k = $n+$key;
                if ($k > mb_strlen(self::$strEn)){
                    $k = $k - mb_strlen(self::$strEn);
                }
                $out = mb_substr(self::$strEn, $k, 1);
            } else {
                $out = $char;
            }

            if ($char == mb_strtoupper($char)){
                $out = mb_strtoupper($out);
            }

            $output .= $out;
        }
        
        return $output;
    }

    public static function decode($data, $key = 3)
    {

        $output = '';
        for ($i = 0; $i < mb_strlen($data); $i++)
        {
            $char = mb_substr ($data , $i, 1 );

            if (false !== ($n = mb_stripos(self::$strRu, $char))) {
                $k = $n-$key;
                if ($k < 0){
                    $k = $k + mb_strlen(self::$strRu);
                }
                $out = mb_substr(self::$strRu, $k, 1);
            } elseif (false !== ($n = mb_stripos(self::$strEn, $char))) {
                $k = $n-$key;
                if ($k < 0){
                    $k = $k + mb_strlen(self::$strEn);
                }
                $out = mb_substr(self::$strEn, $k, 1);
            } else {
                $out = $char;
            }

            if ($char == mb_strtoupper($char)){
                $out = mb_strtoupper($out);
            }

            $output .= $out;
        }

        return $output;
    }



}