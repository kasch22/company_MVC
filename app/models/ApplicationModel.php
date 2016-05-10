<?php


class ApplicationModel extends DB
{


    public $_applicationName;
    public $_applicationInfo;
    public $_applicationDescription;
    public $_applicationId;
    public $_applicationImages;



    public function __construct($application){

        //connect to db

        $this->_DB = $this->getInstance();

        // Set application name

        $this->setApplicationName($application);

        // set priduct Info to array

        $this->setApplicationInfo();

        // get application id from db based on name

        $this->setApplicationID();

        //get application Desctription

        $this->setApplicationDescription();

        //Get application images

        $this->setApplicationImages();
    }



    public function setApplicationName($application)
    {
        $this->_applicationName = $application;
    }


    public function setApplicationInfo()
    {
        $this->_applicationInfo = $query = $this->_DB->_pdo->query(
            " SELECT * FROM applications where application_name = '{$this->_applicationName}'"
        )->fetchAll(PDO::FETCH_ASSOC);
    }


    public function setApplicationID()
    {
        $this->_applicationId = $this->_applicationInfo[0]['id'];
    }


    public function setApplicationDescription()
    {
        $this->_applicationDescription = $this->_applicationInfo[0]['application_description'];
    }


    public function setImgSrc()
    {
        $imgSrc = $this->getImage($this->_applicationInfo[0]['image']);

        $this->_imgSrc = $imgSrc;
    }


    public function setApplicationImages()
    {
        $this->_applicationImages = array();
        $imagesIDs = array();
        $imagesQuery = $query = $this->_DB->_pdo->query(
            " SELECT * FROM application_images where application_id = '{$this->getApplicationID()}'"
        )->fetchAll(PDO::FETCH_ASSOC);



        foreach($imagesQuery as $image)
        {
            $imageId = $image['image_id'];
            array_push($imagesIDs, $imageId);
        }


        foreach($imagesIDs as $imageID)
        {
            $i = 0;
            $imagesrc = $query = $this->_DB->_pdo->query(
                " SELECT image_src FROM images where id = '{$imageID}'"
            )->fetchAll(PDO::FETCH_ASSOC);

            array_push($this->_applicationImages, $imagesrc[$i]['image_src']);
            $i ++;
        }
    }


    public function getName()
    {
        return $this->_applicationName;
    }


    public function getDescription()
    {
        return $this->_applicationDescription;
    }


    public function getApplicationID()
    {
        return $this->_applicationId;
    }

    public function getApplicationImages()
    {
        return $this->_applicationImages;
    }



}