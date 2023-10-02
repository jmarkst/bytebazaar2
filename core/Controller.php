<?php
namespace app\core;

use app\core\Application;

class Controller {
    /**
     * Controller class
     * Base class ng mga controllers.
    */
    
    public function render($view, $params = []) {
        /**
         * render($view, $params)
         * Ire-render yung page.
         * Parameters
         * - (string) $view: yung view na ire-render
         * - (array) $params: yung data na ipapasa sa pag-render sa page. Default ay empty array.
        */
        return Application::$APP->router->renderView($view, $params);
    }
    
}