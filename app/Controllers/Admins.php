<?php

class Admins extends Controller
{

    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }

    public function login() {
        $data = [
            'email'         => '',
            'password'      => '',
            'emailError'    => '',
            'passwordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email'         => trim($_POST['email']),
                'password'      => trim($_POST['password']),
                'emailError'    => '',
                'passwordError' => ''
            ];

            if (empty($data['email'])) {
                $data['emailError'] = 'email_error';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'password_error';
            }

            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $authorizedAdmin = $this->adminModel->login($data['email'], $data['password']);

                if ($authorizedAdmin) {
                   // $this->createAdminSession($authorizedAdmin);
                    header('location:' . URLROOT . '/admin/login');
                } else {
                    $data['passwordError'] = 'pass_incorrect';

                    $this->view('admin/login', $data);
                }
            }
        } else {
            $data = [
                'email'         => '',
                'password'      => '',
                'emailError'    => '',
                'passwordError' => ''
            ];
        }
        $this->view('admin/login', $data);
    }

   /* public function createAdminSession ($customer) {
        $_SESSION['customer_number'] = $customer->customer_number;
        $_SESSION['email'] = $customer->email;
        $_SESSION['customer_name'] = $customer->first_name . ' ' . $customer->last_name;
    }

    public function logout() {
        unset($_SESSION['customer_number']);
        unset($_SESSION['email']);
        unset($_SESSION['customer_name']);
        header('location:' . URLROOT . '/customers/login');
    }

    public function Overview() {
        if (isLoggedIn()) {
            $customer = $this->customerModel->getAccountDetails($_SESSION['email']);
            $orders = $this->orderModel->getCustomerOrders($customer);
            $orderMoment = $orders->completed_at;
            

            $data = [
                'orders'        => $orders,
                'customer'      => $customer,
                'orderMoment'   => $orderMoment
            ];
            
            

            $this->view('admin/overview', $data);
        } else {
            $this->login();
        }
    }*/
}
