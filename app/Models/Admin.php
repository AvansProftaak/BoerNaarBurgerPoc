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
    public function getAllQueries() {
        $this->db->query('SELECT DISTINCT query_id, query_moment, query FROM boer_naar_burger.search_queries ORDER BY query_id;');
        return $this->db->resultSet();
    }

    public function truncateTable() {
        $this->db->query('TRUNCATE boer_naar_burger.search_queries');
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
