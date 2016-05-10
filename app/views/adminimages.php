<?php
/*
echo "<pre>";
print_r($model->getImages());
echo "</pre>";
*/
include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';


?>

    <div class="row">


        <h1>Uploaded Images</h1>

    </div>

    <div class="row">
        <? if(empty($model->getImages())):?>
            <p>No Images</p>
        <?else: ?>
            <? foreach($model->getImages() as $image):?>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="<?= $image["image_src"]?>" alt="">
                    </a>



                    <div class="">
                        <p>Title: <?=$image["image_title"]?></p>
                        <a href="<?= HOME_URL.'adminimages/deleteimage/'.$image["id"]; ?>">
                            Delete
                        </a>

                    </div>
                </div>
            <? endforeach; ?>
        <? endif;?>
    </div>


<? include V_ROOT . 'includes/adminfooter.php'; ?>

