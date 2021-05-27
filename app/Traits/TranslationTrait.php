<?php

namespace App\Traits;

use Database;

trait TranslationTrait {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    protected function createOrUpdateTranslation(array $content, $uuid = null) {
        // array of available languages
        $languages = explode(',',LANGUAGES);

        // if no uuid is provided generate one
        if (!$uuid) {
            $uuid = uuid();
        }

        // for each of the languages/content create or update a translation record
        foreach ($content as $language => $contentItem) {
                if ($this->getTranslation($uuid, $language)) {
                    // translation exists, update existing translation
                    $this->updateTranslation($uuid, $language, $contentItem);
                } else {
                    // translation does not exist, so create a new record
                    $this->createTranslation($uuid, $language, $contentItem);
                }
            }
        // return the translation tag uuid
        return $uuid;
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

    public function getTranslation($uuid, $language) {
        $this->db->query('SELECT * FROM boer_naar_burger.translations
                              WHERE translation_tag = :uuid
                              AND language = :language');

        $this->db->bind(':uuid', $uuid);
        $this->db->bind(':language', $language);
        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            return false;
        }
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
