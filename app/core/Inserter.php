<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 12/03/16
 * Time: 18:04
 */
class Inserter extends DB
{
    public $_getArray;
    public $lastApplicationEntered;
    public $applictionImages;
    public $lastProjectEntered;
    public $projectImages;


    public function __construct()
    {
        // Get DB Connection
        $this->_DB = $this->getInstance();

        // grab GET global data
        $this->setGetArray();
    }


    // Setters
    public function setGetArray()
    {
        $this->_getArray = $_GET;
    }


    public function setApplicationImages($getArray)
    {
        $imageArray = array();

        array_push($imageArray,$getArray['image_1_id']);
        array_push($imageArray,$getArray['image_2_id']);
        array_push($imageArray,$getArray['image_3_id']);
        array_push($imageArray,$getArray['image_4_id']);

       $this->applictionImages = $imageArray;
    }


    public function setLastApplicationEntered($id)
    {
        $this->lastApplicationEntered = $id;
    }


    public function setProjectImages($getArray)
    {
        $imageArray = array();

        array_push($imageArray,$getArray['image_1_id']);
        array_push($imageArray,$getArray['image_2_id']);
        array_push($imageArray,$getArray['image_3_id']);
        array_push($imageArray,$getArray['image_4_id']);


        $this->projectImages = $imageArray;
    }


    public function setLastProjectEntered($id)
    {
        $this->lastProjectEntered = $id;
    }


    // Getters
    public function getGetArray()
    {
        return $this->_getArray;
    }


    public function getApplicationImages()
    {
        return $this->applictionImages;
    }


    public function getLastApplicationEntered()
    {
       return $this->lastApplicationEntered;
    }


    public function getProjectImages()
    {
        return $this->projectImages;
    }


    public function getLastProjectEntered()
    {
        return $this->lastProjectEntered;
    }

    //Insert Methods


    public function insertProduct($productName, $productDescription, $imageID)
    {
        try
        {
            $sqlQuery = "INSERT INTO products (product_name, product_description, image)
                  VALUE (:name, :description, :image)";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':description', $productDescription);
            $stmt->bindParam(':image', $imageID);

            $stmt->execute();
        }catch(PDOException $e)
        {
            echo "unsuccesfull";
            $e->getMessage();
        }
    }

    // Applications

    public function insertApplication($applicationName, $applicationDescription, $imageID)
    {
        try
        {
            $sqlQuery = "INSERT INTO applications (application_name, application_description, image)
                  VALUE (:name, :description, :image)";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->bindParam(':name', $applicationName);
            $stmt->bindParam(':description', $applicationDescription);
            $stmt->bindParam(':image', $imageID);

            $stmt->execute();
            echo "application insert success";
        }catch(PDOException $e)
        {
            $e->getMessage();
        }
        //get ID of Application just entered setLastAppEntered();

        $this->setLastApplicationEntered($this->_DB->_pdo->lastInsertId());
    }


    public function insertApplicationImages($appId, $images)
    {
        try
        {
            $sqlQuery = "INSERT INTO application_images (application_id, image_id)
                  VALUE (:appId, :image)";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);

            foreach($images as $imagesid)
            {


                $stmt->bindParam(':appId', $appId);
                $stmt->bindParam(':image', $imagesid);

                $stmt->execute();
            }
        }catch(PDOException $e)
        {
            $e->getMessage();
        }
    }


    // Projects
    public function insertProject($projectName, $projectDescription, $imageID)
    {
        try
        {
            $sqlQuery = "INSERT INTO projects (project_name, project_description, image)
                  VALUE (:name, :description, :image)";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->bindParam(':name', $projectName);
            $stmt->bindParam(':description', $projectDescription);
            $stmt->bindParam(':image', $imageID);

            $stmt->execute();
            echo "project insert success";
        }catch(PDOException $e)
        {
            $e->getMessage();
        }


        //get ID of Application just entered setLastAppEntered();

        $this->setLastProjectEntered($this->_DB->_pdo->lastInsertId());
    }


    public function insertProjectImages($projectId, $images)
    {
        try
        {
            $sqlQuery = "INSERT INTO project_images (project_id, image_id)
                  VALUE (:projectId, :image)";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);

            foreach($images as $imagesid)
            {


                $stmt->bindParam(':projectId', $projectId);
                $stmt->bindParam(':image', $imagesid);

                $stmt->execute();
            }
        }catch(PDOException $e)
        {
            $e->getMessage();
        }
    }


}