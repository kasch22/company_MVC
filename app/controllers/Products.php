<?php


class Products extends Controller
{


    public function index()
    {
        $view = 'products';

        // Model Code

        if($this->model('ProductsModel')){

            $this->model('ProductsModel');

            $model = new ProductsModel();

            $products = $model->getProducts();


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


    public function product($product)
    {
        $view = 'product';

        // Model Code

        if($this->model('ProductModel'))
        {

            $this->model('ProductModel');



            $model = new ProductModel($product);

       //change these to getters and setters

        $pName        = $model->_productName;
        $pDescription = $model->_productDescription;


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


    public function model($model)
    {

        //This method takes in a model name, uses it to require the file and return it
        $model_check = require_once(M_ROOT . $model . '.php');

        if($model_check)
        {
            return $model_check;
        } else {

            Error::errorCall();
        }
    }
    
} // End of Class