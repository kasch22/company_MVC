<?

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>

<div class="row">

    <div class="col-lg-6">

        <h2>Add Application</h2>

        <form method="get" action="<?=HOME_URL.'adminApplications/insertApplication'?>">
            <div class="form-group">
                <label name="application_name">Name: </label><input type="text" name="application_name">
            </div>

            <div class="form-group">
                <label name="application_description">Description: </label><input type="text" name="application_description">
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
                </div>
                <? $wi++;?>
            <? endwhile;?>


            <button type="submit">Add Application</button>

        </form>


    </div>




</div>





<? include V_ROOT . 'includes/adminfooter.php'; ?>

