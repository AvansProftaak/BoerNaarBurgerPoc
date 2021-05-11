<?php

class Controller {

    // require the model
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        // instantiate the model
        return new $model();
    }


    // require the view, if exists.
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }
    }
}
