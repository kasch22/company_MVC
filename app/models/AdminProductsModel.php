<?php


class AdminProductsModel extends DB
{

    public $_products;


    public function __construct()
    {
        $this->_DB = $this->getInstance();
        $this->_products = $this->setProducts();
    }


    public function setProducts()
    {
        $this->_products = Array();

        $query = $this->_DB->_pdo->query("
        SELECT * FROM products
        ")->fetchAll(PDO::FETCH_ASSOC);

        return $query;
    }


    public function getProducts()
    {
        return $this->_products;
    }
    
} // End Class