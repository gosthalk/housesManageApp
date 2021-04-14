<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;
use app\models\MainDataGateway;
use http\Header;

class MainController extends Controller {

    public $data;

    public function indexAction(){

        $this->data = new MainDataGateway();
        $result = $this->data->showHouses();

        $this->view->render('Дома', $result);
    }

    public function addHouseAction(){
        if(isset($_POST['addHouse'])){
            $district = (int)htmlspecialchars($_POST['District']);
            $builtYear = (int)htmlspecialchars($_POST['BuiltYear']);
            $floors = (int)htmlspecialchars($_POST['Floors']);
            $houseType = (int)htmlspecialchars($_POST['HouseType']);

            $this->data = new MainDataGateway();
            $this->data->addHouse($district, $builtYear, $floors, $houseType);

            $this->main->redirect('/');
            die;
        }

        $this->view->render('Добавить дома');
    }

    public function editHouseAction(){
        var_dump($this->route['id']);

        $this->view->render('Изменить дом');
    }

    public function deleteHouseAction(){

    }

    public function addApartmentAction(){
        $this->view->render('Добавить квартиру');
    }

    public function editApartmentAction(){
        $this->view->render('Изменить квартиру');
    }

}