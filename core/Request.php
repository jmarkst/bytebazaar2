<?php
namespace app\core;

class Request {
    /**
     * Request class
     * Class na namamahala sa mga request patungkol sa URL (info halimbawa)
    */
    public function getPath() {
        /**
         * getPath()
         * Kukunin yung URL path (nang walang GET data).
        */
        
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        $pos = strpos($path, '?');
        
        if ($pos == false) {
            return $path;
        }
        
        return substr($path, 0, $pos);
    }
    
    public function getMethod() {
        /**
         * getMethod()
         * Kukunin yung method (GET o POST) ng current URL.
        */
        
        return $_SERVER['REQUEST_METHOD'];
    }
    
    public function isGet() {
        /**
         * isGet()
         * Returns true kapag GET ang request method.
        */
        return $this->getMethod() == "GET";
    }
    
    public function isPost() {
        /**
         * isPost()
         * Returns true kapag POST ang request method.
        */
        return $this->getMethod() == "POST";
    }
    
    
    public function getBody() {
        /**
         * getBody()
         * Sina-sanitize at ire-return yung GET o POST data ng URL.
        */
        $body = [];
        if ($this->getMethod() === "GET") {
            foreach ($_GET as $key => $value) {
                // sanitize para secure yung data bago iproseso ng server.
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else {
            foreach ($_POST as $key => $value) {
                // sanitize para secure yung data bago iproseso ng server.
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        
        return $body;
    }
    
}