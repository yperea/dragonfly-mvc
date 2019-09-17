<?php
$variables = [
    'APP_KEY' => '937a4a8c13e317dfd28effdd479cad2f',
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',
    'DB_NAME' => 'demoDB',
    'DB_PORT' => '3306',
    'APP_HOST' => 'dragonfly-mvc/',
    'APP_URL' => 'http://localhost/dragonfly-mvc/',
    'APP_PATH' => $_SERVER['DOCUMENT_ROOT'] . "/dragonfly-mvc/"
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}
?>

