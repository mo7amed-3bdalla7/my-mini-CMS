<?php

class database
{
    /**
     * Database Object.
     *
     * @var object
     */
    public static $dbo = null;

    /**
     * Private Constructor To Prevent Instantiation.
     */
    private function __construct()
    {
    }

    /**
     * A Function To Make A PDO Object.
     *
     * @return DB object
     */
    public static function get_instance()
    {
        if ($dbo === null) {
            self::$dbo = new PDO('mysql://hostname='.DB_HOST.';dbname='.DB_NAME, DB_ROOT, DB_PASS);
        }

        return self::$dbo;
    }
}
