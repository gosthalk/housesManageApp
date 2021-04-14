<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;
use app\models\MainDataGateway;

class MainController extends Controller {

    public $data;

    public function indexAction(){

        $this->data = new MainDataGateway();
        $result = $this->data->showHouses();

        $this->view->render('Дома', $result);
    }

    public function addHouseAction(){
        $this->view->render('Добавить дома');
    }

    public function editHouseAction(){
        $this->view->render('Изменить дом');
    }

    public function addApartmentAction(){
        $this->view->render('Добавить квартиру');
    }

    public function editApartmentAction(){
        $this->view->render('Изменить квартиру');
    }

}