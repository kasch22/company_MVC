<?php


class ProjectsModel extends DB
{


    public $_projects;
    public $pageSlug ='projects';
    public $pageID;
    public $pageBlocks;


    public function __construct()
    {

        // Connection to DB
        $this->_DB = $this->getInstance();

        // Get page ID based on Slug
        $this->pageID = $this->setPageId($this->pageSlug);

        // Select Blocks for the page
        $this->_results = $this->_DB->_pdo->query(
            " SELECT block_value FROM blocks where page_id = {$this->pageID}"
        )->fetchAll(PDO::FETCH_ASSOC);

        $this->pageBlocks = $this->_results;
    }


    public function getProjects()
    {
        //Initailise Products

        $this->_projects = array();

        $queryResults = $this->_DB->_pdo->query(
            "SELECT * FROM projects"
        )->fetchAll(PDO::FETCH_ASSOC);


        $this->_projects = array_merge($this->_projects, $queryResults);

        return $this->_projects;
    }

} // End Class