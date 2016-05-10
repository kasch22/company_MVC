<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 07/03/16
 * Time: 18:10
 */
class AdminSignIn extends Controller
{

        public function index()
        {
            $view = 'adminsignin';


            if($this->model('AdminSignInModel'))
            {
                $this->model('AdminSignInModel');

                $model = new AdminSignInModel();


                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    Error::errorCall();
                }
            }
        }// end of Index()


        public function logIn()
        {

        // instance of Validate Class

            $validater = new Validate();


        // Set POST varibles, username password

            $username = $validater->getPostArray()[0];
            $password = $validater->getPostArray()[1];


        //try log in

            if($validater->authenticate($username, $password))
            {

                session_start();

                $_SESSION['username'] = $username;
                Location::redirect(HOME_URL.'adminHome');

            } else
            {
                Error::logInFailed();
            }
        }
}