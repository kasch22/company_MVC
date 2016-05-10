<?php


class ApplicationsModel extends DB
{


    public $_applications;
    public $pageSlug ='applications';
    public $pageID;
    public $pageBlocks;



    public function __construct(){


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


    public function getApplications()
    {
        //Initailise Products

        $this->_applications = array();

        // SQL to get list of Products in 'applications' Table

        $queryResults = $this->_DB->_pdo->query(
            "SELECT * FROM applications"
        )->fetchAll(PDO::FETCH_ASSOC);

        // Push applications to $_applications

        $this->_applications = array_merge($this->_applications, $queryResults);

        return $this->_applications;
    }


}