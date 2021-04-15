<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;
use app\models\MainDataGateway;
use http\Header;

class MainController extends Controller {

    public function indexAction(){

        $result = $this->gateway->showHouses();

        $this->view->render('Дома', $result);
    }

    public function addHouseAction(){
        if(isset($_POST['addHouse'])){
            $district = (int)htmlspecialchars($_POST['District']);
            $builtYear = (int)htmlspecialchars($_POST['BuiltYear']);
            $floors = (int)htmlspecialchars($_POST['Floors']);
            $houseType = (int)htmlspecialchars($_POST['HouseType']);

            $this->gateway->addHouse($district, $builtYear, $floors, $houseType);

            $this->main->redirect('/');
            die;
        }

        $this->view->render('Добавить дома');
    }

    public function editHouseAction(){

        $id = $this->route['id'];
        $house = $this->gateway->checkHouse($id);

        if(isset($_POST['editHouse'])){
            $district = (int)htmlspecialchars($_POST['District']);
            $builtYear = (int)htmlspecialchars($_POST['BuiltYear']);
            $floors = (int)htmlspecialchars($_POST['Floors']);
            $houseType = (int)htmlspecialchars($_POST['HouseType']);

            $this->gateway->editHouse($district, $builtYear, $floors, $houseType, $id);

            $this->main->redirect('/');
            die;
        }

        $this->view->render('Изменить дом', $house);
    }

    public function deleteHouseAction(){

        $id = $this->route['id'];

        $this->gateway->deleteHouse($id);
        $this->main->redirect('/');
        die;
    }

    public function addApartmentAction(){
        $this->view->render('Добавить квартиру');
    }

    public function editApartmentAction(){
        $this->view->render('Изменить квартиру');
    }

}