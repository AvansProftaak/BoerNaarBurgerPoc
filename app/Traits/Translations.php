<?php


trait Translations
{
    public function getLanguage()
    {
        $defaultLang = 'nl';
        $_SESSION['language'] = $defaultLang;
        require_once 'lang/' . $_SESSION['language'] . '.php';
        return $lang;
    }
}
