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
        //check for get parameter shop and retrieve shop from db and load it
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

                // save order and set ordernumber in session
                $orderNumber = $this->orderModel->postOrder($data);
                $_SESSION['order_number'] = $orderNumber;

                // for each selected product create an order item
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

    public function step2()
    {
        $customer = '';

        // check if customer is logged in and retrieve customer details for form
        if (isLoggedIn()) {
            $customer = $this->customerModel->getAccountDetails($_SESSION['email']) ? $this->customerModel->getAccountDetails($_SESSION['email']) : null;

            //check for correct shop in get parameter
            if (isset($_GET['shop'])) {
                $shop = $this->shopModel->getShop($_GET['shop']);

                if ($shop) {
                    // if an order is in session, continue, else redirect to step 1.
                    if (isset($_SESSION['order_number'])) {
                        $consentsError = '';

                        //retrieve order information and details
                        $order = $this->orderModel->getOrder($_SESSION['order_number']);
                        $orderDetails = $this->orderModel->getOrderDetails($order);

                        // starting the payment
                        if (isset($_POST['pay'])) {
                            if (!isset($_POST['has_accepted_terms'])) {
                                $consentsError = 'accept_consents';
                            } else {
                                $payment = $_POST;
                                if ($this->startPayment($payment, $order)) {
                                    header('location: ' . URLROOT . '/shops/step3?shop=' . $shop->shop_number);
                                } else {
                                    header('location: ' . URLROOT . '/shops/step2?shop=' . $shop->shop_number . '&paymentfailed');
                                }
                            }
                        }

                        $data = [
                            'shop'                  => $shop,
                            'order'                 => $order,
                            'orderDetails'          => $orderDetails,
                            'customer'              => $customer,
                            'consentsError'         => $consentsError,
                            'firstNameError'        => '',
                            'lastNameError'         => '',
                            'emailError'            => '',
                            'passwordError'         => '',
                        ];

                        // edit account details
                        if (isset($_POST['edit-details'])) {
                            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                            $data = [
                                'shop'                  => $shop,
                                'order'                 => $order,
                                'orderDetails'          => $orderDetails,
                                'customer'              => $customer,
                                'consentsError'         => $consentsError,
                                'first_name'            => trim($_POST['first_name']),
                                'last_name'             => trim($_POST['last_name']),
                                'email'                 => trim($_POST['email']),
                                'password'              => trim($_POST['password']),
                                'address'               => trim($_POST['address']),
                                'house_number'          => trim($_POST['house_number']),
                                'postal_code'           => trim($_POST['postal_code']),
                                'city'                  => trim($_POST['city']),
                                'firstNameError'        => '',
                                'lastNameError'         => '',
                                'emailError'            => '',
                                'passwordError'         => '',
                            ];

                            //validate first_name
                            if (empty($data['first_name'])) {
                                $data['firstNameError'] = 'firstname_error';
                            }

                            //validate last_name
                            if (empty($data['last_name'])) {
                                $data['lastNameError'] = 'lastname_error';
                            }

                            //validate email
                            if (empty($data['email'])) {
                                $data['emailError'] = 'email_error';
                            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                                $data['emailError'] = 'email_invalid';
                            }

                            // Validate password
                            if(empty($data['password'])) {
                                $data['passwordError'] = 'password_error';
                            } else {
                                if($data['password'] != password_verify($data['password'], $customer->password)) {
                                    $data['passwordError'] = 'pass_incorrect';
                                }
                            }

                            if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                                    empty($data['emailError'])) && empty($data['passwordError'])) {

                                if ($this->customerModel->update($data, $customer)) {
                                    $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
                                    header('location: ' . URLROOT . '/shops/step2?shop=' . $shop->shop_number . '&success');
                                } else {
                                    if((strpos($this->customerModel->update($data, $customer),'uc_email') !== false)) {
                                        $data['emailError'] = 'email_registered';
                                    } else {
                                        header('location: ' . URLROOT . '/shops/step2?shop=' . $shop->shop_number . '&failed');
                                    }
                                }
                            }
                        }

                        // pass order details to the view
                        $this->view('shops/step2', $data);
                    } else {
                        // no order session exists, so user cannot be in step 2.
                        $this->step1();
                    }
                } else {
                    //shop doesn't exist
                    $this->view('shops/notfound');
                }
            } else {
                // no shop in get parameter, so not found
                $this->view('shops/notfound');
            }
        } else {
            // if user is not logged in redirect to shop homepage with login error message
            $this->step1();
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

    public function startPayment($payment, $order) {
        // set paymentmethod to proper enum value
        $paymentMethod = $payment['payment_method'];

        switch ($paymentMethod) {
            case 'iDEAL':
                $paymentMethod = 'IDEAL';
                break;
            case 'Mastercard':
                $paymentMethod = 'MASTERCARD';
                break;
            case 'Visa Card':
                $paymentMethod = 'VISA';
                break;
            case 'PayPal':
                $paymentMethod = 'PAYPAL';
                break;
        }

        $data = [
            'order_number'      => $order->order_number,
            'payment_method'    => $paymentMethod,
            'total_amount'      => $order->orderamount_incl_tax,
            'status'            => 'PENDING'
        ];

        if (!$this->orderModel->postPayment($data)) {
            return false;
        }

        return true;
    }
}
