<?php
namespace core;

use \PDO;
use \src\Config;

class Database 
{
    /**
     * Data base connection
     */
    private static PDO $db;

    /**
     * Get instance from database using PDO
     * if static $db heave a connection.. return!
     */
    public static function getInstance() 
    {
        //We heave connection?
        if(!isset(self::$db)) 
            self::$db = new PDO(Config::DB_DRIVER.":dbname=".Config::DB_DATABASE.";host=".Config::DB_HOST, Config::DB_USER, Config::DB_PASS);

        return self::$db;
    }
}