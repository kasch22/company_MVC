
<div class="row">
    <nav class="navbar navbar-default admin-navbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo HOME_URL?>">LOGO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?=ADMIN_HOME?>">Edit Pages</a></li>
                    <li><a href="<?=HOME_URL?>adminproducts/">Edit Products</a></li>
                    <li><a href="<?=HOME_URL?>adminapplications/">Edit Applications</a></li>
                    <li><a href="<?=HOME_URL?>adminprojects/">Edit Projects</a></li>
                    <li><a href="<?=HOME_URL?>adminimages/uploadImage">Upload Image</a></li>
                    <li><a href="<?=HOME_URL?>adminimages/">Manage Images</a></li>
                    <li><a href="#">User:
                            <?
                                if(isset($_SESSION['username']))
                                {
                                    echo $_SESSION['username'];
                                } else
                                {
                                    echo 'no session';
                                }
                            ?>
                        </a>
                    </li>
                </ul>




            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>