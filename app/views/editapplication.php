<?

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>



    <div class="row">
        <h1>Edit Product: <?=$model->getApplicationName()?></h1>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <h2>Application Information</h2>

            <form method="get" action="<?=HOME_URL.'adminApplications/updateApplication/'.$model->getApplicationName()?>">
                <div class="form-group">
                    <label name="application_name">Name</label><input name="application_name" type="text" value="<?=$model->getApplicationName();?>">
                </div>
                <div class="form-group">
                    <label name="application_description">Description</label><input name="application_description" type="text" value="<?=$model->getApplicationDescription();?>">
                </div>


                <? $wi=0; ?>
                <? while($wi < 4): ?>
                    <div class="form-group">
                        <label>Image <?=$wi +1; ?></label>
                        <select name="image_<?= $wi +1;?>_id">

                                <? foreach($model->getImageInfo() as $info):?>
                                    <option value="<?=$info['id']?>"><?=$info['image_title'] ?></option>
                                <? endforeach;?>
                                <option value="">No Image Selected</option>
                        </select>
                        <input name="application_image_id" value="<?=$model->getApplicationImageRef()[$wi]['id'] ?>" type="hidden">
                    </div>
                <? $wi++;?>
                <? endwhile;?>

                <button type="submit">Update</button>
            </form>
        </div>


        <div class="col-lg-4">

            <h2>Application Images</h2>
                <? if(empty($model->getApplicationImageData())):?>
                    <p>No Images</p>
                <? else:?>
                    <? foreach($model->getApplicationImageData() as $imageData):?>
                        <? $i=0;?>
                        <a class="thumbnail">
                             <img class="img-responsive" src="<?=$imageData[0]['image_src']?>" alt="">
                        </a>
                        <? $i++;?>
                    <? endforeach; ?>
                <? endif;?>

        </div>

    </div>



<? include V_ROOT . 'includes/adminfooter.php'; ?>