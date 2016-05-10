<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 29/03/16
 * Time: 12:03
 */
class EditProjectModel extends DB
{

    public $projectName;
    public $projectInfo;
    public $projectDescription;
    public $projectId;
    public $projectImagesIds;
    public $projectImageData;
    public $projectImageRef;


    public function __construct($project)
    {
        $this->_DB = $this->getInstance();

        $this->setProjectName($project);

        $this->setProjectInfo($this->getProjectName());

        $this->setProjectDescription();

        $this->setProjectId();

        $this->setProjectImagesIds($this->getProjectId());

        $this->setProjectImageRef($this->getProjectId());

        $this->setProjectImageData();
    }


    //setters

    public function setProjectName($project)
    {
        $this->projectName = $project;
    }


    public function setProjectInfo($projectName)
    {
        $this->projectInfo = array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM projects WHERE project_name = '{$projectName}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->projectInfo = $query;
    }


    public function setProjectDescription()
    {
        $this->projectDescription = $this->getProjectInfo()[0]['project_description'];
    }


    public function setProjectId()
    {
        $this->projectId = $this->getProjectInfo()[0]['id'];
    }


    public function setProjectImagesIds($projectId)
    {
        $this->projectImagesIds = array();

        $query = $this->_DB->_pdo->query("
        SELECT image_id FROM project_images where project_id = '{$projectId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->projectImagesIds = $query;
    }


    public function setProjectImageRef($projectId)
    {
        $this->projectImageRef = array();

        $query = $this->_DB->_pdo->query("
        SELECT id FROM project_images where project_id = '{$projectId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->projectImageRef = $query;
    }


    public function setProjectImageData()
    {

        $this->projectImageData = array();
        foreach ($this->getProjectImageIds() as $imageId) {
            $query = $this->_DB->_pdo->query("
        SELECT * FROM images where id = '{$imageId['image_id']}'
        ")->fetchAll(PDO::FETCH_ASSOC);

            array_push($this->projectImageData, $query);
        }
        
    }


    // Getters

    public function getProjectName()
    {
        return $this->projectName;
    }


    public function getProjectInfo()
    {
        return $this->projectInfo;
    }


    public function getProjectDescription()
    {
        return $this->projectDescription;
    }


    public function getProjectId()
    {
        return $this->projectId;
    }


    public function getProjectImageIds()
    {
        return $this->projectImagesIds;
    }


    public function getProjectImageRef()
    {
        return $this->projectImageRef;
    }
    

    public function getProjectImageData()
    {
        return $this->projectImageData;
    }


}