<?php


class Shops extends Controller
{
    /**
     * @var mixed
     */
    private $shopModel;

    public function __construct() {
        $this->shopModel = $this->model('Shop');
    }

    public function overview() {
        $shops = $this->shopModel->getShops();

        $data = [
            'shops' => $shops
        ];

        $this->view('shops/overview', $data);
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
