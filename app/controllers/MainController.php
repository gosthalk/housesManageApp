<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
//use app\models\Main;
//use app\models\MainDataGateway;

class MainController extends Controller {

    public $flag = false;
    public $data;

    public function indexAction(){

        $this->view->render('Главная страница', false, $result, $count, $page);
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'app/views/errors' . $code . '.php';
        exit;
    }

}