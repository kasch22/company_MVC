<?php

include V_ROOT . 'includes/header.php';
include V_ROOT . 'includes/navbar.php';

?>




    <div class="row">
        <h1>Applications</h1>
    </div> <!-- End row -->


    <div>
        <p><?php echo $model->getBlock(0)?></p>
    </div>


    <div class="row">
        <?php if(empty($model->getApplications())):?>

            <p>No Applications</p>

        <?php else: ;?>
            <?php foreach($model->getApplications() as $application): ?>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="<?php echo HOME_URL.'applications/application/'.$application["application_name"]; ?>">
                        <img class="img-responsive" src="<?php echo $model->getImage($application["image"])?>" alt="">
                    </a>
                    <a href="<?php echo HOME_URL.'applications/application/'.$application["application_name"]; ?>">
                        <?php echo $application["application_name"] ;?></a>
                </div>
            <?php endforeach; ?>
        <?php endif ?>
    </div> <!-- End row -->


<?php include V_ROOT . 'includes/footer.php'; ?>