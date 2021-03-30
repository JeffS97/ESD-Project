<?php
    class DoctorDAO{
        public function add($email, $fullname, $password, $role, $gid){
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
    }
?>