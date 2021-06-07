<?php

class Database {
    private string $dbHost = DB_HOST;
    private string $dbUser = DB_USER;
    private string $dbPassword = DB_PASS;
    private string $dbName = DB_NAME;

    private $statement;
    private PDO $dbHandler;
    private string $error;

    public function __construct() {
        // set up the database connection
        $conn = 'mysql:host=' . $this->dbHost . ';dbName=' . $this->dbName;
        $options = array(
            // use a persistent connection to save memory, rather than open new connection with every request
            // use exception error mode so PDO throws exceptions with clear error information
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPassword, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // allows for querying
    public function query($sql) {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //bind values & types with PDO param constants. Prevents XSS
    public function bind($parameter, $value, $type = null) {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    // execute the prepared statement
    public function execute() {
        return $this->statement->execute();
    }

    // return an array
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // return a specific row as object
    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // get the rowcount
    public function rowCount() {
        $this->execute();
        return $this->statement->rowCount();
    }

    public function lastInsertdId() {
        return $this->dbHandler->lastInsertId();
    }
}
