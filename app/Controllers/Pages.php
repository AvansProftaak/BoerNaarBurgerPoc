<?php


class Pages extends Controller
{
    private $pageModel;

    public function __construct() {
        $this->pageModel = $this->model('Page');
    }

    // Deze functie zorgt dat de button op de index een database samenstelt zodat de docenten data hebben om mee te werken
    public function index() {
        $data = [
            'dbCreated' => '',
        ];

        if (isset($_POST['createDatabase'])) {
            if($this->pageModel->createDatabase()) {
                header('location: ' . URLROOT . '/pages/index?success');
            } else {
                header('location: ' . URLROOT . '/pages/index?failed');
            }
        }

        $this->view('pages/index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }

    public function contact()
    {
        $data = [
            'name' => '',
            'emailFrom' => '',
            'onderwerp' => '',
            'message' => '',
        ];

        if (isset($_POST['send-contact'])) {
            //set variable data
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'emailFrom' => htmlspecialchars($_POST['emailFrom']),
                'onderwerp' => htmlspecialchars($_POST['onderwerp']),
                'message' => htmlspecialchars($_POST['message']),
            ];


            if (empty($data['name'])) {
                $data['nameErr'] = 'contactname_error';
            }

            if (empty($data['emailFrom'])) {
                $data['emailErr'] = 'contactemail_error';
            } else if (!filter_var($data['emailFrom'], FILTER_VALIDATE_EMAIL)){
                $data['emailErr'] = 'contactemail_error2';
            }

            if (empty($data['onderwerp'])) {
                $data['onderwerpErr'] = 'contactsubject_error';
            }

           if (empty($data['message'])) {
             $data['messageErr'] = 'contactmessage_error';
           }


            if (empty($data['messageErr']) && empty($data['emailErr']) && empty($data['onderwerpErr']) && empty($data['nameErr'])) {

                $mailTo = "info@boernaarburger.ml";
                $headers = "From: " . $data['emailFrom'];
                $txt = "U heeft een email ontvangen van " . $data['name'] . ".\n\n" . $data['message'];

                mail($mailTo, $data['onderwerp'], $txt, $headers);

                // redirect de gebruiker
                header('location: ' . URLROOT . '/pages/thankyou?mailsend');

            }}

        $this->view('pages/contact', $data);
    }

    public function thankyou() {
        $this->view('pages/thankyou');
    }

    public function faq() {
        $this->view('pages/faq');
    }

    public function notFound() {
        $this->view('pages/notFound');
    }

    public function sitemap() {
        $this->view('pages/sitemap');
    }
}
