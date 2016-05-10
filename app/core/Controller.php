<?php

Class Controller
{

    public function model($model)
    {
        $checker = new Check();

        if($checker->checkModel($model))
        {
            return require_once(M_ROOT . $model . '.php');
        } else
            {
             return 'model does not exist';
            }
    }


    public function view($view, $data = [])
    {
        $checker = new Check();

        if($checker->checkView($view)){
            return true;
        }else
        {
            return false;
        }
    }


    public static function req($controller)
    {
        require_once C_ROOT . $controller .'.php';
    }


    public static function call($controller, $method, $params)
    {
        call_user_func_array([$controller, $method], $params);
    }







}