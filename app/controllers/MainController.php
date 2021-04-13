<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
//use app\models\Main;
//use app\models\MainDataGateway;

class MainController extends Controller {

    public function indexAction(){
        $this->view->render('Главная страница');

    }

    public function addAction(){
        $this->view->render('Добавить');
    }

    public function editAction(){
        $this->view->render('Изменить');
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'app/views/errors' . $code . '.php';
        exit;
    }

}