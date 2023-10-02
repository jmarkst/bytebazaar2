<?php
namespace app\core;

class Response {
    /**
     * Response class
     * Class na namamahala sa mga HTTP responses ng ating server.
    */
    public function setStatusCode(int $code) {
        /**
         * setStatusCode($code)
         * Nagse-set sa HTTP response code.
         * Parameters:
         * - (int) $code: isang valid na HTTP response code na itataas.
        */
        http_response_code($code);
    }
    
}