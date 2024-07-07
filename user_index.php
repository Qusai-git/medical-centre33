<?php

require_once __DIR__ . '/config/dbconfig.php';
require_once __DIR__ . '/lib/library/MysqliDb.php';
require_once __DIR__ . '/app/controllers/UserController.php';

$config = require 'config/dbconfig.php';
$db = new MysqliDb (
    $config['host'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

$request = $_SERVER["REQUEST_URI"];
define('BASE_PATH', '/');

$userCont = new UserController($db);


switch ($request) {
	case BASE_PATH . 'users':
	   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	   	   $userCont->index();
	   }
	    break;
	
	case BASE_PATH . 'user/add':
	   if ($_SERVER["REQUEST_METHOD"] === 'POST') {
	   	   $userCont->addUser();
	   }
	    break;

	case (preg_match('/\/users\/update\/(\d+)/', $request, $matches) ? true : false):

	   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $userCont->updateUser($matches[1]);

	   }elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
	            $userCont->updateUser($matches[1]);
	   }
        break;

    case (preg_match('/\/users\/delete\/(\d+)/', $request, $matches) ? true : false):
    
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       	   $userCont->deleteUser($matches[1]);
       }      
	   break;
}
?>