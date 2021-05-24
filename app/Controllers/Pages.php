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

            //set variable data
            $data = [
                'name'                  => htmlspecialchars($_POST['name']),
                'emailFrom'             => htmlspecialchars($_POST['emailFrom']),
                'onderwerp'             => htmlspecialchars($_POST['onderwerp']),
                'message'               => htmlspecialchars($_POST['message']),
                'nameErr'               => '',
                'emailErr'              => '',
                'onderwerpErr'          => '',
                'messageErr'            => '',
            ];


            if (empty($data['name'])) {
                $data['nameErr'] = 'U heeft geen naam ingevuld.';
            }

            if (empty($data['emailFrom'])) {
                $data['emailErr'] = 'U heeft geen email adres ingevuld.';
            } else if (!filter_var($data['emailFrom'], FILTER_VALIDATE_EMAIL))
                $data['emailErr'] = 'U heeft een ongeldig email adres ingevuld.';
            }

            if (empty($data['onderwerp'])) {
                $data['onderwerpErr'] = 'U heeft geen onderwerp ingevuld.';
            }

           if (empty($data['message'])) {
             $data['messageErr'] = 'U heeft geen bericht ingevuld.';
           }

            if (empty($data['messageErr']) && empty($data['emailErr']) && empty($data['onderwerpErr']) && empty($data['nameErr'])) {
               // echo "<script> alert('Bedankt voor uw bericht, we nemen zo spoedig mogelijk contact met u op.')</script>";

                $mailTo = "info@boernaarburger.ml";
                $headers = "From: ".$data['emailFrom'];
                $txt = "U heeft een email ontvangen van ".$data['name'].".\n\n".$data['message'];

                mail($mailTo, $data['onderwerp'], $txt, $headers);

                // redirect de gebruiker
               header('location: ' . URLROOT . '/pages/index?mailsend');

            }

        $this->view('pages/contact', $data);
    }



public function faq() {
        $this->view('pages/faq');
    }
    
}
