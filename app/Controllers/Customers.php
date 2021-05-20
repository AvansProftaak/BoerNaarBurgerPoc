<?php


class Customers extends Controller
{
    /**
     * @var mixed
     */
    private $customerModel;
    public $orderModel;

    public function __construct() {
        $this->customerModel = $this->model('Customer');
        $this->orderModel = $this->model('Order');
    }

    public function register() {
        $data = [
            'first_name'            => '',
            'last_name'             => '',
            'email'                 => '',
            'password'              => '',
            'password_confirmation' => '',
            'firstNameError'        => '',
            'lastNameError'         => '',
            'emailError'            => '',
            'passwordError'         => '',
            'confirmPasswordError'  => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'first_name'            => trim($_POST['first_name']),
                'last_name'             => trim($_POST['last_name']),
                'email'                 => trim($_POST['email']),
                'password'              => trim($_POST['password']),
                'password_confirmation' => trim($_POST['password_confirmation']),
                'firstNameError'        => '',
                'lastNameError'         => '',
                'emailError'            => '',
                'passwordError'         => '',
                'confirmPasswordError'  => ''
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
                if ($this->customerModel->findCustomerByEmail($data['email'])) {
                    $data['emailError'] = 'E-mail adres is al geregistreerd.';
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

            //Validate confirm passwordf
            if (empty($data['password_confirmation'])) {
                $data['confirmPasswordError'] = 'Bevestig uw wachtwoord.';
            } else {
                if ($data['password'] != $data['password_confirmation']) {
                    $data['confirmPasswordError'] = 'De wachtwoorden komen niet overeen. Probeer het opnieuw.';
                }
            }

            //if no errors are found continue
            if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                    empty($data['emailError'])) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->customerModel->register($data)) {
                    header('location: ' . URLROOT . '/customers/login');
                } else {
                    die('Registreren is mislukt. Probeer het opnieuw.');
                }
            }
        }
        $this->view('customers/register', $data);
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
                $authorizedCustomer = $this->customerModel->login($data['email'], $data['password']);

                if ($authorizedCustomer) {
                    $this->createCustomerSession($authorizedCustomer);
                    header('location:' . URLROOT . '/customers/orderoverview');
                } else {
                    $data['passwordError'] = 'Het opgegeven e-mailadres of wachtwoord is incorrect.';

                    $this->view('customers/login', $data);
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
        $this->view('customers/login', $data);
    }

    public function createCustomerSession ($customer) {
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

    public function accountDetails() {
        if (isLoggedIn()) {
            $customer = $this->customerModel->getAccountDetails($_SESSION['email']);
            $data = [
                'first_name'            => $customer->first_name,
                'last_name'             => $customer->last_name,
                'email'                 => $customer->email,
                'address'               => $customer->address,
                'house_number'          => $customer->house_number,
                'postal_code'           => $customer->postal_code,
                'city'                  => $customer->city,
                'password'              => '',
                'password_confirmation' => '',
                'firstNameError'        => '',
                'lastNameError'         => '',
                'emailError'            => '',
                'passwordError'         => '',
                'currentPasswordError'  => '',
                'confirmPasswordError'  => ''
            ];

            if (isset($_POST['submit-personal-data'])) {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
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
                    'confirmPasswordError'  => ''
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

                // Validate password
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Vul uw wachtwoord in.';
                } else {
                    if($data['password'] != password_verify($data['password'], $customer->password)) {
                        $data['passwordError'] = 'Het opgegeven wachtwoord is incorrect.';
                    }
                }

                //if no errors are found continue
                if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                        empty($data['emailError'])) && empty($data['passwordError'])) {

                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if ($this->customerModel->update($data, $customer)) {
                        $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
                        header('location: ' . URLROOT . '/customers/accountdetails');
                    } else {
                        if((strpos($this->customerModel->update($data, $customer),'uc_email') !== false)) {
                            $data['emailError'] = 'Er bestaat al een account met dit e-mail adres.';
                        } else {
                            die('Gegevens wijzigen is mislukt. Probeer het opnieuw.');
                        }
                    }
                }
            }
            $this->view('customers/accountdetails', $data);
        } else {
            $this->login();
        }
    }

    public function changePassword()
    {
        if (isLoggedIn()) {
            $customer = $this->customerModel->getAccountDetails($_SESSION['email']);
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
                    if($data['current_password'] != password_verify($data['current_password'], $customer->password)) {
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

                    if ($this->customerModel->changePassword($data, $customer)) {
                        header('location: ' . URLROOT . '/customers/accountdetails');
                    } else {
                        die('Wachtwoord wijzigen mislukt. Probeer het opnieuw.');
                    }
                }
            }

        $this->view('customers/changepassword', $data);
        } else {
            $this->login();
        }
    }

    public function orderOverview() {
        if (isLoggedIn()) {
            $customer = $this->customerModel->getAccountDetails($_SESSION['email']);
            $orders = $this->orderModel->getCustomerOrders($customer);

            $data = [
                'orders'        => $orders,
                'customer'      => $customer
            ];

            $this->view('customers/orderoverview', $data);
        } else {
            $this->login();
        }
    }
}
