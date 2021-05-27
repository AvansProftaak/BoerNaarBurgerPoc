<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait TranslationTrait {
    private $translationModel;

    public function __construct() {
        $this->translationModel = (new \Controller)->model('Translation');
    }

    protected function createOrUpdateTranslation(array $content, $uuid = null) {
        // array of available languages
        $languages = explode(',',LANGUAGES);

        // if no uuid is provided generate one
        if (!$uuid) {
            $uuid = Uuid::uuid4();
        }

        // for each of the languages/content create or update a translation record
        foreach ($content as $language => $contentItem) {
            if (in_array(strtoupper($language), $languages)) {
                if ($this->translationModel->getTranslation($uuid)) {
                    // translation exists, update existing translation
                    $this->translationModel->updateTranslation($uuid, $language, $contentItem);
                } else {
                    // translation does not exist, so create a new record
                    $this->translationModel->createTranslation($uuid, $language, $contentItem);
                }
            }
        }
        // return the translation tag uuid
        return $uuid;
    }
}
