<?php

/**
 * Created by PhpStorm.
 * User: emely
 * Date: 10.01.2017
 * Time: 20:55
 */
class Database
{
    private $_connection;
    private static $_instance; //The single instance
    private $_host = "212.33.90.213";
    private $_username = "jacek_gwiazdowski";
    private $_password = "jacek1049094";
    private $_database = "DATABASE";
    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    // Constructor
    private function __construct() {
        $this->_connection = oci_connect("jacek_gwiazdowski", "jacek1049094", '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=212.33.90.213)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=xe)))');

        // Error handling
        if(oci_error()) {
            trigger_error("Failed to conencto to database: " . oci_error());
        }
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    // Get mysqli connection
    public function getConnection() {
        return $this->_connection;
    }
}