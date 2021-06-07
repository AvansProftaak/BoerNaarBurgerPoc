<?php

class Admins extends Controller
{

    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function login()
    {
        $data = [
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
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
                    $this->createAdminSession($authorizedAdmin);
                    header('location:' . URLROOT . '/admins/adminpanel');
                } else {
                    $data['passwordError'] = 'pass_incorrect';

                    $this->view('admins/login', $data);
                }
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('admins/login', $data);
    }

    public function createAdminSession ($admins) {
         $_SESSION['admin_number'] = $admins->admin_number;
         $_SESSION['admin_email'] = $admins->email;
     }

     public function logout() {
         unset($_SESSION['admin_number']);
         unset($_SESSION['admin_email']);
         header('location:' . URLROOT . '/admins/login');
     }

    public function AdminPanel()
    {
        if (isLoggedInAdmin()) {

            $allQueries = $this->adminModel->getAllQueries();

            $data = [
                'allQueries' => $allQueries
              ];


            $this->view('admins/adminpanel', $data);
                } else {
           $this->login();
            }
        }

}