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

        # Update user email
        # Return null if update was unsuccessful 

        public function updateEmail($email, $newemail){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "UPDATE user email
                    SET email=:newemail;
                    WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":newemail",$newemail);
            $status = $stmt->execute();

            $stmt = null;
            $pdo = null;
            return $status;
        }

        # Update user password
        # Return null if update was unsuccessful 

        public function updatePassword($email, $password){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "UPDATE user password
                    SET password=:password
                    WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":email", $email);
            $status = $stmt->execute();

            $stmt = null;
            $pdo = null;
            return $status;
        }

        # Update user fullname
        # Return null if update was unsuccessful 

        public function updateFullname($email, $fullname){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "UPDATE user fullname
                    SET fullname=:fullname
                    WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":fullname",$fullname);
            $status = $stmt->execute();

            $stmt = null;
            $pdo = null;
            return $status;
        }

        # Update user username
        # Return null if update was unsuccessful 

        public function updateUsername($email, $username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "UPDATE user username
                    SET username=:username
                    WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":email", $email);
            $status = $stmt->execute();

            $stmt = null;
            $pdo = null;
            return $status;
        }
    }
?>