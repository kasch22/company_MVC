<?php

include V_ROOT . 'includes/adminheader.php';
include V_ROOT . 'includes/adminnavbar.php';

?>




<h1>Admin Home page</h1>

<div class="row">
    <div class="col-lg-12">

        <h2>Edit a Page</h2>


        <? if(empty($model->getSitePages())):?>

            <p>No pages to edit</p>

        <? else:?>

            <? foreach($model->getSitepages() as $pages):?>
            <? $i = 0;?>
                <p><a href=<?=HOME_URL."adminhome/editPages/".$pages['page_slug']?>><? echo $pages['page_title']?> Page</a></p>
            <? $i++;?>
            <? endforeach; ?>

        <? endif;?>


        <button>Add a Page</button>


    </div>


</div>




<?php include V_ROOT . 'includes/adminfooter.php'; ?>