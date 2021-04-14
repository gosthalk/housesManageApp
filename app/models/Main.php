<?php

namespace app\models;

use app\core\Model;
use app\controllers\MainController;
use app\core\View;

class Main extends Model{



    public function redirect($url){
        header('location: ' . $url);
    }

}