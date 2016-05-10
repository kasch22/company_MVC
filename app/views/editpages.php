<?
include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';
?>


    <div class="row">
        <h1>Edit <?=$model->getPageTitle()?> Page</h1>
    </div>

    <div class="row">
        <h2>Page Information</h2>
        <form method="get" action="<?=HOME_URL.'adminHome/updatePage/'.$model->getPageId()?>">
            <label>Page Title</label><input type="text" name="page-title" value="<?=$model->getPageTitle()?>">

            <label>Page Slug</label><input type="text" name="page-slug" value="<?=$model->getPageSlug()?>">


        <h4>Page Text</h4>


            <? if(empty($model->getPageBlocks())):?>

                <p>No Blocks of text associated with page</p>
            <? else: ?>

                <? foreach($model->getPageBlocks() as $block): ?>
                    <? $i = 0;?>

                <label>Page Block of Text: <?=$i+1; ?> </label> <input type="text" name="page-block" value="<?=$block["block_value"]?>">
                <input type="hidden" name="block-id" value="<?=$block["id"]?>">

                <? endforeach; ?>
            <? endif; ?>

            <input type="hidden" name="page-id" value="<?=$model->getPageId()?>">
            <input type="submit" value="Update Page">
        </form>
    </div>


<?php include V_ROOT . 'includes/adminfooter.php'; ?>