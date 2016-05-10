<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 16/03/16
 * Time: 17:13
 */
class AdminImages extends Controller
{

    public $errorMessage = "";


    public function index()
    {

        session_start();

        if (isset($_SESSION['username']))
        {

            $view = 'adminimages';

            if($this->model('AdminImagesModel')){

                $this->model('AdminImagesModel');

                $model = new AdminImagesModel();


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
    }// end index


    public function uploadImage()
    {
        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'addimage';

            if($this->model('AddImageModel')){

                $this->model('AddImageModel');

                $model = new AddImageModel();


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

    }


    public function insertImage()
    {

        $ImageUploader = new ImageUploader();

        if($ImageUploader->uploadImage())
        {
            Location::redirect(HOME_URL."adminImages");
        }else
        {


                $this->errorMessage = $ImageUploader->getErrorMessage();

            Location::redirect(HOME_URL."adminImages/uploadFailed/".$ImageUploader->getErrorMessage());
        }


        // View Code Testing Code

    }

    public function uploadFailed($errorMessage)
    {

        session_start();

        if (isset($_SESSION['username']))
        {
            $errorMessage = $errorMessage;

            $view = 'addimage';

            if($this->model('AddImageModel')){

                $this->model('AddImageModel');

                $model = new AddImageModel();


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
    }


    public function deleteImage($id)
    {

        // Load delete class

        // Connect to DB

        $deleter = new Deleter();

        //Get Image FileName

        $sqlfilename = "SELECT * FROM images WHERE id={$id}";

        try{

          $imageData =  $deleter->_DB->_pdo->query($sqlfilename)->fetchAll(PDO::FETCH_ASSOC);

          $imageFileName = $imageData[0]['image_title'];

          if($imageFileName)
          {
            unlink(IMG_LOCAL.$imageFileName);

            echo"image deleted";
          }

        }catch(PDOException $e){
            echo "Delete Failed";
        }



        $sql = "DELETE FROM images WHERE id='{$id}'";

        try{
            $deleter->_DB->_pdo->exec($sql);

            //Need to remove File from file location on server
        }
        catch(PDOException $e){
            Echo "Delete Failed";
        }


        // View Code Testing Code

        Location::redirect(HOME_URL."adminimages/");
    }



} //End of Class