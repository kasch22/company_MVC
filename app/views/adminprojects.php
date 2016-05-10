<?php

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>


    <div class="row">

        <h1>Edit Projects</h1>

    </div>



    <div class="row">
        <? if(empty($model->getProjects())):?>
            <p>No Projects</p>
        <?else: ?>
            <? foreach($model->getProjects() as $project):?>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="<?= HOME_URL.'adminprojects/editproject/'.$project["project_name"]; ?>">
                        <img class="img-responsive" src="<?= $model->getImage($project["image"])?>" alt="">
                    </a>
                    <div class="link-left">
                        <a href="<?= HOME_URL.'adminprojects/editproject/'.$project["project_name"]; ?>">
                            Edit <?= $project["project_name"] ;?>
                        </a>
                    </div>
                    <div class="link-right">
                        <a href="<?= HOME_URL.'adminprojects/deleteproject/'.$project["project_name"]; ?>">
                            Delete <?= $project["project_name"] ;?>
                        </a>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif;?>
    </div>


    <div class="row">

        <a href="<?=HOME_URL.'adminprojects/addProject/';?>">Add New Project</a>

    </div>




<?php include V_ROOT . 'includes/adminfooter.php'; ?>