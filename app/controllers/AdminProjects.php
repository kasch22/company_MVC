<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 12/03/16
 * Time: 11:08
 */
class AdminProjects extends Controller
{

    public function index()
    {

        session_start();

         if (isset($_SESSION['username']))
         {


             $view = 'adminprojects';

             if($this->model('AdminProjectsModel')){

                 $this->model('AdminProjectsModel');

                 $model = new AdminProjectsModel();


                 // View Code

                 if($this->view($view))
                 {

                     require_once V_ROOT . $view . '.php';
                 } else
                 {
                     Error::errorCall();
                 }
             }
         } else{Error::errorSession();}
    }// end Index()


    public function editProject($project)
    {

        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'editproject';

            if($this->model('EditProjectModel')){

                $this->model('EditProjectModel');

                $model = new EditProjectModel($project);


                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    Error::errorCall();
                }
            }
        } else
        {
            Error::errorSession();
        }

    }// end editProject()


    public function updateProject($project)
    {
        $updater = new Updater();


        $projectName = $updater->getGetArray()['project_name'];
        $projectDescription = $updater->getGetArray()['project_description'];
        $projectImageIds = array();
        array_push($projectImageIds,
            $updater->getGetArray()['image_1_id'],
            $updater->getGetArray()['image_2_id'],
            $updater->getGetArray()['image_3_id'],
            $updater->getGetArray()['image_4_id']
        );
        

        $updater->updateProject($project, $projectName, $projectDescription, $projectImageIds);

      
        Location::redirect(HOME_URL."adminprojects/");

    }


    public function deleteProject($project)
    {
        // Load delete class
        // Connect to DB


        $deleter = new Deleter();


        // get project id

        $getsql = "SELECT id FROM projects WHERE project_name='{$project}'";
        $query = $deleter->_DB->_pdo->query($getsql)->fetchAll(PDO::FETCH_ASSOC);
        $projectid = $query[0]['id'];


        $sql = "DELETE FROM projects WHERE project_name='{$project}'";

        try{
            $deleter->_DB->_pdo->exec($sql);

        }
        catch(PDOException $e){
            Echo "Delete Failed";
        }

        $sql = "DELETE FROM project_images WHERE project_id='{$projectid}'";

        try{
            $deleter->_DB->_pdo->exec($sql);
        }
        catch(PDOException $e){
            Echo "Delete Failed";
        }
      
        Location::redirect(HOME_URL."adminprojects/");

    }


    public function addProject()
    {
        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'addproject';


            if($this->model('AddProjectModel')){

                $this->model('AddProjectModel');

                $model = new AddProjectModel();


                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    //Error::errorCall();
                }
            }
        } else
        {
            Error::errorSession();
        }
    } //end addProject()


    public function insertProject()
    {

        $inserter = new Inserter();

        $inserter->setProjectImages($inserter->getGetArray());
        $images = $inserter->getProjectImages();


        $name = $inserter->getGetArray()['project_name'];
        $description = $inserter->getGetArray()['project_description'];
        $image = $images[0]; //for thumbnail


        $inserter->insertProject($name, $description, $image);
        $inserter->insertProjectImages($inserter->getLastProjectEntered(),$images);

        // View Code

   

        Location::redirect(HOME_URL."adminprojects/");
    }// end insertProject();

}