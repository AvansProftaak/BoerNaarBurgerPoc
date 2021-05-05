<?php

class Core {
    protected $currentController = 'Pages';
    protected string $currentMethod = 'index';
    protected array $params = [];

    public function __construct() {
        $url = $this->getUrl();

        // this if statement will check if the first part of the url exists inside app/controllers
        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // if the ffirst part of the url is valid we get that page, else we get the default "pages"
        require_once '../app/Controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            // check if $url[1] is a valid function/method in the currentcontroller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // if there are more params wich are not unset put them in this->params 
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // this function is called in the __connstruct to get the params in the $url and insert them in an array
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
