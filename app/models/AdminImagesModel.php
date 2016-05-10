<?php


class AdminImagesModel extends DB
{

    public $_images;


    public function __construct()
    {
        $this->_DB = $this->getInstance();
        $this->_images = $this->setImages();
    }


    public function setImages()
    {
        $this->_products = Array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM images
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $query;

    }

    public function getImages()
    {
        return $this->_images;
    }






}