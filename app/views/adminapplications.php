<?php

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>


    <div class="row">

        <h1>Edit Applications</h1>

    </div>

    <div class="row">
        <? if(empty($model->getApplications())):?>
            <p>No Applications</p>
        <?else: ?>
            <? foreach($model->getApplications() as $application):?>


                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="<?= HOME_URL.'adminapplications/editapplication/'.$application["application_name"]; ?>">
                        <img class="img-responsive" src="<?= $model->getImage($application["image"])?>" alt="">
                    </a>
                    <div class="link-left">
                        <a href="<?= HOME_URL.'adminapplications/editapplication/'.$application["application_name"]; ?>">
                            Edit <?= $application["application_name"] ;?>
                        </a>
                    </div>
                    <div class="link-right">
                        <a href="<?= HOME_URL.'adminapplications/deleteapplication/'.$application["application_name"]; ?>">
                            Delete <?= $application["application_name"] ;?>
                        </a>
                    </div>
                </div>
            <? endforeach; ?>


        <? endif;?>

    </div>

    <div class="row">

        <a href="<?=HOME_URL.'adminapplications/addApplication/';?>">Add New Application</a>

    </div>


<?php include V_ROOT . 'includes/adminfooter.php'; ?>