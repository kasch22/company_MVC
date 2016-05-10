<?php
// Change all $model to getters and setters
include V_ROOT . 'includes/header.php';
include V_ROOT . 'includes/navbar.php';

?>

    <div class="row">
        <h1>Products</h1>
    </div> <!-- End row -->


    <div>
        <p><?php echo $model->getBlock(0)?></p>
    </div>


    <div class="row">
        <?php if(empty($model->getProducts())):?>
            <p>No products</p>
        <?php else: ;?>

            <?php foreach($model->getProducts() as $product): ?>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="<?= HOME_URL.'products/product/'.$product["product_name"]; ?>">
                        <img class="img-responsive" src="<?php echo $model->getImage($product["image"])?>" alt="">
                    </a>
                    <a href="<?= s(HOME_URL.'products/product/'.$product["product_name"]); ?>">
                        <?= s($product["product_name"]); ?></a>
                </div>

        <?php endforeach; ?>

        <?php endif; ?>
    </div> <!-- End row -->


<?php include V_ROOT . 'includes/footer.php'; ?>
