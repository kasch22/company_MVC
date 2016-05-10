<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 07/03/16
 * Time: 18:18
 */
class AdminHome extends controller
{


    public function index()
    {
        session_start();

        if(isset($_SESSION['username']))
        {
            $view = 'adminhome';

            if($this->model('AdminHomeModel')){

                $this->model('AdminHomeModel');

                $model = new AdminHomeModel();

                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    Error::errorCall();
                }
            }


        }else
        {
            Error::errorSession();
        }//End session if/else



    }


    public function editPages($pageSlug)
    {

        session_start();


        if (isset($_SESSION['username']))
        {
            $view = 'editpages';


            if($this->model('EditPageModel')) {

                //require in EditPageModel class based on slug

                $this->model('EditPageModel');

                //  set $model = new EditPageModel($pageSlug)

                $model = new EditPageModel($pageSlug);





                // Require admineditpage
                //populate input fields with get functions
                //have submisson
                // have admin image functionality

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




    }// End Editpages

    public function updatePage($pageId)
    {
        $updater = new Updater();




        $pageId = $updater->getGetArray()['page-id'];
        $pageTitle = $updater->getGetArray()['page-title'];
        $pageSlug = $updater->getGetArray()['page-slug'];
        $pageBlock = $updater->getGetArray()['page-block'];
        $blockId = $updater->getGetArray()['block-id'];


        $updater->updatePage($pageId, $pageTitle, $pageSlug, $pageBlock, $blockId);


        Location::redirect(HOME_URL."adminHome/");
    } //end Update Page


}