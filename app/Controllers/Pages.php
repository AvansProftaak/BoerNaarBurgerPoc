<?php


class Pages extends Controller
{
    private $pageModel;

    public function __construct() {
        $this->pageModel = $this->model('Page');
    }

    public function index() {
        $data = [
            'dbCreated' => '',
        ];

        if (isset($_POST['createDatabase'])) {
            if($this->pageModel->createDatabase()) {
                $data['dbCreated'] = 'De database is succesvol aangemaakt!';
            } else {
                $data['dbCreated'] = 'De database kon niet worden aangemaakt. Controleer of je MySQL services runnen';
            }
        }
        $this->view('pages/index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }

    public function contact()
    {
        $this->view('pages/contact');

        // define variables and set to empty values
        $nameErr = $emailErr = $messageErr = "";
        $name = $email = $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = 'U heeft geen naam ingevuld.';
            } else {
                $name = ($_POST["name"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = 'U heeft geen email adres ingevuld.';
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $emailErr = 'U heeft een ongeldig email adres ingevuld.';
            } else {
                $email = ($_POST["email"]);
            }

            if (empty($_POST["message"])) {
                $nameErr = 'U heeft geen bericht ingevuld.';
            } else {
                $name = ($_POST["message"]);



                // redirect de gebruiker
            header('Location: confirmation.html');
            exit;
            }
            }



public function faq() {
        $this->view('pages/faq');
    }
}
