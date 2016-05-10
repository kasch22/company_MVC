<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 12/03/16
 * Time: 11:08
 */
class AdminApplications extends Controller
{

    public function index()
    {
        session_start();

        if (isset($_SESSION['username']))
        {

        $view = 'adminapplications';

        if ($this->model('AdminApplicationsModel')) {

            $this->model('AdminApplicationsModel');

            $model = new AdminApplicationsModel();


            // View Code

            if ($this->view($view)) {

                require_once V_ROOT . $view . '.php';
            } else {
                Error::errorCall();
            }
        }
        } else
            {
                Error::errorSession();
            }// end of session if/else
    }// end Index()


    public function editApplication($application)
    {

        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'editapplication';

            if($this->model('EditApplicationModel')){

                $this->model('EditApplicationModel');

                $model = new EditApplicationModel($application);


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


    }// end editApplication()

    public function updateApplication($application)
    {
        $updater = new Updater();


        $applicationName = $updater->getGetArray()['application_name'];
        $applicationDescription = $updater->getGetArray()['application_description'];
        $applicationImageIds = array();
        array_push($applicationImageIds,
            $updater->getGetArray()['image_1_id'],
            $updater->getGetArray()['image_2_id'],
            $updater->getGetArray()['image_3_id'],
            $updater->getGetArray()['image_4_id']
            );
        

        $updater->updateApplication($application, $applicationName, $applicationDescription, $applicationImageIds);

            
        Location::redirect(HOME_URL."adminapplications/");

    }


    public function deleteApplication($application)
    {
        // Load delete class
        // Connect to DB


        $deleter = new Deleter();


        // get application id

        $getsql = "SELECT id FROM applications WHERE application_name='{$application}'";
        $query = $deleter->_DB->_pdo->query($getsql)->fetchAll(PDO::FETCH_ASSOC);
        $appid = $query[0]['id'];


        $sql = "DELETE FROM applications WHERE application_name='{$application}'";

        try{
            $deleter->_DB->_pdo->exec($sql);

        }
        catch(PDOException $e){
            Echo "Delete Failed";
        }

        $sql = "DELETE FROM application_images WHERE application_id='{$appid}'";

        try{
            $deleter->_DB->_pdo->exec($sql);
        }
        catch(PDOException $e){
            Echo "Delete Failed";
        }


        Location::redirect(HOME_URL."adminapplications/");

    }


    public function addApplication()
    {

        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'addapplication';

            if($this->model('AddApplicationModel')){

                $this->model('AddApplicationModel');

                $model = new AddApplicationModel();


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


    } //end addApplication()


    public function insertApplication()
    {

        $inserter = new Inserter();

        $inserter->setApplicationImages($inserter->getGetArray());
        $images = $inserter->getApplicationImages();


        $name = $inserter->getGetArray()['application_name'];
        $description = $inserter->getGetArray()['application_description'];
        $image = $images[0]; //for thumbnail


        $inserter->insertApplication($name, $description, $image);
        $inserter->insertApplicationImages($inserter->getLastApplicationEntered(),$images);

        // View Code

        

        Location::redirect(HOME_URL."adminapplications/");
    }// end insertApplication();


}// End Class