<?php


class Page
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Creates the database from scratch
    public function createDatabase() {

        $files = $this->getSqlFiles();

        // for each retrieved sql script open the file and execute its content
        foreach ($files as $file) {
            try {
                $query = file_get_contents($file);
                $this->db->query($query);
                $this->db->execute();
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                return false;
            }
        }
        return true;
    }

    // Retrieves all sql scripts from the database/scripts folder.
    // Function returns an array of file paths which we can later open and execute
    public function getSqlFiles() {
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPROOT . '/Config/Database/Scripts'));
        $files = [];

        foreach ($rii as $file) {
            if ($file->isDir()) {
                continue;
            }

            $files[] = $file->getPathname();
        }

        return $files;
    }
}
