<?php


class Shops extends Controller
{
    public function __construct() {

    }

    public function step1() {
        $this->view('shops/step1');
    }

    public function step2() {
        $this->view('shops/step2');
    }

    public function step3() {
        $this->view('shops/step3');
    }

    public function success() {
        $this->view('shops/success');
    }

    public function failure() {
        $this->view('shops/failure');
    }
}
