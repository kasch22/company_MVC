<?php


ini_set('display_erros', 'On');

define('CORE_ROOT', __DIR__ .'/');
define('C_ROOT', '../app/controllers/');
define('V_ROOT', '../app/views/');
define('M_ROOT', '../app/models/');

define('BASE_URL', 'http://localhost/gkdMVC/');
define('HOME_URL', BASE_URL . 'public/');
define('CSS_ROOT', HOME_URL . 'css/');
define('JS_ROOT', HOME_URL . 'js/');
define('IMG_URL', HOME_URL.'res/images/');
define('IMG_LOCAL', '/Applications/XAMPP/xamppfiles/htdocs/gkdMVC/public/res/images/');

define('ADMIN_HOME', HOME_URL.'/adminhome/');


//require_once APP_ROOT.'/functions/functions.php';


// DB Info
define('DB_HOST', '127.0.0.1');
define('DB_USER','root');
define('DB_PW','');
define('DB_DB','GKD_DB');


