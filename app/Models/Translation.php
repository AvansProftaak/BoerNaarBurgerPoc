<?php


class Translation
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function createTranslation($uuid, $language, $content) {
        $this->db->query('INSERT INTO boer_naar_burger.translations (translation_tag, language, content)
                              VALUES (:uuid, :language, :content)');

        $this->db->bind(':uuid', $uuid);
        $this->db->bind(':language', $language);
        $this->db->bind(':content', $content);

        if ($this->db->execute()) {
            return $uuid;
        } else {
            return false;
        }
    }

    public function getTranslation($uuid) {
        $this->db->query('SELECT * FROM boer_naar_burger.translations
                              WHERE translation_tag = :uuid');

        $this->db->bind(':uuid', $uuid);
        return $this->db->resultSet();;
    }

    public function updateTranslation($uuid, $language, $content) {
        $this->db->query('UPDATE boer_naar_burger.translations 
                              SET content = :content 
                              WHERE translation_tag = :uuid
                              AND language = :language');

        $this->db->bind(':uuid', $uuid);
        $this->db->bind(':language', $language);
        $this->db->bind(':content', $content);

        if ($this->db->execute()) {
            return $uuid;
        } else {
            return false;
        }
    }
}
