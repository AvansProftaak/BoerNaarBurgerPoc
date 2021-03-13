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

    public function contact() {
        $this->view('pages/contact');
    }
}
