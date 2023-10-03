<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class HomeController extends Controller {
    /*
     * HomeController
     * Controller class ng Home page.
    */
    
    public function home() {
        /**
         * home()
         * Default home page (GET /).
        */
        $params = [];
        return $this->render('home', $params);
    }
}