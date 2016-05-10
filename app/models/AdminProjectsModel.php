<?php


class AdminProjectsModel extends DB
{

    public $_projects;


    public function __construct()
    {
        $this->_DB = $this->getInstance();
        $this->setProjects();
    }


    public function setProjects()
    {
        $this->_projects = Array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM projects
        ")->fetchAll(PDO::FETCH_ASSOC);


        $this->_projects = $query;
    }


    public function getProjects()
    {
        return $this->_projects;
    }

}