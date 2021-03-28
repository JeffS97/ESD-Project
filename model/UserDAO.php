<?php
    class UserDAO{

        # Add a new user to the database
        public function add($email, $password, $fullname, $age, $allergy, $address){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into Patient (Email, P_Name, Age, Allergy, Address, Password) 
                    values (:email, :fullname, :age, :allergy, :address, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":fullname",$fullname);
            $stmt->bindParam(":age",$age);
            $stmt->bindParam(":allergy",$allergy);
            $stmt->bindParam(":address",$address);

            $status = $stmt->execute();
            

            $stmt = null;
            $pdo = null;    
            return $status;
        }

        # Add a new healthworker (doctor/nurse) to the Healthworker table
        public function addHealthworker($email, $fullname, $password, $role, $gid){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into Healthworker (Email, Name, Password, Role, Gid) 
                    values (:email, :fullname, :password, :role, :gid)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":fullname",$fullname);
            $stmt->bindParam(":role",$role);
            $stmt->bindParam(":gid",$gid);

            $status = $stmt->execute();
            

            $stmt = null;
            $pdo = null;
            return $status;
        }
        
        # Add a new clinic to the Clinic table
        public function addClinic($gid, $clinic_name, $address){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into Clinic (Gid, Clinic_Name, C_Address) 
                    values (:gid, :clinic_name, :address)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":gid",$gid);
            $stmt->bindParam(":clinic_name",$clinic_name);
            $stmt->bindParam(":address",$address);

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