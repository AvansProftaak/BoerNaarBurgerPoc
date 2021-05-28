<?php

use App\Traits\TranslationTrait;

class Shops extends Controller
{
    use TranslationTrait;
    /**
     * @var mixed
     */
    private $shopModel;
    private $customerModel;

    public function __construct() {
        $this->shopModel = $this->model('Shop');
        $this->customerModel = $this->model('Customer');
    }

    public function overview() {
        if (isset($_GET['location'])) {
        $cities = $this->shopModel->getShops();
        $filterParam = $_GET['location'];
        $shops = $this->shopModel->getFilteredShops($filterParam);

        $data = [
            'cities' => $cities,
            'shops' => $shops
        ];

        $this->view('shops/overview', $data);
        } else {
            $cities = $this->shopModel->getShops();
            $shops = $this->shopModel->getShops();
            $data = [
                'cities' => $cities,
                'shops' => $shops
            ];

            $this->view('shops/overview', $data);
        }
    }

    public function step1() {
        if (isset($_GET['shop'])) {

            $shop = $this->shopModel->getShop($_GET['shop']);

            if($shop) {

                $products = $this->shopModel->getShopProducts($shop);

                $data = [
                    'shop'      => $shop,
                    'products'  => $products
                ];

                $this->view('shops/step1', $data);
            } else {
                $this->view('shops/notfound');
            }
        } else {
            $this->view('shops/notfound');
        }
    }

    public function step2() {
        $customer = '';
        if (isLoggedIn()) {
            $customer = $this->customerModel->getAccountDetails($_SESSION['email']) ? $this->customerModel->getAccountDetails($_SESSION['email']) : null;
        }
        if (isset($_GET['shop'])) {

            $shop = $this->shopModel->getShop($_GET['shop']);

            if($shop) {

                $products = $this->shopModel->getShopProducts($shop);

                $data = [
                    'shop'      => $shop,
                    'products'  => $products,
                    'customer'  => $customer
                ];

                $this->view('shops/step2', $data);
            } else {
                $this->view('shops/notfound');
            }
        } else {
            $this->view('shops/notfound');
        }
    }

    public function step3() {
        if (isset($_GET['shop'])) {

            $shop = $this->shopModel->getShop($_GET['shop']);

            if($shop) {

                $data = [
                    'shop'      => $shop,
                ];

                $this->view('shops/step3', $data);
            } else {
                $this->view('shops/notfound');
            }
        } else {
            $this->view('shops/notfound');
        }
    }

    public function success() {
        if (isset($_GET['shop'])) {

            $shop = $this->shopModel->getShop($_GET['shop']);

            if($shop) {

                $data = [
                    'shop'      => $shop,
                ];

                $this->view('shops/success', $data);
            } else {
                $this->view('shops/notfound');
            }
        } else {
            $this->view('shops/notfound');
        }
    }

    public function failure() {
        if (isset($_GET['shop'])) {

            $shop = $this->shopModel->getShop($_GET['shop']);

            if($shop) {

                $data = [
                    'shop'      => $shop,
                ];

                $this->view('shops/failure', $data);
            } else {
                $this->view('shops/notfound');
            }
        } else {
            $this->view('shops/notfound');
        }
    }

    public function shopdistrict() {
        $shopsZeeland = $this->shopModel->getShopsZeeland();
        $shopsWestBrabant = $this->shopModel->getShopsWestBrabant();
        $shopsMiddenBrabant = $this->shopModel->getShopsMiddenBrabant();
        $shopsOostBrabant = $this->shopModel->getShopsOostBrabant();

        $data = [
            'shopsZeeland' => $shopsZeeland,
            'shopsWestBrabant' => $shopsWestBrabant,
            'shopsMiddenBrabant' => $shopsMiddenBrabant,
            'shopsOostBrabant' => $shopsOostBrabant,

    ];

        $this->view('shops/shopdistrict', $data);
    }


}
