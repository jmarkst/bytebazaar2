<?php
namespace app\core;

class Router {
    /**
     * Router class
     * Class para sa routing ng mga URLs.
    */
    protected array $routes = [];
    public Request $request;
    public Response $response;
    
    // yung gagamiting layout
    public string $layout = 'Main';
    
    public function __construct(Request $request, Response $response) {
        /**
         * __construct()
         * Constructor method ng Router class.
         * Parameters:
         * - (Request) $request: Request instance na gagamitin ng Router.
         * - (Response) $response: Resposne instance na gagamitin ng Router.
        */
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        /**
         * get($path, $callback)
         * Namamahala sa mga GET routes.
         * Parameters:
         * - (string) $path: yung URL
         * - (function|string) $callback: yung function na tatawagin kapag nasa URL na ito.
        */
        $this->routes['GET'][$path] = $callback;
    }
    
    public function post($path, $callback) {
        /**
         * get($path, $callback)
         * Namamahala sa mga POST routes.
         * Parameters:
         * - (string) $path: yung URL
         * - (function|string) $callback: yung function na tatawagin kapag nasa URL na ito.
        */
        $this->routes['POST'][$path] = $callback;
    }
    
    public function resolve() {
        /**
         * resolve()
         * Bubuksan yung page ng current URL, depende sa sitwasyon.
         * - Kung function ang callback, i-run yon.
         * - Kung string yung callback, i-render yung view na kaakibat non.
         * - Kung walang callback, magtaas ng 404 Not Found.
        */
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback == false) {
            $this->response->setStatusCode(404);
            return $this->renderView(404);
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        
        if (is_array($callback)) {
            // i-instance natin yung controller class kung array.
            $callback[0] = new $callback[0];
        }
        
        return call_user_func($callback, $this->request);
    }
    
    public function renderView($view, $params = []) {
        /**
         * renderView($view)
         * Ire-render yung view sa ni-specify na layout.
         * Parameters:
         * - (string|int) $view: yung view na ire-render. HTTP response code ito kung int ito.
         * - (array) $params: yung mga data na ipapasa sa pag-render ng page. Default ay empty array.
        */
        // TODO: gawing parameter yung {{content}}, at lagyan ng check kung merong ganito sa layout.
        $layoutContent = $this->getLayout($params);
        if (is_numeric($view)) {
            // lahat ng http response code ay integer,
            // lahat ng http response code file ay nagsisimula sa underscore.
            $viewContent = $this->getView('_'.$view, $params, true);
        } else {
            $viewContent = $this->getView($view, $params);
        }
        
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }
    
        
    public function setLayout($layout) {
        /**
         * setLayout($layout)
         * Sine-set yung layout na gagamitin.
         * Parameters:
         * - (string) $layout: yung layout na gagamitin.
        */
        $this->layout = $layout;
    }
    
    protected function getLayout($params = []) {
        /**
         * getLayout($layout) [layoutContent]
         * Ire-return yung output buffer ng ni-specify na layout.
         * Parameters:
         * - (string) $layout: yung layout na gagamitin. Default ay 'Main'.
        */
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        $layout = ucfirst($this->layout);
        include_once Application::$ROOT."/../views/layouts/$layout.php";
        return ob_get_clean();
    }
    
    protected function getView($view, $params = [], $isHttp = false) {
        /**
         * getView($view) [renderOnlyView]
         * Ire-return yung output buffer ng ni-specify na view.
         * Parameters:
         * - (string) $view: yung view na gagamitin.
         * - (array) $params: yung mga data na ipapasa sa pag-render sa page. Default ay empty array.
         * - (boolean) $isHttp: kung http status code ang ire-render na view.
        */
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        if ($isHttp) {
            include_once Application::$ROOT."/../views/http/$view.php";
        } else {
            include_once Application::$ROOT."/../views/$view.php";
        }
        return ob_get_clean();
    }
}