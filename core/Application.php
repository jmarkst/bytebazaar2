<?php
namespace app\core;

class Application {
   /**
    * Application class
    * Class na namamahala sa buong application.
   */
   public static string $ROOT;
   public static Application $APP;
   public Router $router;
   public Request $request;
   public Response $response;
    
   public function __construct($root) {
       /**
        * __construct()
        * Constructor method ng Application class.
        * Parameters:
        * - (string) $root: yung root folder ng Application.
       */
       self::$ROOT = $root;
       self::$APP = $this;
       $this->request = new Request();
       $this->response = new Response();
       $this->router = new Router($this->request, $this->response);
   }
   
   public function run() {
       /**
        * run()
        * I-run yung buong application.
       */
       echo $this->router->resolve();
   }
}