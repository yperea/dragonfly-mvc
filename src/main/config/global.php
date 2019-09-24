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
define('REPOSITORIES_PATH', 'src/main/app/repositories/');
define('CONFIG_PATH', 'src/main/config/');
define('MODELS_NAMESPACE', 'Dragonfly\App\Models\\');
define('CONTRACTS_PATH', 'src/main/app/repositories/contracts/');
define('MODELS_PATH', 'src/main/app/models/');
define('VIEWMODELS_PATH', 'src/main/app/viewmodels/');
define('MANAGERS_PATH', 'src/main/app/managers/');
define('HELPERS_PATH', 'src/main/app/helpers/');
define('VIEWS_PATH', env('APP_PATH').'src/main/web/');
define('SERVICE_URL', 'http://localhost/dragonfly-mvc/services/taskservice.php'); //LOCAL -> Change before deploying

define('UPLOAD_PATH', 'img/');
define('PRD_UPLOAD_PATH', 'img/products/');
define('CUS_UPLOAD_PATH', 'img/customers/');

define('MAX_FILE_SIZE', 5000000);      // 500 KB
define('MAX_IMG_WIDTH', 3000);        // 3000 pixels
define('MAX_IMG_HEIGHT', 3000);       // 3000 pixels
?>