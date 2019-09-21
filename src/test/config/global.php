<?php
//define('URI', $_SERVER['REQUEST_URI']);
define("CONTROLLER", "Home");
define("ACTION", "Index");
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('APP_HOST', 'dragonfly-mvc/');//LOCAL -> Change before deploying
define('APP_PATH', $_SERVER['DOCUMENT_ROOT'] . '/dragonfly-mvc/');//LOCAL -> Change before deploying
define('CORE', 'core/');
define('CONTROLLERS_NAMESPACE', 'Dragonfly\App\Controllers\\');
define('CONTROLLERS_PATH', '/../../../main/app/controllers/');
define('BASE_PATH', '/../../../main/app/base/');
define('DATA_PATH', '/../../../main/app/data/');
define('REPOSITORIES_PATH', '/../../../main/app/repositories/');
define('CONFIG_PATH', '/../../../test/config/');
define('MODELS_NAMESPACE', 'Dragonfly\App\Models\\');
define('CONTRACTS_PATH', '/../../../main/app/repositories/contracts/');
define('MODELS_PATH', '/../../../main/app/models/');
define('VIEWMODELS_PATH', '/../../../main/app/viewmodels/');
define('MANAGERS_PATH', '/../../../main/app/managers/');
define('HELPERS_PATH', '/../../../main/app/helpers/');
define('VIEWS_PATH', $_SERVER['DOCUMENT_ROOT'] . '/dragonfly-mvc/src/main/web/');
define('SERVICE_URL', 'http://localhost/dragonfly-mvc/services/taskservice.php'); //LOCAL -> Change before deploying
?>