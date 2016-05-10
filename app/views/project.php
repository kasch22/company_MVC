<?php
// Change all $model to getters and setters

include V_ROOT . 'includes/header.php';
include V_ROOT . 'includes/navbar.php';
?>



    <div class="row">
        <H2><?php echo $model->getName();?></H2>
    </div>


    <div class="row">
        <p><?php echo $model->getDescription(); ?> </p>
    </div>


    <div class="row"><!-- SLIDER -->
        <!-- SLIDER STARTS -->
        <div class="Wallop">
            <div class="Wallop-list">

                <?php foreach($model->getProjectImages() as $image) :?>
                <div class="Wallop-item">
                    <img class="img-responsive" src="<?php echo $image ?>" alt="">
                </div>
                <?php endforeach; ?>


            </div>

            <button class="Wallop-buttonPrevious">Previous</button>
            <button class="Wallop-buttonNext">Next</button>
        
        </div>
        <!-- SLIDER ENDS -->

        <script src="<?php echo JS_ROOT . 'wallop.js'?>"></script>
        
        <script>
            // New instance of Wallop
            var slider = document.querySelector('.Wallop');
            var Wallop = new Wallop(slider);
        </script>

    </div>

<?php include V_ROOT . 'includes/footer.php'; ?>
