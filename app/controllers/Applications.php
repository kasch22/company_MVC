<?php


class Applications extends Controller
{


    public function index()
    {
        $view = 'applications';

        // Model Code

        if($this->model('ApplicationsModel')){

            $this->model('ApplicationsModel');

            $model = new ApplicationsModel(); // $model is accessed in the views


            // View Code

            if($this->view($view))
            {
                require_once V_ROOT . $view . '.php';
            } else
            {
                echo "Error: View doesn't exist";
            }
        }
    }


    public function application($application)
    {
        $view = 'application';

        // Model Code

        if($this->model('ApplicationModel'))
        {

            $this->model('ApplicationModel');

            $model = new ApplicationModel($application);

            // View Code
            if($this->view($view))
            {
                require_once V_ROOT . $view . '.php';
            } else
            {
                echo "Error: View doesn't exist";
            }
            // view should become back as require once location, inside it is returning a int,
        }
    }


    public function model($model)
    {

        //This method takes in a model name, uses it to require the file and return it
        $model_check = require_once(M_ROOT . $model . '.php');

        if($model_check)
        {
            return $model_check;
        } else {

            echo 'model does not exist';
        }

    }

} // End of Class