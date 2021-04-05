<?php
class ConnectionManager {

  public function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";  //mamp pls change
    $dbname = "ESD5";
    
    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
  }
 
}
?>