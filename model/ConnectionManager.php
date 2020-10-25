<?php
class ConnectionManager {
    public function getConnection() {        
        $dsn  = "mysql:host=localhost;dbname=hirehero";
        return new PDO($dsn, "root", "");  
    }
}
?>