<?php

namespace app\models;

use app\core\Model;

class MainDataGateway extends Model{

    public function showHouses(){

        $houses = $this->db->row("SELECT * from houses");
        $districts = $this->db->row("SELECT * FROM districts");
        $housesType = $this->db->row("SELECT * FROM housesTypes");

        // Заменяем значения в главной таблице из таблиц справочников

        if(!empty($houses)) {
            for ($i = 0; $i < count($houses); $i++) {
                for ($j = 0; $j < count($districts); $j++) {
                    if ($houses[$i]['District'] == $districts[$j]['Id']) {
                        $houses[$i]['District'] = $districts[$j]['DistrictName'];
                    }
                }
                for ($k = 0; $k < count($housesType); $k++) {
                    if ($houses[$i]['HouseType'] == $housesType[$k]['Id']) {
                        $houses[$i]['HouseType'] = $housesType[$k]['TypeName'];
                    }
                }
            }
        }

        return $houses;
    }

    public function showApartments(){
        $apartments = $this->db->row("SELECT * from apartments");
        $rooms = $this->db->row("SELECT * from rooms");

        if(!empty($apartments)) {

            for ($i = 0; $i < count($apartments); $i++) {
                for($j = 0; $j < count($rooms); $j++){
                    if ($apartments[$i]['RoomsCount'] == $rooms[$j]['Id']) {
                        $apartments[$i]['RoomsCount'] = $rooms[$j]['RoomsCount'];
                    }
                }
            }
        }

        return $apartments;
    }

    public function addHouse($district, $builtYear, $floors, $houseType){

        $query = "INSERT INTO houses (District, BuiltYear, Floors, HouseType) VALUES ($district, $builtYear, $floors, $houseType)";
        $this->db->query($query);
    }

    public function editHouse($district, $builtYear, $floors, $houseType, $id){

        $query = "UPDATE houses SET District=$district, BuiltYear=$builtYear, Floors=$floors, HouseType=$houseType where id=$id";
        //var_dump($query);
        $this->db->query($query);
    }

    public  function deleteHouse($id){

        $query = "DELETE FROM houses WHERE id=$id";
        $this->db->query($query);
    }

    public function checkHouse($id){

        $house = $this->db->row("SELECT * from houses where id=$id");

        if(empty($house)){
            echo '<h1>Данный дом не найден!</h1>';
            die;
        }else{
            return $house;
        }

    }

    public function checkApartment($id){

        $apartment = $this->db->row("SELECT * from apartments where id=$id");

        if(empty($apartment)){
            echo '<h1> Данная квартира не найдена! </h1>';
            die;
        }else{
            return $apartment;
        }

    }

    public function getMaxFloors($id){

        $query = "SELECT Floors from houses where id=$id";
        return $this->db->row($query);
    }

    public function getApartments($id){

        $apartments = $this->db->row("SELECT * from apartments WHERE HouseId=$id");
        $rooms = $this->db->row("SELECT * from rooms");

        if(!empty($apartments)) {

            for ($i = 0; $i < count($apartments); $i++) {
                for($j = 0; $j < count($rooms); $j++){
                    if ($apartments[$i]['RoomsCount'] == $rooms[$j]['Id']) {
                        $apartments[$i]['RoomsCount'] = $rooms[$j]['RoomsCount'];
                    }
                }
            }
        }

        return $apartments;
    }

    public function addApartment($houseId, $floor, $houseSquare, $price, $roomsCount, $apartmentPlane, $apartmentNumber){

        $query = "INSERT INTO apartments (HouseId, Floor, HouseSquare, Price, RoomsCount, PlaneImage, ApartmentNumber) 
            VALUES ($houseId, $floor, $houseSquare, $price, $roomsCount, '$apartmentPlane', $apartmentNumber)";
        $this->db->query($query);
    }

    public function editApartment($floor, $houseSquare, $price, $roomsCount, $apartmentPlane, $apartmentNumber, $id){

        $query = "UPDATE apartments SET Floor=$floor, HouseSquare=$houseSquare, Price=$price, RoomsCount=$roomsCount, PlaneImage=$apartmentPlane, ApartmentNumber=$apartmentNumber where id=$id";
        $this->db->query($query);
    }

}