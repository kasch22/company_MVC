<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 16/02/16
 * Time: 18:45
 */
class DB
{
    private static $_instance = null;
    public $_pdo = null;
    public $_results;
    public $_error;
    public $_db;



    public function __construct()
    {
        try
        {
            $this->_pdo = new PDO('mysql:host='.DB_HOST. '; dbname='.DB_DB, DB_USER, DB_PW);
            echo 'DB Connection Succesful <br>';// Delete this later
        }catch(PDOException $e)
        {
            die($e->getMessage());
        }// end catch

    }


    public function getInstance()
    {

        if(!isset(self::$_instance))
        {
            self::$_instance = new DB();
            echo 'instance set <br>';
        }
        echo'instance returned';
        echo '<hr>';
        return self::$_instance;

    }


    public function testFunction()
    {
        echo 'Test Function 2';
    }


    public function getPageTitle()
    {
        return $this->pageTitle;
    }


    public function getBlock($index)
    {
        //$block = implode(" ", $this->pageBlocks[$index]);

        if(!empty($this->pageBlocks[$index]["block_value"]))
        {
            $block = $this->pageBlocks[$index]["block_value"];
        } else {
            $block = "-- No text block assocatied with this page";
        }



        return $block;
    }


    public function getBlockId($index)
    {
        return $this->pageBlocks[$index]['id'];
    }


    public function getImage($id)
    {
        $imagesrc = $this->_DB->_pdo->query(
            " SELECT image_src FROM images where id = {$id}"
        )->fetchAll(PDO::FETCH_ASSOC);

        return $imagesrc[0]["image_src"];
    }


    public function setPageID($pageSlug)
    {
        $pageSlug = $pageSlug;

        $queryResults =  $this->_results = $this->_DB->_pdo->query(
            "SELECT id FROM pages WHERE page_slug = '{$pageSlug}'"
        )->fetchAll(PDO::FETCH_ASSOC);

        return $queryResults[0]["id"];

    }


    public function setPageBlocks($pageID)
    {
        $query = $this->_DB->_pdo->query(
            " SELECT * FROM blocks where page_id = {$pageID}"
        )->fetchAll(PDO::FETCH_ASSOC);

        echo "<br> Block info";

        echo "<br>";
        return $query;

    }


    public function getNav()
    {
        $navBar = $this->_DB->_pdo->query(
            " SELECT * FROM pages "
        )->fetchAll(PDO::FETCH_ASSOC);

        return $navBar;
    }


    static public function getNavbar()
    {
        $DB = new DB();

        $DBConnect = $DB->getInstance();

        $navBar = $DBConnect->_pdo->query(
            " SELECT * FROM pages "
        )->fetchAll(PDO::FETCH_ASSOC);

        return $navBar;

    }


    public function getImageInfo()
    {

        $imageInfo = $this->_DB->_pdo->query(
            " SELECT * FROM images"
        )->fetchAll(PDO::FETCH_ASSOC);

        return $imageInfo;
    }

} // End of Class