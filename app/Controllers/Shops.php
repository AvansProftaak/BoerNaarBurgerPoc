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
    private $orderModel;

    public function __construct() {
        $this->shopModel = $this->model('Shop');
        $this->customerModel = $this->model('Customer');
        $this->orderModel = $this->model('Order');
    }

    public function shopdistrict() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $shopsZeeland = $this->shopModel->getShopsZeeland();
            $shopsWestBrabant = $this->shopModel->getShopsWestBrabant();
            $shopsMiddenBrabant = $this->shopModel->getShopsMiddenBrabant();
            $shopsOostBrabant = $this->shopModel->getShopsOostBrabant();
            $shopsAll = $this->shopModel->getShopsAll();
            $cities = $this->shopModel->getShops();
            $shops = $this->shopModel->getShops();
            
            $data = [
                'cities' => $cities,
                'shops' => $shops,
                'shopsZeeland' => $shopsZeeland,
                'shopsWestBrabant' => $shopsWestBrabant,
                'shopsMiddenBrabant' => $shopsMiddenBrabant,
                'shopsOostBrabant' => $shopsOostBrabant,
                'shopsAll' => $shopsAll,
            ];

            $this->view('shops/shopdistrict', $data);

            if (isset($_POST['searchfield_shops'])) {
                $data = [
                    'query'                 => $_POST['searchfield_shops'],
                ];
                
                $this->shopModel->saveSearch($data);
        $this->view('shops/shopdistrict', $data);

        }   
        }


    public function step1() {

        if (isset($_GET['shop'])) {
            //get shop
            $shop = $this->shopModel->getShop($_GET['shop']);

            // click next button on shop step 1 -> post order & order items
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = [
                    'customer_number' => $_SESSION['customer_number'],
                    'order_amount_incl_tax' => $_POST['orderTotal'],
                    'orderError' => ''
                ];

                $orderNumber = $this->orderModel->postOrder($data);

                foreach ($_POST['product'] as $key => $value) {
                    $product = $this->orderModel->getProduct($_POST['product_number'][$key]);
                    $price = $_POST['totalProduct'][$key];
                    $amount = $_POST['product'][$key];

                    if(!$this->orderModel->postOrderItem($orderNumber, $product, $price, $amount)) {
                        $data['orderError'] = 'order_error';
                    }
                }
                header('location: ' . URLROOT . '/shops/step2?shop=' . $shop->shop_number);
            }

            // if a shop is found
            if($shop) {

                $products = $this->shopModel->getShopProducts($shop);

                $data = [
                    'shop'                  => $shop,
                    'products'              => $products,
                    'order_amount_incl_tax' => '0.00',
                    'orderError'            => ''
                ];

                $this->view('shops/step1', $data);
            } else {
                $this->view('shops/notfound');
            }
            //if no shop is found
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
}
