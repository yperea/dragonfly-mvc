<?php

namespace Dragonfly\App\Data;

require_once(APP_PATH . CONFIG_PATH . "global.php");
require_once(APP_PATH . CONFIG_PATH . "database.php");

/**
 * Class Connection provides a singleton connection object to the database
 * using PDO.
 *
 * @package Dragonfly\App\Data
 * @author yperea
 */
class Connection
{
    private static $instance;
    private $dbc;

    private function __construct()
    {
        $dsn = DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->dbc = new \PDO($dsn, DB_USER, DB_PASS);
    }

    /**
     * @return Connection
     */
    public static function create ()
    {
        if(!self::$instance)
        {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->dbc;
    }
}