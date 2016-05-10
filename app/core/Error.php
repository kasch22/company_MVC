<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 13/02/16
 * Time: 19:42
 */
class Error
{

    public static function errorCall()
    {

        header('location: '. HOME_URL .'error404.php');
    }


    public static function errorSession()
    {

        header('location: '. HOME_URL.'error404/sessionfailed');
    }


    public static function logInFailed()
    {
        header('location: '. HOME_URL.'error404/loginfailed');
    }

} // End of Class