<?php

use App\Traits\TranslationTrait;

class Shopowners extends Controller
{
    use TranslationTrait;
    /**
     * @var mixed
     */
    private $shopOwnerModel;
    public $shopModel;

    public function __construct() {
        $this->shopOwnerModel = $this->model('Shopowner');
        $this->shopModel = $this->model('Shop');
    }

    

    public function create() {

        if (isLoggedIn()){
            header('location: ' . URLROOT . '/pages/index');

        }

        $data = [
            'kvk_number'            => '',
            'shop_name_nl'          => '',
            'shop_name_en'          => '',
            'description_nl'        => '',
            'description_en'        => '',
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

            if (isLoggedInShopOwner()){
                $KVKNumber = $_SESSION['kvk_number'];
            } else {
                # debugging purpose only
                $KVKNumber = '06989770';
            }

            $data = [
                'kvk_number'            => $KVKNumber,
                'shop_name'             =>
                    [
                        'NL' => trim($_POST['shop_name_nl']),
                        'EN' => trim($_POST['shop_name_en'])
                    ],
                'description'           =>
                    [
                        'NL' => trim($_POST['description_nl']),
                        'EN' => trim($_POST['description_en'])
                    ],
                'address'               => trim($_POST['address']),
                'house_number'          => trim($_POST['house_number']),
                'postal_code'           => trim($_POST['postal_code']),
                'city'                  => trim($_POST['city']),
                'country'               => 'Nederland',
                'open_from'             => trim($_POST['open_from']),
                'closed_at'             => trim($_POST['closed_at']),
                'banner_url'            => "/assets/shopbanners/" . trim($_FILES['banner_url']['name']),

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

            // print_r( $data);

            $i = 0 ;
            foreach ($data as $key => $item) {
                if (empty($item)) {
                    if (strpos($key, "Error") !== false) {
                        continue;
                    }
                    # if items contains the word error pass
                    # else show error message
                    $key_stripped = str_replace("_", " ", $key);
                    $key_stripped;
                    $errorMessage = "Vul het $key_stripped veld in in.";

                    $errorName = $key . "Error";

                    $data = [$errorName => $errorMessage];
                    print_r($data);
               }
               print $i;
               $i++ ;
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
            

            //if no errors are found continue
            foreach ($errorMessages as $errorMessage) {
                if (!empty($data[$errorMessage])){
                    // go back to the create page with data to show alllll the errors
                    $this->view('shopowners/create', $data);
                    exit;
                }
                    
            }

        if ($this->shopOwnerModel->createShop($data)) {
            $size = getimagesize($_FILES['banner_url']['tmp_name']); //get size
            $imageFile = "data:" . $size["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['banner_url']['tmp_name'])); //get image
            $imageFileContents = file_get_contents($imageFile);
            $this->shopOwnerModel->saveFile(trim($_FILES['banner_url']['name']), $imageFile);
            header('location: ' . URLROOT . '/Shopowners/accountdetails');
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
                    
                    $hasShop = $this->shopOwnerModel->getMyShop();
                    if ($hasShop) {
                        header('location:' . URLROOT . '/shopowners/accountDetails');
                    } else {
                    header('location:' . URLROOT . '/shopowners/create');
                    }
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
        if (isset($_SESSION['customer_number']) || isset($_SESSION['email']) || isset($_SESSION['customer_name'])) {
            unset($_SESSION['customer_number']);
            unset($_SESSION['email']);
            unset($_SESSION['customer_name']);
        } elseif (isset($_SESSION['admin_number']) || isset($_SESSION['admin_email'])) {
            unset($_SESSION['admin_number']);
            unset($_SESSION['admin_email']);
        }

        $_SESSION['kvk_number'] = $shopOwner->kvk_number;
        $_SESSION['company_name'] = $shopOwner->company_name;
        $_SESSION['email'] = $shopOwner->email;
        $_SESSION['shopowner_name'] = $shopOwner->first_name . ' ' . $shopOwner->last_name;
    }

    public function logout() {
        unset($_SESSION['kvk_number']);
        unset($_SESSION['email']);
        unset($_SESSION['shopowner_name']);
        header('location:' . URLROOT . '/shopowners/login');
    }

    public function productoverview() {
        if (isLoggedIn()){
            header('location: ' . URLROOT . '/pages/index');
        }

            $shop = $this->shopModel->getMyShop($_SESSION['kvk_number']);

            if($shop) {

                $products = $this->shopModel->getShopProducts($shop);

                
                $data = [
                    'shop'      => $shop,
                    'products'  => $products
                ];

                $this->view('shopowners/productoverview', $data);
            }
        

        
    }

    public function myShop() {
        if (isLoggedIn()){
            header('location: ' . URLROOT . '/pages/index');
        }
        $data = $this->shopOwnerModel->getMyShop();
        $this->view('shopowners/myShop', $data);
    }

    public function accountDetails() {

        if (isLoggedInShopOwner()) {
            $shopowner = $this->shopOwnerModel->getAccountDetails();
            $shop = $this->shopModel->getMyShop($_SESSION['kvk_number']);
            
            $data = [
                'kvk_number'            => $_SESSION['kvk_number'],
                'shop_name'             =>
                    [
                        'NL' => $this->getTranslation($shop->shop_name, 'nl'),
                        'EN' => $this->getTranslation($shop->shop_name, 'en')
                    ],
                    'description'           =>
                    [
                        'NL' => $this->getTranslation($shop->description, 'nl'),
                        'EN' => $this->getTranslation($shop->description, 'en')
                    ],
                'shop_name_nl'          => $this->getTranslation($shop->shop_name, 'nl'),
                'shop_name_en'          => $this->getTranslation($shop->shop_name, 'en'),
                'description_nl'        => $this->getTranslation($shop->description, 'nl'),
                'description_en'        => $this->getTranslation($shop->description, 'en'),
                'company_name'          => $shopowner->company_name,
                'password'              => $shopowner->password,
                'iban'                  => $shopowner->iban,
                'first_name'            => $shopowner->first_name,
                'last_name'             => $shopowner->last_name,
                'email'                 => $shopowner->email,
                'phone_number'          => $shopowner->phone_number,
                'address'               => $shopowner->address,
                'house_number'          => $shopowner->house_number,
                'postal_code'           => $shopowner->postal_code,
                'city'                  => $shopowner->city,
                'shop_address'          => $shop->address,
                'shop_house_number'     => $shop->house_number,
                'shop_postal_code'      => $shop->postal_code,
                'shop_city'             => $shop->city,
                'banner_url'            => $shop->banner_url,
                'company_nameError'     => '',
                'password'              => '',
                'firstNameError'        => '',
                'lastNameError'         => '',
                'emailError'            => '',
                'phone_numberError'     => '',
                'passwordError'         => '',
                'shop_nameError'        => ''

            ];

            

            if (isset($_POST['submit-personal-data'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $shopowner = $this->shopOwnerModel->getAccountDetails();

                $data = [
                    'kvk_number'            => $_SESSION['kvk_number'],
                    'company_name'          => trim($_POST['company_name']),
                    'iban'                  => trim($_POST['iban']),
                    'password'              => "$shopowner->password",
                    'first_name'            => trim($_POST['first_name']),
                    'city'                  => trim($_POST['city']),
                    'country'               => 'NL',
                    'last_name'             => trim($_POST['last_name']),
                    'email'                 => trim($_POST['email']),
                    'phone_number'          => trim($_POST['phone_number']),
                    'address'               => trim($_POST['address']),
                    'house_number'          => trim($_POST['house_number']),
                    'postal_code'           => trim($_POST['postal_code']),
                    'shop_address'          => $shop->address,
                    'shop_house_number'     => $shop->house_number,
                    'shop_postal_code'      => $shop->postal_code,
                    'shop_city'             => $shop->city,
                    'shop_country'          => 'NL',
                    'ibanError'             => '',
                    'company_nameError'     => '',
                    'firstNameError'        => '',
                    'lastNameError'         => '',
                    'emailError'            => '',
                    'phone_numberError'     => '',
                    'passwordError'         => ''
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
                }

                //if no errors are found continue
                if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                        empty($data['emailError'])) && empty($data['passwordError'])) {

                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);                    

                    if ($this->shopOwnerModel->update($data, $shopowner)) {
                        $_SESSION['shopOwner_name'] = $data['first_name'] . ' ' . $data['last_name'];
                        header('location: ' . URLROOT . '/shopowners/accountDetails');
                    } else {
                        if((strpos($this->shopOwnerModel->update($data, $shopowner),'uc_email') !== false)) {
                            $data['emailError'] = 'Er bestaat al een account met dit e-mail adres.';
                        } else {
                            die('Gegevens wijzigen is mislukt. Probeer het opnieuw.');
                        }
                    }
                }
            }

            if (isset($_POST['submit-company-data'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $shop = $this->shopModel->getMyShop($_SESSION['kvk_number']);
                $shopowner = $this->shopOwnerModel->getAccountDetails();
                $shopnames = [      'NL' => trim($_POST['shop_name_nl']),
                                    'EN' => trim($_POST['shop_name_en'])];

                $descriptions = [   'NL' =>trim($_POST['description_nl']),
                                    'EN' =>trim($_POST['description_en'])];

                

                $data = [
                    'kvk_number'            => $_SESSION['kvk_number'],
                    'shop_name'             =>
                    [
                        'NL' => $this->createOrUpdateTranslation($shopnames, $shop->shop_name)
                    ],
                    'description'           =>
                    [
                        'NL' => $this->createOrUpdateTranslation($descriptions,$shop->description)
                    ],
                    'shop_country'               => 'NL',
                    'shop_address'               => trim($_POST['shop_address']),
                    'shop_house_number'          => trim($_POST['shop_house_number']),
                    'shop_postal_code'           => trim($_POST['shop_postal_code']),
                    'shop_city'                  => trim($_POST['shop_city']),
                    'banner_url'                 => "/assets/shopbanners/" . trim($_FILES['banner_url']['name']),
                    
                    'password'              => "$shopowner->password",
                    'shop_nameError'        => ''
                ];



                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);         

                if(isset($_FILES['banner_url'])){
                    $size = getimagesize($_FILES['banner_url']['tmp_name']); //get size
                    $imageFile = "data:" . $size["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['banner_url']['tmp_name'])); //get image
                    $imageFileContents = file_get_contents($imageFile);
                    $this->shopOwnerModel->saveFile(trim($_FILES['banner_url']['name']), $imageFile);

                }

                if ($this->shopModel->updateShop($data, $shop)) {
                    $_SESSION['shopOwner_name'] = $data['first_name'] . ' ' . $data['last_name'];
                    header('location: ' . URLROOT . '/shopowners/accountDetails');
                } else {
                    die('Gegevens wijzigen is mislukt. Probeer het opnieuw.');
                }
            }
            $this->view('shopowners/accountDetails', $data);
        }
    }

    public function changePassword()
    {
        if (isLoggedIn()){
            header('location: ' . URLROOT . '/pages/index');
        }
        
        if (isLoggedInShopOwner()) {
            $shopowner = $this->shopOwnerModel->getAccountDetails($_SESSION['kvk_number']);
            $data = [
            'current_password'          => '',
                'password'              => '',
                'password_confirmation' => '',
                'currentPasswordError'  => '',
                'passwordError'         => '',
                'confirmPasswordError'  => ''
            ];

            if (isset($_POST['submit-change-password'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'current_password'      => trim($_POST['current_password']),
                    'password'              => trim($_POST['password']),
                    'password_confirmation' => trim($_POST['password_confirmation']),
                    'currentPasswordError'  => '',
                    'passwordError'         => '',
                    'confirmPasswordError'  => ''
                ];

                // Validate password
                if(empty($data['current_password'])) {
                    $data['currentPasswordError'] = 'Vul uw wachtwoord in.';
                } else {
                    if($data['current_password'] != password_verify($data['current_password'], $shopowner->password)) {
                        $data['currentPasswordError'] = 'Het opgegeven wachtwoord is incorrect.';
                    }
                }

                if (empty($data['password'])) {
                    $data['passwordError'] = 'Vul een nieuw wachtwoord in.';
                }

                //Validate confirm password
                if (empty($data['password_confirmation'])) {
                    $data['confirmPasswordError'] = 'Bevestig uw wachtwoord.';
                } else {
                    if ($data['password'] != $data['password_confirmation']) {
                        $data['confirmPasswordError'] = 'De wachtwoorden komen niet overeen. Probeer het opnieuw.';
                    }
                }

                if (empty($data['currentPasswordError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if ($this->shopOwnerModel->changePassword($data, $shopowner)) {
                        header('location: ' . URLROOT . '/shopowners/accountdetails');
                    } else {
                        die('Wachtwoord wijzigen mislukt. Probeer het opnieuw.');
                    }
                }
            }

        $this->view('shopowners/changepassword', $data);
        } else {
            $this->login();
        }
    }

    public function addProduct() {

        if (isLoggedIn()){
            header('location: ' . URLROOT . '/pages/index');

        }

        $data = [
            'product_name_nl'        => '',
            'product_name_en'       => '',
            'product_description_nl'        => '',
            'product_description_en'        => '',
            'product_price'         => '',
            'product_stock'         => '',

            'product_name_nlError'   => '',
            'product_name_enError'  => '',
            'product_description_nlError'   => '',
            'product_description_enError'   => '',
            'product_priceError'    => '',
            'product_stockError'    => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isLoggedInShopOwner()){
                $KVKNumber = $_SESSION['kvk_number'];
            } else {
                # debugging purpose only
                $KVKNumber = '06989770';
            }

            $shop = ($this->shopOwnerModel->getMyShop())[0];
            $shopNumber = $shop->shop_number;

            $data = [
                'kvk_number'            => $KVKNumber,
                'product_name'             =>
                    [
                        'NL' => trim($_POST['product_name_nl']),
                        'EN' => trim($_POST['product_name_en'])
                    ],
                'product_description'           =>
                    [
                        'NL' => trim($_POST['product_description_nl']),
                        'EN' => trim($_POST['product_description_en'])
                    ],
                'product_price'               => trim($_POST['product_price']),
                'product_stock'          => trim($_POST['product_stock']),
                'shop_number' =>    "$shopNumber",
                
                'product_nameError'     => '',
                'product_name_nlError'  => '',
                'product_name_enError'  => '',
                'product_descriptionError'   => '',
                'product_description_nlError'   => '',
                'product_description_enError'   => '',
                'product_priceError'    => '',
                'product_stockError'    => ''
            ];


            $i = 0 ;
            foreach ($data as $key => $item) {
                if (empty($item)) {
                    if (strpos($key, "Error") !== false) {
                        continue;
                    }
                    # if items contains the word error pass
                    # else show error message
                    $key_stripped = str_replace("_", " ", $key);
                    $key_stripped;
                    $errorMessage = "Vul het $key_stripped veld in in.";

                    $errorName = $key . "Error";

                    $data = [$errorName => $errorMessage];
                    print_r($data);
               }
               
               $i++ ;
            } 
            $errorMessages = [
                'product_nameError'     => '',
                'product_name_nlError'  => '',
                'product_name_enError'  => '',
                'product_descriptionError'   => '',
                'product_description_nlError'   => '',
                'product_description_enError'   => '',
                'product_priceError'    => '',
                'product_stockError'    => '',
                'product_imageError'    => ''] ;
            

            //if no errors are found continue
            foreach ($errorMessages as $errorMessage) {
                if (!empty($data[$errorMessage])){
                    // go back to the create page with data to show alllll the errors
                    $this->view('shopowners/addProduct', $data);
                    exit;
                }
                    
            }

        if ($this->shopOwnerModel->addProduct($data)) {
            header('location: ' . URLROOT . '/Shopowners/addProduct');
        }
    }
        $this->view('shopowners/addProduct', $data);
    }


public function editProduct() {
    if (isLoggedIn()){
        header('location: ' . URLROOT . '/pages/index');

    }
    if (isset($_GET['delete'])) {
        if($this->shopOwnerModel->deleteProduct($_GET['delete'])) {
            header('location: ' . URLROOT . '/Shopowners/productoverview');
        }
    
    }
    if (isset($_GET['product'])) {
        $data = [
            'product_name_nl'        => '',
            'product_name_en'       => '',
            'product_description_nl'        => '',
            'product_description_en'        => '',
            'product_price'         => '',
            'product_stock'         => '',
            'product_number'         => $_GET['product'],

            'product_name_nlError'   => '',
            'product_name_enError'  => '',
            'product_description_nlError'   => '',
            'product_description_enError'   => '',
            'product_priceError'    => '',
            'product_stockError'    => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isLoggedInShopOwner()){
                $KVKNumber = $_SESSION['kvk_number'];
            } else {
                # debugging purpose only
                $KVKNumber = '06989770';
            }
            
            $shop = ($this->shopOwnerModel->getMyShop())[0];
            $data = [
                'product_name'             =>
                    [
                        'NL' => trim($_POST['product_name_nl']),
                        'EN' => trim($_POST['product_name_en'])
                    ],
                'product_description'           =>
                    [
                        'NL' => trim($_POST['product_description_nl']),
                        'EN' => trim($_POST['product_description_en'])
                    ],
                'product_price'               => trim($_POST['product_price']),
                'product_stock'          => trim($_POST['product_stock']),
                'product_number'        =>  $_GET['product'],
                
                'product_nameError'     => '',
                'product_name_nlError'  => '',
                'product_name_enError'  => '',
                'product_descriptionError'   => '',
                'product_description_nlError'   => '',
                'product_description_enError'   => '',
                'product_priceError'    => '',
                'product_stockError'    => ''
            ];



            $i = 0 ;
            foreach ($data as $key => $item) {
                if (empty($item)) {
                    if (strpos($key, "Error") !== false) {
                        continue;
                    }
                    # if items contains the word error pass
                    # else show error message
                    $key_stripped = str_replace("_", " ", $key);
                    $key_stripped;
                    $errorMessage = "Vul het $key_stripped veld in in.";

                    $errorName = $key . "Error";

                    $data = [$errorName => $errorMessage];
                    print_r($data);
            }
            
            $i++ ;
            } 
            $errorMessages = [
                'product_nameError'     => '',
                'product_name_nlError'  => '',
                'product_name_enError'  => '',
                'product_descriptionError'   => '',
                'product_description_nlError'   => '',
                'product_description_enError'   => '',
                'product_priceError'    => '',
                'product_stockError'    => '',
                'product_imageError'    => ''] ;
            

            //if no errors are found continue
            foreach ($errorMessages as $errorMessage) {
                if (!empty($data[$errorMessage])){
                    // go back to the create page with data to show alllll the errors
                    $this->view('shopowners/addProduct', $data);
                    exit;
                }
                    
            }

        if ($this->shopOwnerModel->updateItem($data)) {
            header('location: ' . URLROOT . '/Shopowners/editproduct');
        }
    }
        $this->view('shopowners/editproduct', $data);
    }
    $this->view('shopowners/editproduct');
}
    public function orderOverview(){
        if (isLoggedInShopOwner()) {
            $orders = $this->shopOwnerModel->shopownerOrders($_SESSION['kvk_number']);

            $data = [
                'orders' => $orders

            ];

            echo "<pre>";
            var_dump($data['orders']);
            echo "</pre>";
            die();

        $this->view('shopowners/orderoverview', $data);
        
        } else {
            $this->login();
        }
    }

}
