<?

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>



    <div class="row">

        <h1>Edit Product: <?=$model->getProductName()?></h1>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <h2>Product Information</h2>

            <form method="get" action="<?=HOME_URL.'adminProducts/updateProduct/'.$model->getProductName()?>">
                <div class="form-group">
                    <label name="product_name">Name</label><input type="text" name="product_name" value="<?=$model->getProductName();?>">
                </div>
                <div class="form-group">
                    <label name="product_description">Description</label><input type="text" name="product_description" value="<?=$model->getProductDescription();?>">
                </div>

                <div class="form-group">
                    <label>Select Image</label>
                    <select name="image_id">
                        <? if(empty($model->getImageInfo())):?>
                            <option>No Images</option>
                        <? else:?>
                            <? foreach($model->getImageInfo() as $info):?>
                                <option value="<?=$info['id']?>"><?=$info['image_title'] ?></option>
                            <? endforeach;?>
                                <option value="">No Image Selected</option>

                        <? endif; ?>
                    </select>
                </div>

                <button type="submit">Update</button>

            </form>
        </div>

        <div class="col-lg-6">

            <h2>Product Image</h2>
            <img class="img-responsive" src="<?php echo $model->getImgSrc()?>" alt="">

        </div>
    </div>



<? include V_ROOT . 'includes/adminfooter.php'; ?>