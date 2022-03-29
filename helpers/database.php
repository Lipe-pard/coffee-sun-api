<?php 

class Database{
    //propriedades
   public $conn;
   
   function __construct(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "study_api";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn = $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
   }
}

?>