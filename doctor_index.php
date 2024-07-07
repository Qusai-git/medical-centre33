<?php

use app\controllers\DoctorController;

require_once DIR . '/config/config.php';
require_once DIR . '/lib/DB/MysqliDb.php';
require_once DIR . '/app/controllers/DoctorController.php';

$config = require 'config/config.php';
$db = new MysqliDb (
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/doctor/');

$controller = new DoctorController($db);

switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'add':
        $controller->addDoctors();
        break;
    case BASE_PATH . 'show':
        $controller->showDoctors();
        break;
    case BASE_PATH . 'delete?id=' . $_GET['id']:
        $controller->deleteDoctors($_GET['id']);
        break;
    case BASE_PATH . 'update?id=' . $_GET['id']:
        $controller->updateDoctors($_GET['id']);
        break;
    case BASE_PATH . 'search':
        $controller->searchDoctors($_POST['search_term']);
        break;
    case BASE_PATH . 'show_search':
        $controller->showSearchedDoctors($_GET['search_term']);
        break;
}
?>