<?php

namespace App\Utils;

use PDO;

// how to use  => Database::getPDO()
// Design Pattern : Singleton
class Database
{
    /**
     * PDO Object to connect with bdd
     *
     * @var PDO
     */
    private $dbh;
    /**
     * 
     *
     * @var Database
     */
    private static $instance;

    /**
     * Constructor
     *
     * 
     * 
     */
    private function __construct()
    {

        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
        // if error

        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public static function getPDO()
    {

        if (empty(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance->dbh;
    }
}