<?php


class Error404 extends Controller
{
    public function index()
    {
        //echo 'ERROR 404, Page does not exist please return <a href="' . HOME_URL . '" > Home</a>';


        $view = 'error404';

        if ($this->view($view)) {
            require_once V_ROOT . $view . '.php';
        } else {

            Error::errorCall();
        }

    }// end of index


    public function logInFailed()
    {


        $view = 'loginfailed';

        if ($this->view($view)) {
            require_once V_ROOT . $view . '.php';
        } else {

            Error::errorCall();
        }
    }// end loginfailed


    public function sessionFailed()
    {
        echo "failed";

        $view = 'sessionfailed';

        if ($this->view($view)) {
            require_once V_ROOT . $view . '.php';
        } else {

            Error::errorCall();
        }

    } //end sessionfail

}// end class