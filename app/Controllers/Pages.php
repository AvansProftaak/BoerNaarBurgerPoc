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
        if (isset($_POST['send-contact'])) {

            $data = [
                'name'                  => trim($_POST['name']),
                'email'                 => trim($_POST['email']),
                'message'               => trim($_POST['message']),
                'nameErr'               => '',
                'emailErr'              => '',
                'messageErr'            => '',
            ];


            if (empty($data['name'])) {
                $data['nameErr'] = 'U heeft geen naam ingevuld.';
            }

            if (empty($data['email'])) {
                $data['emailErr'] = 'U heeft geen email adres ingevuld.';
            }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                $data['emailErr'] = 'U heeft een ongeldig email adres ingevuld.';
            }

            if (empty($data['message'])) {
                $data['messageErr'] = 'U heeft geen bericht ingevuld.';
            }

            if (empty($data['messageErr']) && empty($data['emailErr']) && empty($data['nameErr'])) {
                // redirect de gebruiker
                header('location: ' . URLROOT . '/pages/index');
            }

        $this->view('pages/contact', $data);
    }



public function faq() {
        $this->view('pages/faq');
    }
}
