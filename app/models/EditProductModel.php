<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 12/03/16
 * Time: 15:40
 */
class EditProductModel extends DB
{

    public $productName;
    public $productInfo;
    public $productDescription;
    public $productId;
    public $imageId;
    public $imgTitle;
    public $imgSrc;


    public function __construct($product)
    {
        $this->_DB = $this->getInstance();

        $this->setProductName($product);

        $this->setProductInfo($this->getProductName());

        $this->setProductDescription();

        $this->setProductId();

        $this->setImageId();

        $this->setImgTitle($this->getImageId());

        $this->setImgSrc($this->getImageId());

    }


    //setters

    public function setProductName($product)
    {
        $this->productName = $product;
    }


    public function setProductInfo($productName)
    {
        $this->productInfo = array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM products where product_name = '{$productName}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->productInfo = $query;
    }


    public function setProductDescription()
    {
        $this->productDescription = $this->getProductInfo()[0]['product_description'];
    }


    public function setProductId()
    {
        $this->productId = $this->getProductInfo()[0]['id'];
    }


    public function setImageId()
    {
        $this->imageId = $this->getProductInfo()[0]['image'];
    }
    

    public function setImgSrc($imageId)
    {
        $query = $this->_DB->_pdo->query("
        SELECT * FROM images where id='{$imageId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->imgSrc = $query[0]['image_src'];
    }


    public function setImgTitle($imageId)
    {
        $query = $this->_DB->_pdo->query("
        SELECT * FROM images where id='{$imageId}'
        ")->fetchAll(PDO::FETCH_ASSOC);

        $this->imgTitle = $query[0]['image_title'];
    }


    // Getters

    public function getProductName()
    {
        return $this->productName;
    }


    public function getProductInfo()
    {
        return $this->productInfo;
    }


    public function getProductDescription()
    {
        return $this->productDescription;
    }


    public function getProductId()
    {
        return $this->productId;
    }


    public function getImageId()
    {
        return $this->imageId;
    }


    public function getImgSrc()
    {
        return $this->imgSrc;
    }
    

    public function getImgTitle()
    {
        return $this->imgTitle;
    }
}