<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;
use app\models\MainDataGateway;
use http\Header;

class MainController extends Controller {

    public function indexAction(){

        $houses = $this->gateway->showHouses();

        $this->view->render('Дома', $houses);
    }

    public function showAllApartmentsAction(){

        $apartments = $this->gateway->showApartments();

        $this->view->render('Квартиры', $apartments);
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

        $this->gateway->checkHouse($id);

        $this->gateway->deleteHouse($id);
        $this->main->redirect('/');
        die;
    }

    public function apartmentsAction(){

        $id = $this->route['id'];

        $this->gateway->checkHouse($id);

        $apartments = $this->gateway->getApartments($id);

        $this->view->render('Квартиры', $apartments, $id);
    }

    public function addApartmentAction(){

        $id = $this->route['id'];

        $this->gateway->checkHouse($id);
        $maxFloors = $this->gateway->getMaxFloors($id);

        if(isset($_POST['addApartment'])){
            $floor = (int)htmlspecialchars($_POST['Floor']);
            $houseSquare = (float)htmlspecialchars($_POST['HouseSquare']);
            $roomsCount = (int)htmlspecialchars($_POST['RoomsCount']);
            $price = (float)htmlspecialchars($_POST['Price']);
            $apartmentNumber = (int)htmlspecialchars($_POST['ApartmentNumber']);
            $apartmentPlane = addslashes(file_get_contents($_FILES['ApartmentPlane']['tmp_name']));

            //var_dump($apartmentPlane);

            $this->gateway->addApartment($id, $floor, $houseSquare, $price, $roomsCount, $apartmentPlane, $apartmentNumber);

            $this->main->redirect("/apartments/" . $id);
            die;
        }

        //var_dump($maxFloors);
        $this->view->render('Добавить квартиру', $maxFloors);
    }

    public function editApartmentAction(){

        $id = $this->route['id'];

        $apartment = $this->gateway->checkApartment($id);
        $maxFloors = $this->gateway->getMaxFloors($apartment[0]['HouseId']);
        $apartment[0]['Floors'] = $maxFloors[0]['Floors'];

        if(isset($_POST['editApartment'])){
            $floor = (int)htmlspecialchars($_POST['Floor']);
            $houseSquare = (float)htmlspecialchars($_POST['HouseSquare']);
            $roomsCount = (int)htmlspecialchars($_POST['RoomsCount']);
            $price = (float)htmlspecialchars($_POST['Price']);
            $apartmentNumber = (int)htmlspecialchars($_POST['ApartmentNumber']);
            $apartmentPlane = addslashes(file_get_contents($_FILES['ApartmentPlane']['tmp_name']));

            $this->gateway->editApartment($floor, $houseSquare, $price, $roomsCount, $apartmentPlane, $apartmentNumber, $id);

            $this->main->redirect("/apartments/" . $id);
            die;
        }

        $this->view->render('Изменить квартиру', $apartment);
    }

    public function deleteApartmentAction(){

        $id = $this->route['id'];

        $apartment = $this->gateway->checkApartment($id);

        $this->gateway->deleteApartment($id);
        $this->main->redirect('/apartments/' . $apartment[0]['HouseId']);
        die;
    }

}