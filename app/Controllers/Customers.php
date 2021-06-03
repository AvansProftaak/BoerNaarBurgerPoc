<?php

use App\Traits\TranslationTrait;

class Customers extends Controller
{

    use TranslationTrait;
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
            } else {
                // check if email exists
                if ($this->customerModel->findCustomerByEmail($data['email'])) {
                    $data['emailError'] = 'email_registered';
                }
            }

            // password validation regex (contains atleast 1 number)
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";


            // Validate password
            if(empty($data['password'])) {
                $data['passwordError'] = 'password_error';
            } elseif(strlen($data['password']) < 6) {
                $data['passwordError'] = 'password_chars';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'password_number';
            }

            //Validate confirm passwordf
            if (empty($data['password_confirmation'])) {
                $data['confirmPasswordError'] = 'confirm_error';
            } else {
                if ($data['password'] != $data['password_confirmation']) {
                    $data['confirmPasswordError'] = 'confirm_match';
                }
            }

            //if no errors are found continue
            if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                    empty($data['emailError'])) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->customerModel->register($data)) {
                    header('location: ' . URLROOT . '/customers/login');
                } else {
                    header('location: ' . URLROOT . '/customers/register?failed');
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
                $data['emailError'] = 'email_error';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'password_error';
            }

            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $authorizedCustomer = $this->customerModel->login($data['email'], $data['password']);

                if ($authorizedCustomer) {
                    $this->createCustomerSession($authorizedCustomer);
                    header('location:' . URLROOT . '/customers/orderoverview');
                } else {
                    $data['passwordError'] = 'pass_incorrect';

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
                'profile_image_url'     => $customer->profile_image_url,
                'password_confirmation' => '',
                'firstNameError'        => '',
                'lastNameError'         => '',
                'emailError'            => '',
                'passwordError'         => '',
                'currentPasswordError'  => '',
                'confirmPasswordError'  => '',
                'imageError'            => '',
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
                    'confirmPasswordError'  => '',
                    'imageError'            => '',
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

                //if no errors are found continue
                if (empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['lastNameError'] &&
                        empty($data['emailError'])) && empty($data['passwordError'])) {

                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if ($this->customerModel->update($data, $customer)) {
                        $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
                        header('location: ' . URLROOT . '/customers/accountdetails?success');
                    } else {
                        if((strpos($this->customerModel->update($data, $customer),'uc_email') !== false)) {
                            $data['emailError'] = 'email_registered';
                        } else {
                            header('location: ' . URLROOT . '/customers/accountdetails?failed');
                        }
                    }
                }
            }

            // upload profile picture
            if (isset($_POST['submit-profile-picture'])) {
                $file = $_FILES['profile_image_url'];
                $fileTmp = $_FILES['profile_image_url']['tmp_name'];
                $fileName = $_FILES['profile_image_url']['name'];
                $fileError = $_FILES['profile_image_url']['error'];
                $fileSize = $_FILES['profile_image_url']['size'];

                // get file extension
                $fileExt = explode('.', $fileName);
                $realFileExt = strtolower(end($fileExt));
                $allowedExt = array('jpg', 'jpeg', 'png');

                if (in_array($realFileExt, $allowedExt)) {
                    if ($fileError === 0) {
                        if ($fileSize < 500000) {

                            $generatedFileName = uniqid('', true). '.' . $realFileExt;
                            $filePath = IMGROOT . DIRECTORY_SEPARATOR . 'assets/profile_images/' .  $generatedFileName;
                            $storedFilePath = '/assets/profile_images/' .  $generatedFileName;

                            move_uploaded_file($fileTmp, $filePath);

                            if($this->customerModel->updateCustomerImage($_SESSION['email'], $storedFilePath)) {
                                header('location: ' . URLROOT . '/customers/accountdetails?uploadsuccess');
                            } else {
                                $data['imageError'] = 'image_error';
                            }

                        } else {
                            $data['imageError'] = 'image_error4';
                        }
                    } else {
                        $data['imageError'] = 'image_error2';
                    }
                } else {
                    $data['imageError'] = 'image_error3';
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
                'profile_image_url'     => $customer->profile_image_url,
                'current_password'      => '',
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
                    $data['currentPasswordError'] = 'password_error';
                } else {
                    if($data['current_password'] != password_verify($data['current_password'], $customer->password)) {
                        $data['currentPasswordError'] = 'pass_wrong';
                    }
                }

                if (empty($data['password'])) {
                    $data['passwordError'] = 'password_new';
                }

                //Validate confirm password
                if (empty($data['password_confirmation'])) {
                    $data['confirmPasswordError'] = 'confirm_error';
                } else {
                    if ($data['password'] != $data['password_confirmation']) {
                        $data['confirmPasswordError'] = 'confirm_match';
                    }
                }

                if (empty($data['currentPasswordError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if ($this->customerModel->changePassword($data, $customer)) {
                        header('location: ' . URLROOT . '/customers/accountdetails');
                    } else {
                        header('location: ' . URLROOT . '/customers/changepassword?failed');
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
            $orderMoment = $orders->completed_at;
            

            $data = [
                'orders'        => $orders,
                'customer'      => $customer,
                'orderMoment'   => $orderMoment
            ];
            
            

            $this->view('customers/orderoverview', $data);
        } else {
            $this->login();
        } 
    }
}
