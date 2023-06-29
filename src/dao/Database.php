<?php

namespace app\dao;

use app\core\Application;

require_once Application::$ROOT_DIR."/config.php";

class Database {

    private static ?\PDO $connection = null;
    
    public static function getConnection(): \PDO {

        if (is_null(self::$connection)) {
            self::$connection = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        }
        return self::$connection;
    }
}
