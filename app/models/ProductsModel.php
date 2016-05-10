<?php


class ProductsModel extends DB
{

    public $_products;
    public $pageSlug ='products';
    public $pageID;
    public $pageBlocks;


    public function __construct()
    {
        // Connection to DB
            $this->_DB = $this->getInstance();

        // Get page ID based on Slug
            $this->pageID = $this->setPageID($this->pageSlug);

        // Select Blocks for the page
            $this->_results = $this->_DB->_pdo->query(
                " SELECT block_value FROM blocks where page_id = {$this->pageID}"
            )->fetchAll(PDO::FETCH_ASSOC);

            $this->pageBlocks = $this->_results;
    }


    public function getProducts()
    {
        //Initailise Products

        $this->_products = array();

        // SQL to get list of Products in 'Products' Table

        $queryResults = $this->_DB->_pdo->query(
            "SELECT * FROM products"
        )->fetchAll(PDO::FETCH_ASSOC);

        // Push products to $products

        $this->_products = array_merge($this->_products, $queryResults);

        return $this->_products;
    }

}