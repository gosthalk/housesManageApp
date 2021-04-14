<?php

namespace app\models;

use app\core\Model;

class MainDataGateway extends Model{

    public function showHouses(){

        $houses = $this->db->row("SELECT * from houses");
        $districts = $this->db->row("SELECT * FROM districts");
        $housesType = $this->db->row("SELECT * FROM housesTypes");

        // Заменяем значения в главной таблице из таблиц справочников

        for($i=0;$i<count($houses);$i++){
            for($j=0;$j<count($districts);$j++){
                if($houses[$i]['District'] == $districts[$j]['Id']){
                    $houses[$i]['District'] = $districts[$j]['DistrictName'];
                }
            }
            for($k=0;$k<count($housesType);$k++){
                if($houses[$i]['HouseType'] == $housesType[$k]['Id']){
                    $houses[$i]['HouseType'] = $housesType[$k]['TypeName'];
                }
            }
        }

        return $houses;
    }

    public function addHouse($district, $builtYear, $floors, $houseType){

        $query = "INSERT INTO houses (District, BuiltYear, Floors, HouseType) VALUES ($district, $builtYear, $floors, $houseType)";
        $this->db->query($query);
    }

    public function editHouse($id){

    }

    public  function deleteHouse($id){

    }

}