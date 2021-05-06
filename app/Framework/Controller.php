<?php

class Controller {
    // here we load the model
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // here we check if the view is there, if not we reply with a view does not exist message
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exists.");
        }
    }
}
