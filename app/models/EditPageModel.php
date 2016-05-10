<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 11/03/16
 * Time: 22:50
 */
class EditPageModel extends DB
{

    // Setters are wrong, they should set varible not return it to be set in the contructor

    // Removed extra blocks so each page only has one block.


    public $pageID;
    public $pageSlug;
    public $pageTitle;
    public $pageBlocks;
    Public $pageImages;
    public $pageImageData;
    public $pageImageRef;




    public function __construct($pageSlug)
    {
        $this->_DB = $this->getInstance();

        $this->pageSlug = $pageSlug;

        $this->pageID = $this->setPageID($pageSlug);

        $this->pageBlocks = $this->setPageBlocks($this->getPageID());

        $this->setPageImages($this->getPageID());

        $this->setPageImageData();

        $this->setPageImageRef($this->getPageId());

        $this->pageTitle = $this->setPageTitle($this->getPageID());

    }


    // Setters

    public function setPageImages($pageID)
    {
        $this->pageImages = array();

        $query = $this->_DB->_pdo->query("
        SELECT image_id from page_images WHERE page_id={$pageID}
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->pageImages = $query;
    }


    public function setPageTitle($pageID)
    {
        $query = $this->_DB->_pdo->query("
          SELECT page_title FROM pages WHERE id='{$pageID}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $query[0]['page_title'];
        //var_dump($query);
    }


    public function setPageImageData()
    {
        $this->pageImageData = array();


        foreach ($this->getPageImages() as $imageId) {
            $query = $this->_DB->_pdo->query("
          SELECT * FROM images where id = '{$imageId['image_id']}'
        ")->fetchAll(PDO::FETCH_ASSOC);

            array_push($this->pageImageData, $query);
        }
    }


    public function setPageImageRef($pageId)
    {
        $this->pageImageRef = array();

        $query = $this->_DB->_pdo->query("
        SELECT id FROM page_images where page_id = '{$pageId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->applicationImageRef = $query;
    }


    //Getters

    public function getPageID()
    {
        return $this->pageID;
    }


    public function getPageBlocks()
    {
        return $this->pageBlocks;
    }


    public function getPageImages()
    {
        return $this->pageImages;
    }


    public function getPageSlug()
    {
        return $this->pageSlug;
    }


    public function getPageImageData()
    {
        return $this->pageImageData;
    }


    public function getPageImageRef()
    {
        return $this->pageImageRef;
    }

}