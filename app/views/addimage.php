<?

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>

<div class="row">

    <div class="col-lg-6">

        <h2>Upload Image</h2>

        <form method="post" action="<?=HOME_URL.'adminImages/insertImage'?>" enctype="multipart/form-data" >
            <div class="form-group">
                <label name="image_title">Image Title: </label>
                <input type="text" name="image_title" type="text">
            </div>

            <div class="form-group">
                <input name="file" type="file" id="file">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" name="submit">Upload Image</button>
            </div>

        </form>
    </div>

    <div class="col-lg-6">

        <? if(!empty($errorMessage)):?>
            <p class="error-message"> Upload Error: <?= str_replace("-", " ", $errorMessage);?></p>
        <? endif; ?>

    </div>

</div>



<? include V_ROOT . 'includes/adminfooter.php'; ?>

