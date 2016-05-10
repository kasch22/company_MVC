<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 13/02/16
 * Time: 13:10
 */
class HomeModel extends DB
{

    public $pageTitle;
    public $pageBody;
    public $pageSlug;
    public $pageID;
    public $pageBlocks;


    public function __construct()
    {

        $this->_DB = $this->getInstance();

        $this->pageSlug = 'Home';

        $this->pageID = $this->setPageID($this->getPageSlug());

        $this->setPageTitle($this->getPageID());

        //Get all Blocks based on page id

        $this->setPageBlocks($this->getPageID());   
    }


    //Setters

    public function setPageTitle($pageID)
    {
        $query = $this->_DB->_pdo->query(
            "SELECT page_title FROM pages WHERE id={$pageID}"
        )->fetchAll(PDO::FETCH_ASSOC);

        $this->pageTitle = $query[0]['page_title'];
    }


    public function setPageBlocks($pageID)
    {
        $query = $this->_DB->_pdo->query(
            " SELECT block_value FROM blocks where page_id = {$pageID}"
        )->fetchAll(PDO::FETCH_ASSOC);

        $this->pageBlocks = $query;

    }


    //Getters


    public function getPageTitle()
    {
        return $this->pageTitle;
    }


    public function getPageID()
    {
        return $this->pageID;
    }


    public function getPageSlug()
    {
        return $this->pageSlug;
    }






}