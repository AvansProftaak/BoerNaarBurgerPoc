<?php


class Page
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function createDatabase() {
        $files = $this->getSqlFiles();

        try {
            foreach ($files as $file) {
                $query = file_get_contents($file);
                $this->db->query($query);
                $this->db->execute();
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
        return true;
    }

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
