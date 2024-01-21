<?php


class Database extends mysqli
{
   private $db;

   public function __construct($host, $username, $password, $dbName)
   {
       $this->db = new mysqli($host, $username, $password, $dbName);

       if($this->db->$this->connect_error) {
           die("Connection failed: " . $this->db->connect_error);
       }
   }

   public function getConnection()
   {
       return $this->db;
   }
}