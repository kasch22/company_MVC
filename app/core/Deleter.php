<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 12/03/16
 * Time: 13:17
 */
class Deleter extends DB
{

    public $_DB;

    public function __construct()
    {
        $this->_DB = $this->getInstance();
    }

}