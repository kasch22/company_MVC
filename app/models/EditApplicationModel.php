<?php


class EditApplicationModel extends DB
{

    public $applicationName;
    public $applicationInfo;
    public $applicationDescription;
    public $applicationId;
    public $applicationImagesIds;
    public $applicationImageData;
    public $applicationImageRef;


    public function __construct($application)
    {
        $this->_DB = $this->getInstance();

        $this->setApplicationName($application);

        $this->setApplicationInfo($this->getApplicationName());

        $this->setApplicationDescription();

        $this->setApplicationId();

        $this->setApplicationImagesIds($this->getApplicationId());

        $this->setApplicationImageRef($this->getApplicationId());

        $this->setApplicationImageData();

    }


    //setters

    public function setApplicationName($application)
    {
        $this->applicationName = $application;
    }


    public function setApplicationInfo($applicationName)
    {
        $this->applicationInfo = array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM applications where application_name = '{$applicationName}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->applicationInfo = $query;
    }


    public function setApplicationDescription()
    {
        $this->applicationDescription = $this->getApplicationInfo()[0]['application_description'];
    }


    public function setApplicationId()
    {
        $this->applicationId = $this->getApplicationInfo()[0]['id'];
    }


    public function setApplicationImagesIds($applicationId)
    {
        $this->applicationImagesIds = array();

        $query = $this->_DB->_pdo->query("
        SELECT image_id FROM application_images where application_id = '{$applicationId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->applicationImagesIds = $query;
    }


    public function setApplicationImageRef($applicationId)
    {
        $this->applicationImageRef = array();

        $query = $this->_DB->_pdo->query("
        SELECT id FROM application_images where application_id = '{$applicationId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->applicationImageRef = $query;
    }

    public function setApplicationImageData()
    {

        $this->applicationImageData = array();
        foreach ($this->getApplicationImageIds() as $imageId) {
            $query = $this->_DB->_pdo->query("
        SELECT * FROM images where id = '{$imageId['image_id']}'
        ")->fetchAll(PDO::FETCH_ASSOC);

            array_push($this->applicationImageData, $query);
        }
    }

    // Getters

    public function getApplicationName()
    {
        return $this->applicationName;
    }


    public function getApplicationInfo()
    {
        return $this->applicationInfo;
    }


    public function getApplicationDescription()
    {
        return $this->applicationDescription;
    }


    public function getApplicationId()
    {
        return $this->applicationId;
    }


    public function getApplicationImageIds()
    {
        return $this->applicationImagesIds;
    }


    public function getApplicationImageRef()
    {
        return $this->applicationImageRef;
    }


    public function getApplicationImageData()
    {
        return $this->applicationImageData;
    }


}// End Class