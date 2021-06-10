<?php

use App\Traits\TranslationTrait;

class Products extends Controller
{
    use TranslationTrait;

    private $shopOwnerModel;
    public $shopModel;
    public $productModel;

    public function __construct() {
        $this->shopOwnerModel = $this->model('Shopowner');
        $this->shopModel = $this->model('Shop');
        $this->productModel = $this->model('Product');
    }

    public function importProduct() {
        if (isLoggedInShopOwner()) {



            $this->view('products/importProduct');
        } else {
            header('location: ' . URLROOT . '/Shopowners/login');
        }
    }
}
