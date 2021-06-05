<?php


class Admin
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM boer_naar_burger.admins WHERE email = :email');

        $this->db->bind(':email', $email);
        $admins = $this->db->single();

        if($admins) {
            $hashedPassword = $admins->password;

            if (password_verify($password, $hashedPassword)) {
                return $admins;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}
