<?php

class Home extends Controller
{


    public function index()
    {

        $view = 'home';

        // Model Code

        // Use products conrtoler for help
        // Work Data such as Page name etc required for Home page

        if($this->model('HomeModel')){

            $this->model('HomeModel');

            $model = new HomeModel();


            // View Code

            if($this->view($view))
            {

                require_once V_ROOT . $view . '.php';
            } else
            {
                Error::errorCall();
            }

        }
    }
}// End of Class