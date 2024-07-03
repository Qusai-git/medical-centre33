<?php
namespace app\controllers;

echo "Hello<br>";

require __DIR__.'/../models/AdminModel.php';
use app\models\AdminModel;


class AdminController {
    private $Model;
    
    public function __construct($db) {
      
        $this->model = new AdminModel($db);
    }
}

?>