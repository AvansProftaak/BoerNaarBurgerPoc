<?php

class Core {
    // default is /pages/index. If invalid input is provided user is redirected to homepage
    // TODO: create 404 page and set as default
    protected $currentController = 'Pages';
    protected string $currentMethod = 'index';
    protected array $params = [];

    public function __construct() {
        $url = $this->getUrl();

        // open controller based on first value of url array
        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        // require the controller
        require_once '../app/Controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // in this controller call the method based on second url value
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // get parameters
        $this->params = $url ? array_values($url) : [];

        //call the function in the controller, with array of params (if any)
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // splits the url at '/' into an array of each parameter, input is trimmed and sanitized.
    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
