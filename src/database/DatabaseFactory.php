<?php

namespace Source\Database;

use PDO;
use PDOException;

class DatabaseFactory
{
    /**
     * @var PDO
     */
    protected static $conn;
    
    /**
     * Abre uma conexão com o banco de dados utilizando o PDO.
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"] . ";",
                    $_ENV["DB_USER"],
                    $_ENV["DB_PASSWD"],
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_CASE => PDO::CASE_NATURAL
                    ]
                );
            } catch (PDOException $ex) {
                die("error: {$ex->getMessage()}");
            }
        }
        return self::$conn;
    }
}
