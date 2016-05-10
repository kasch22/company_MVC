<?php


class ProjectModel extends DB
{

// change project to application

    public $_projectName;
    public $_projectInfo;
    public $_projectDescription;
    public $_projectId;
    public $_projectImages;



    public function __construct($project){

        //connect to db
        $this->_DB = $this->getInstance();

        // Set project name
        $this->setProjectName($project);

        // set priduct Info to array
        $this->setProjectInfo();

        // get application id from db based on name
        $this->setProjectID();

        //get application Desctription
        $this->setProjectDescription();

        //Get application images
        $this->setProjectImages();

    }



    public function setProjectName($project)
    {
        $this->_projectName = $project;
    }


    public function setProjectInfo()
    {
        $this->_projectInfo = $query = $this->_DB->_pdo->query(
            " SELECT * FROM projects where project_name = '{$this->_projectName}'"
        )->fetchAll(PDO::FETCH_ASSOC);
    }


    public function setProjectID()
    {
        $this->_projectId = $this->_projectInfo[0]['id'];
    }


    public function setProjectDescription()
    {
        $this->_projectDescription = $this->_projectInfo[0]['project_description'];
    }


    public function setProjectImages()
    {
        $this->_projectImages = array();
        $imagesIDs = array();
        $imagesQuery = $query = $this->_DB->_pdo->query(
            " SELECT * FROM project_images where project_id = '{$this->getProjectID()}'"
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

          array_push($this->_projectImages, $imagesrc[$i]['image_src']);
            $i ++;
        }

    }


    public function getName()
    {
        return $this->_projectName;
    }


    public function getDescription()
    {
        return $this->_projectDescription;
    }


    public function getProjectID()
    {
        return $this->_projectId;
    }


    public function getProjectImages()
    {
        return $this->_projectImages;
    }
}