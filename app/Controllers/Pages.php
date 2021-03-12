<?php


class Pages extends Controller
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function index() {

        if (isset($_POST['createDatabase'])) {
            $query = file_get_contents(APPROOT . '/Config/CreateBoerNaarBurgerDatabase.sql');
            $this->db->query($query);

            if($this->db->execute()) {
                return 'De Boer naar Burger database is succesvol aangemaakt!';
            } else {
                return 'De Boer naar Burger database kon niet worden aangemaakt. Controleer of MySQL services runnen.';
            }
        }

        $this->view('pages/index');
    }

    public function about() {
        $this->view('pages/about');
    }

    public function contact() {
        $this->view('pages/contact');
    }
}
