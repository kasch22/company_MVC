<?php


class AdminHomeModel extends DB
{

    public $sitePages;


    public function __construct()
    {
        // Get connection
        $this->_DB = $this->getInstance();

        $this->setSitePages();
    }


    public function setSitePages()
    {
        $query = $this->_DB->_pdo->query(
            "SELECT *  FROM pages"
        )->fetchAll(PDO::FETCH_ASSOC);


        $this->sitePages = $query;
    }


    public function getSitePages()
    {
        return $this->sitePages;
    }

}