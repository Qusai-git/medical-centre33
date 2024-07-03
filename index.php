<?php

use app\controllers\AdminController;

require_once __DIR__ . '/config/dbconfig.php';
require_once __DIR__ . '/lib/library/MysqliDb.php';
require_once __DIR__ . '/app/controllers/AdminController.php';

$config = require 'config/dbconfig.php';
$db = new MysqliDb (
    $config['host'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

$request = $_SERVER["REQUEST_URI"];
define('BASE_PATH', '/');

$controller = new AdminController($db);

//var_dump($request);

echo '<pre>';
//var_dump($db);
echo '</pre>';

?>