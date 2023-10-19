<?php
namespace core;

use \core\Database;

class Model {

    /**
     * Instance of PDO
     */
    protected static $db;
    
    public function __construct() 
    {
        self::_checkDatabase();
    }

    /**
     * Verify current database connection
     */
    public static function _checkDatabase()
    {
        if(self::$db == null) 
            self::$db = Database::getInstance();
    }
}