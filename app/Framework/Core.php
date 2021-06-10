<?php

class Core {
    // default is /pages/notFound. If invalid input is provided user is redirected to not found page
    protected $currentController = 'Pages';
    protected string $currentMethod = 'notFound';
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
            // check if $url[1] is a valid function/method in the currentcontroller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }


        // if there are more params wich are not unset put them in this->params 
        $this->params = $url ? array_values($url) : [];

        //call the function in the controller, with array of params (if any)
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // splits the url at '/' into an array of each parameter, input is trimmed and sanitized.
    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // escape characters not allowed in a url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // divide the url into an array where we use the / as the delimiter
            $url = explode('/', $url);

            return $url;
        }
    }
}
