<?php
    class UserDAO{

        # Add a new user to the database
        public function add($email, $password,$fullname,$username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into user (email, password,fullname,username) 
                    values (:email, :password,:fullname,:username)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":fullname",$fullname);
            $stmt->bindParam(":username",$username);

            $status = $stmt->execute();
            

            $stmt = null;
            $pdo = null;
            return $status;
        }

        # Retrieve a user with a given username
        # Return null if no such user exists
        public function retrieve($email){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select * from user where email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email,PDO::PARAM_STR);
            $stmt->execute();
            
            $user = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if($row = $stmt->fetch()){
                $user = new User($row["email"],$row["password"],$row["fullname"],$row["username"]);
            }
            
            $stmt = null;
            $pdo = null;
            return $user;
        }
    }
?>