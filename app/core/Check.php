<?php


class Check
{
    private $_controllerExists = false;
    private $_methodExists = false;
    private $_modelExists = false;
    private $_viewExists = false;


    public function checkController($controller = '')
    {
        if (file_exists(C_ROOT . $controller . '.php'))
        {
            $this->_controllerExists = true;
        }

        return $this->_controllerExists;

    }

    public function checkMethod($controller, $method)
    {
        if(method_exists($controller, $method))
        {
            $this->_methodExists = true;
        }

        return $this->_methodExists;
    }

    Public function checkModel($model)
    {
        if (file_exists(M_ROOT . $model . '.php'))
        {
            $this->_modelExists = true;
        }

        return $this->_modelExists;

    }

    Public function checkView($view)
    {
        if (file_exists(V_ROOT . $view . '.php'))
        {
            $this->_viewExists = true;
        }

        return $this->_viewExists;

    }

}