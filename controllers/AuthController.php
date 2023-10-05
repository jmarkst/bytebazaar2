<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

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
        if ($request->isGet()) {
            return $this->render('login');
        } else {
            return "POST";
        }
    }
    
    public function register(Request $request) {
        /**
         * register()
         * Register page (/auth/register)
        */
        
        //$model = new RegisterModel();
        $errors = [];
        
        if ($request->isGet()) {
            return $this->render('register', [
                    'model' => $model,
                    'errors' => []
                ]);
            
        } else {/**
            $model->load($request->getBody());
            
            if ($model->validate() && $model->register()) {
                // kung validate na at registered na yung account, success page.
                return "Success";
            }
            
            // may errors ibig sabihin kung umabot dito yung code.
            return $this->render('register', [
                'model' => $model,
                'errors' => $errors
            ]);**/
            return "Post";
        }
    }
}