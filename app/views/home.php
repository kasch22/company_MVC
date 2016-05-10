<?php
// Insert Model objects varibles, $model is defined in the Controller
    include V_ROOT . 'includes/header.php';
    include V_ROOT . 'includes/navbar.php';

?>

         <div class="row">

             <div class="jumbotron">
                <h1><?php echo $model->getPageTitle(); ?></h1>
             </div>

         </div>

        <div class="row">
            <div class="col-sm-12">
                <p><?php echo $model->getBlock(0); ?> </p>
            </div>

        </div>


<?php include V_ROOT . 'includes/footer.php'; ?>