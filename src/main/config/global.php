<?php
define('URI', $_SERVER['REQUEST_URI']);
define("CONTROLLER", "Home");
define("ACTION", "Index");
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('APP_HOST', env('APP_HOST'));//LOCAL -> Change before deploying
define('APP_PATH', env('APP_PATH'));//LOCAL -> Change before deploying
define('CORE', 'core/');
define('CONTROLLERS_NAMESPACE', 'Dragonfly\App\Controllers\\');
define('CONTROLLERS_PATH', 'src/main/app/controllers/');
define('BASE_PATH', 'src/main/app/base/');
define('DATA_PATH', 'src/main/app/data/');
define('CONFIG_PATH', 'src/main/config/');
define('MODELS_NAMESPACE', 'Dragonfly\App\Models\\');
define('MODELS_PATH', 'src/main/app/models/');
define('VIEWS_PATH', env('APP_PATH').'src/main/web/');
define('SERVICE_URL', 'http://localhost/dragonfly-mvc/services/taskservice.php'); //LOCAL -> Change before deploying
?>