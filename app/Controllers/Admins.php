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
    ///creeer de adminSessie
    public function createAdminSession ($admins) {
        unset($_SESSION['kvk_number']);
        unset($_SESSION['email']);
        unset($_SESSION['shopowner_name']);
        unset($_SESSION['customer_number']);
        unset($_SESSION['email']);
        unset($_SESSION['customer_name']);
        $_SESSION['admin_number'] = $admins->admin_number;
        $_SESSION['admin_email'] = $admins->email;
     }

     //logout adminSessie
     public function logout() {
         unset($_SESSION['admin_number']);
         unset($_SESSION['admin_email']);
         header('location:' . URLROOT . '/admins/login');
     }

    //toon de pagina AdminPanel
    public function AdminPanel()
    {
        if (isLoggedInAdmin()) {
            ///als er op de knop verwijder zoekresultaten geklikt wordt
            if (isset($_POST['delete_queries'])){

                $this->adminModel->truncateTable();
            }

            //haal alle data op uit de DB search_query tabel
            $allQueries = $this->adminModel->getAllQueries();

            $data = [
                'allQueries' => $allQueries
              ];

            $this->view('admins/adminpanel', $data);
                } else {
           $this->login();
            }

        $this->view('admins/adminpanel', $data);
    }
}
