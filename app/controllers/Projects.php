<?php


class Projects extends Controller
{


    // Do this next
    // Update Projects table in DB


    public function index()
    {


        $view = 'projects';

        // Model Code

        if($this->model('ProjectsModel')){

            $this->model('ProjectsModel');

            $model = new ProjectsModel();

            $products = $model->getProjects();



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


    public function project($project)
    {
        $view = 'project';

        // Model Code

        if($this->model('ProjectModel'))
        {

            $this->model('ProjectModel');


            $model = new ProjectModel($project);


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



    public function model($model)
    {

        //This method takes in a model name, uses it to require the file and return it
        $model_check = require_once(M_ROOT . $model . '.php');

        if($model_check)
        {
            return $model_check;
        } else {

            Error::errorCall();
        }

    }

} // End of Class