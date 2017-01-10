<?php

/**
 * Created by PhpStorm.
 * User: emely
 * Date: 10.01.2017
 * Time: 20:49
 */
include "Database.php";

class Klient
{
    var $id;
    var $name;
    var $lastName;
    var $pesel;

    /**
     * Klient constructor.
     * @param $name
     * @param $lastName
     * @param $pesel
     */

    public function __construct($name=null, $lastName=null, $pesel=null)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->pesel = $pesel;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * @param mixed $pesel
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;
    }
    public function checkLogin($pesel){
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from A_KLIENT where pesel = :pesel";
        $stmt = oci_parse($conn,$sql);
        oci_bind_by_name($stmt,':pesel',$pesel);
        oci_execute($stmt);
        $nrows = oci_fetch_all($stmt, $result);
        if($nrows>0)
            return true;
        return false;
    }

}