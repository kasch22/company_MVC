<?php

require_once 'App.php';
require_once 'Controller.php';

spl_autoload_register(function($class){
    require_once CORE_ROOT .$class.'.php';
});



?>