<?php

namespace app\core;

use app\models\Main;
use app\models\MainDataGateway;

abstract class Controller {
    public $route;
    public $view;
    public $main;
    public $gateway;

    public function __construct($route){
        $this->route = $route;
        $this->view = new View($route);
        $this->main = new Main();
        $this->gateway = new MainDataGateway();
    }

}