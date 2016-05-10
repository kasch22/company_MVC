<?php


include V_ROOT . 'includes/header.php';
include V_ROOT . 'includes/navbar.php';

?>


    <h1>Projects</h1>

<?php if(empty($model->getProjects())):?>
    <p>No projects</p>
<?php else: ;?>

    <?php foreach($model->getProjects() as $project): ?>


        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="<?php echo HOME_URL.'projects/project/'.$project["project_name"]; ?>">
                <img class="img-responsive" src="<?php echo $model->getImage($project["image"])?>" alt="">
            </a>
            <a href="<?php echo HOME_URL.'projects/project/'.$project["project_name"]; ?>">
                <?php echo $project["project_name"] ;?></a>
        </div>
    <?php endforeach; ?>

<?php endif ?>

<?php include V_ROOT . 'includes/footer.php'; ?>

