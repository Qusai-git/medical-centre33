<?php

use app\controllers\RateController;

require_once DIR . '/config/config.php';
require_once DIR . '/lib/DB/MysqliDb.php';
require_once DIR . '/app/controllers/RateController.php';

$config = require 'config/config.php';
$db = new MysqliDb (
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/rate/');

$controller = new RateController($db);

switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'add':
        $controller->addRates();
        break;
    case BASE_PATH . 'show':
        $controller->showRates();
        break;
    case BASE_PATH . 'delete?id=' . $_GET['id']:
        $controller->deleteRates($_GET['id']);
        break;
    case BASE_PATH . 'update?id=' . $_GET['id']:
        $controller->updateRates($_GET['id']);
        break;
}
?>