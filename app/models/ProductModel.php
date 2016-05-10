<?php

//Model

class ProductModel extends DB
{


    public $_productName;
    public $_productInfo;
    public $_productDescription;
    public $_productId;
    public $_imgSrc;




    public function __construct($product){

        //connect to db
            $this->_DB = $this->getInstance();

        // Set product name
            $this->setProductName($product);

        // set priduct Info to array
            $this->setProductInfo();

        // get product id from db based on name
            $this->setProductID();

        //get product Desctription
            $this->setProductDescription();

        //Get product images
            $this->setImgSrc();
    }


    public function setProductName($product)
    {
        $this->_productName = $product;
    }


    public function setProductInfo()
    {
        $this->_productInfo = $query = $this->_DB->_pdo->query(
            " SELECT * FROM products where product_name = '{$this->_productName}'"
        )->fetchAll(PDO::FETCH_ASSOC);
    }


    public function setProductID()
    {
        $this->_productId = $this->_productInfo[0]['id'];
    }

    public function setProductDescription()
    {
        $this->_productDescription = $this->_productInfo[0]['product_description'];
    }

    public function setImgSrc()
    {
        $imgSrc = $this->getImage($this->_productInfo[0]['image']);

        $this->_imgSrc = $imgSrc;
    }




    public function getName()
    {
        return $this->_productName;
    }


    public function getDescription()
    {
        return $this->_productDescription;
    }


    public function getProductID()
    {
        return $this->_productId;
    }

    public function getImageSrc()
    {
        return $this->_imgSrc;
    }

}