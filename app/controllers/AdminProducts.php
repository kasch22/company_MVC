<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 12/03/16
 * Time: 11:08
 */
class AdminProducts extends Controller
{


    public function index()
    {
        session_start();

        if (isset($_SESSION['username']))
        {

            $view = 'adminproducts';

            if($this->model('AdminProductsModel')){

                $this->model('AdminHomeModel');

                $model = new AdminProductsModel();


                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    Error::errorCall();
                }
            }

        } else
        {
            Error::errorSession();
        }
    }// end of index


    public function deleteProduct($product)
    {
        // Load delete class

        // Connect to DB

        $deleter = new Deleter();

        $sql = "DELETE FROM products WHERE product_name='{$product}'";

        try{
            $deleter->_DB->_pdo->exec($sql);
        }
        catch(PDOException $e){
            Echo "Delete Failed";
        }

        Location::redirect(HOME_URL."adminproducts/");
    }


    public function editProduct($product)
    {

        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'editproduct';



            if($this->model('EditProductModel')){

                $this->model('EditProductModel');

                $model = new EditProductModel($product);


                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    Error::errorCall();
                }
            }
        } else
        {
            Error::errorSession();
        }
    }


    public function updateProduct($product)
    {

        $updater = new Updater();

        $name = $updater->getGetArray()['product_name'];
        $description = $updater->getGetArray()['product_description'];
        $imageId = $updater->getGetArray()['image_id'];

        $updater->updateProduct($product,$name, $description, $imageId);

        // View Code

        Location::redirect(HOME_URL."adminproducts/");
    }


    public function addProduct()
    {

        session_start();

        if (isset($_SESSION['username']))
        {
            $view = 'addproduct';


            if($this->model('AddProductModel')){

                $this->model('AddProductModel');

                $model = new AddProductModel();


                // View Code

                if($this->view($view))
                {

                    require_once V_ROOT . $view . '.php';
                } else
                {
                    Error::errorCall();
                }
            }
        }
        else
        {
            Error::errorSession();
        }
    }
    

    public function insertProduct()
    {

        $inserter = new Inserter();


        $name = $inserter->getGetArray()['product_name'];
        $description = $inserter->getGetArray()['product_description'];
        $image =$inserter->getGetArray()['image_id'];


        $inserter->insertProduct($name, $description, $image);

            // View Code
           
        Location::redirect(HOME_URL."adminproducts/");
    }

} // End class