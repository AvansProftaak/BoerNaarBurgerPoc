<?php


class Admin
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM boer_naar_burger.admin WHERE email = :email');

        $this->db->bind(':email', $email);
        $admin = $this->db->single();

        if($admin) {
            $hashedPassword = $admin->password;

            if (password_verify($password, $hashedPassword)) {
                return $admin;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }*/


}
