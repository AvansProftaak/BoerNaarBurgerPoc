<?php

class Shopowners extends Controller
{
    /**
     * @var mixed
     */
    private $shopOwnerModel;
    public $shopModel;

    public function __construct() {
        $this->shopOwnerModel = $this->model('Shopowner');
        $this->shopModel = $this->model('Shop');
        // print_r($this->shopownerModel);
        // print_r($this->shopModel);
        // $shops = $this->shopModel->getShops();
    }

    

    public function create() {
        $data = [
            'kvk_number'            => '',
            'shop_name'             => '',
            'description'           => '',
            'address'               => '',
            'house_number'          => '',
            'postal_code'           => '',
            'city'                  => '',
            'country'               => '',
            'open_from'             => '',
            'closed_at'             => '',
            'banner_url'            => '',


            'kvk_numberError'       => '',
            'shop_nameError'        => '',
            'descriptionError'      => '',
            'addressError'          => '',
            'house_numberError'     => '',
            'postal_codeError'      => '',
            'cityError'             => '',
            'countryError'          => '',
            'open_fromError'        => '',
            'banner_urlError'       => '',
            'closed_atError'        => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'kvk_number'            => trim($_POST['kvk_number']),
                'shop_name'             => trim($_POST['shop_name']),
                'description'           => trim($_POST['description']),
                'address'               => trim($_POST['address']),
                'house_number'          => trim($_POST['house_number']),
                'postal_code'           => trim($_POST['postal_code']),
                'city'                  => trim($_POST['city']),
                'country'               => trim($_POST['country']),
                'open_from'             => trim($_POST['open_from']),
                'closed_at'             => trim($_POST['closed_at']),
                'banner_url'            => trim($_POST['banner_url']),

                'kvk_numberError'       => '',
                'shop_nameError'        => '',
                'descriptionError'      => '',
                'addressError'          => '',
                'house_numberError'     => '',
                'postal_codeError'      => '',
                'cityError'             => '',
                'countryError'          => '',
                'open_fromError'        => '',
                'banner_urlError'       => '',
                'closed_atError'        => ''
            ];

            //
            foreach ($data as $item) {
                if ( str_contains("Error", $item)) {
                    break;
                }
                if (empty($data[$item])) {
                    $itemError = $item . 'Error';
                    $item = str_replace($item, "", "_");
                    $errorMessage = "Vul het $item veld in in.";
                    $data[$itemError] = "Vul het $item veld in in.";
            }

            $errorMessages = [
                'kvk_numberError',
                'shop_nameError',
                'descriptionError',
                'addressError',
                'house_numberError',
                'postal_codeError',
                'cityError',
                'countryError',
                'open_fromError',
                'banner_urlError',
                'closed_atError'] ;

            foreach ($errorMessages as $errorMEssage) {
                if ($data[$errorMessage]){
                    die('Registreren is mislukt. Probeer het opnieuw.');
                }
            }
            // //if no errors are found continue
            // if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
            //         empty($data['emailError'])) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

            //     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //     if ($this->shopownerModel->register($data)) {
            //         header('location: ' . URLROOT . '/customers/login');
            //     } else {
            //         die('Registreren is mislukt. Probeer het opnieuw.');
            //     }
            }
        }
        $this->view('shopowners/create', $data);
    }

    public function register() {
        $data = [
            'first_name'            => '',
            'last_name'             => '',
            'email'                 => '',
            'password'              => '',
            'password_confirmation' => '',
            'address'               => '',
            'house_number'          => '',
            'postal_code'           => '',
            'city'                  => '',
            'company_name'          => '',
            'kvk_number'            => '',
            'firstNameError'        => '',
            'lastNameError'         => '',
            'emailError'            => '',
            'passwordError'         => '',
            'confirmPasswordError'  => '',
            'companyNameError'      => '',
            'kvkNumberError'        => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'first_name'            => trim($_POST['first_name']),
                'last_name'             => trim($_POST['last_name']),
                'email'                 => trim($_POST['email']),
                'password'              => trim($_POST['password']),
                'password_confirmation' => trim($_POST['password_confirmation']),
                'address'               => trim($_POST['address']),
                'house_number'          => trim($_POST['house_number']),
                'postal_code'           => trim($_POST['postal_code']),
                'city'                  => trim($_POST['city']),
                'company_name'          => trim($_POST['company_name']),
                'kvk_number'            => trim($_POST['kvk_number']),
                'firstNameError'        => '',
                'lastNameError'         => '',
                'emailError'            => '',
                'passwordError'         => '',
                'confirmPasswordError'  => '',
                'companyNameError'      => '',
                'kvkNumberError'        => ''
            ];

            //validate first_name
            if (empty($data['first_name'])) {
                $data['firstNameError'] = 'Vul uw voornaam in.';
            }

            //validate last_name
            if (empty($data['last_name'])) {
                $data['lastNameError'] = 'Vul uw achternaam in.';
            }

            //validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Vul uw e-mail adres in.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Ongeldig e-mail adres. Vul een correct e-mail adres in.';
            } else {
                // check if email exists
                if ($this->shopOwnerModel->findShopOwnerByEmail($data['email'])) {
                    $data['emailError'] = 'E-mail adres is al geregistreerd.';
                }
            }

            //validate company_name
            if (empty($data['company_name'])) {
                $data['companyNameError'] = 'Vul uw bedrijfsnaam in.';
            }

            //validate kvk number
            if (empty($data['kvk_number'])) {
                $data['kvkNumberError'] = 'Vul uw KVK-nummer in.';
            } elseif ((strlen($data['kvk_number']) != 8) || !preg_match("/^[0-9]*$/", $data['kvk_number'])) {
                $data['kvkNumberError'] = 'KVK-nummer moet 8 cijfers bevatten.';
            } else {
                // check if kvk number exists
                if ($this->shopOwnerModel->findShopOwnerByKvkNumber($data['kvk_number'])) {
                    $data['kvkNumberError'] = 'Bedrijf is al geregistreerd.';
                }
            }

            // password validation regex (contains atleast 1 number)
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";


            // Validate password
            if(empty($data['password'])) {
                $data['passwordError'] = 'Vul een wachtwoord in.';
            } elseif(strlen($data['password']) < 6) {
                $data['passwordError'] = 'Wachtwoord moet tenminste 8 karakters bevatten.';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Wachtwoord moet tenminste 1 cijfer bevatten.';
            }

            //Validate confirm password
            if (empty($data['password_confirmation'])) {
                $data['confirmPasswordError'] = 'Bevestig uw wachtwoord.';
            } else {
                if ($data['password'] != $data['password_confirmation']) {
                    $data['confirmPasswordError'] = 'De wachtwoorden komen niet overeen. Probeer het opnieuw.';
                }
            }

            //if no errors are found continue
            if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                empty($data['emailError'])) && empty($data['passwordError']) && empty($data['confirmPasswordError']) &&
                empty($data['companyNameError']) && empty($data['kvkNumberError'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->shopOwnerModel->register($data)) {
                    header('location: ' . URLROOT . '/shopowners/login');
                } else {
                    die('Registreren is mislukt. Probeer het opnieuw.');
                }
            }
        }
        $this->view('shopowners/register', $data);
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
                $data['emailError'] = 'Vul uw e-mail adres in.';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Vul uw wachtwoord in.';
            }

            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $authorizedShopOwner = $this->shopOwnerModel->login($data['email'], $data['password']);

                if ($authorizedShopOwner) {
                    $this->createShopOwnerSession($authorizedShopOwner);
                    header('location:' . URLROOT . '/shopowners/create');
                } else {
                    $data['passwordError'] = 'Het opgegeven e-mailadres of wachtwoord is incorrect.';

                    $this->view('shopowners/login', $data);
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
        $this->view('shopowners/login', $data);
    }

    public function createShopOwnerSession ($shopOwner) {
        $_SESSION['kvk_number'] = $shopOwner->kvk_number;
        $_SESSION['email'] = $shopOwner->email;
        $_SESSION['shopowner_name'] = $shopOwner->first_name . ' ' . $shopOwner->last_name;
    }

    public function logout() {
        unset($_SESSION['kvk_number']);
        unset($_SESSION['email']);
        unset($_SESSION['shopowner_name']);
        header('location:' . URLROOT . '/shopowners/login');
    }
}
