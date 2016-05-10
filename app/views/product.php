<?php

include V_ROOT . 'includes/header.php';
include V_ROOT . 'includes/navbar.php';

?>

    <div class="row">
        <H2><?php echo $model->getName();?></H2>
    </div>

    <div class="row">
        <p><?php echo $model->getDescription(); ?> </p>
    </div>

    <div class="row">
        <img class="img-responsive" src="<?php echo $model->getImageSrc()?>" alt="">
    </div>


<?php include V_ROOT . 'includes/footer.php'; ?>