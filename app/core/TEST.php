<?php


class TEST
{

    public static function callTest(){
        echo 'Auto load Success';
    }


    public static function varDump($e){

        $break = "<br>";
        $var = var_dump($e);

        return $break . $var;
    }



}