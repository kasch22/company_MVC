<?php


class AdminApplicationsModel extends DB
{


    public $_applications;


    public function __construct()
    {
        $this->_DB = $this->getInstance();
        $this->setApplications();
    }


    public function setApplications()
    {
        $this->_applications = Array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM applications
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->_applications = $query;

    }


    public function getApplications()
    {
        return $this->_applications;
    }
    
}