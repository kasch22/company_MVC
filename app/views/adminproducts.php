<?php

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>


    <div class="row">

        <h1>Edit Products</h1>

    </div>



    <div class="row">
        <? if(empty($model->getProducts())):?>
            <p>No products</p>
            <?else: ?>
                <? foreach($model->getProducts() as $product):?>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="<?= HOME_URL.'adminproducts/editproduct/'.$product["product_name"]; ?>">
                        <img class="img-responsive" src="<?= $model->getImage($product["image"])?>" alt="">
                    </a>
                    <div class="link-left">
                        <a href="<?= HOME_URL.'adminproducts/editproduct/'.$product["product_name"]; ?>">
                            Edit <?= $product["product_name"] ;?>
                        </a>
                    </div>
                    <div class="link-right">
                        <a href="<?= HOME_URL.'adminproducts/deleteproduct/'.$product["product_name"]; ?>">
                            Delete <?= $product["product_name"] ;?>
                        </a>
                    </div>
                </div>
                <? endforeach; ?>
        <? endif;?>
    </div>


    <div class="row">

        <a href="<?=HOME_URL.'adminproducts/addProduct/';?>">Add New Product</a>

    </div>




<?php include V_ROOT . 'includes/adminfooter.php'; ?>