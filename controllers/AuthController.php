<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class AuthController extends Controller {
    /*
     * AuthController
     * Controller class ng Authentication (login, register).
    */
    
    public function login(Request $request) {
        /**
         * login()
         * Login page (/auth/login)
        */
        if ($request->getMethod() === "GET") {
            return $this->render('login');
        } else {
            // POST
        }
    }
    
    public function register(Request $request) {
        /**
         * register()
         * Register page (/auth/register)
        */
        if ($request->getMethod() === "GET") {
            return $this->render('register');
        } else {
            // POST.
        }
    }
}