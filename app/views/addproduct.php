<?

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>

<div class="row">

    <div class="col-lg-6">

        <h2>Add Product</h2>

        <form method="get" action="<?=HOME_URL.'adminProducts/insertProduct'?>">
            <div class="form-group">
                <label name="product_name">Name</label><input type="text" name="product_name">
            </div>

            <div class="form-group">
                <label name="product_description">Description</label><input type="text" name="product_description">
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


            <button type="submit">Add Product</button>

        </form>
    </div>




</div>





<? include V_ROOT . 'includes/adminfooter.php'; ?>

