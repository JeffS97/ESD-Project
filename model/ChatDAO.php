<?php
    class ChatDAO{

        public function getChat($id){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "select * from chat where gigId=:id";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new Chat($row['chatid'],$row["sender"],$row["message"],$row["recipient"],$row["msgDateTime"],$row["gigId"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function addChat($sender, $receiver, $datetime, $msg) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = `INSERT INTO chat (sender, recipient, msgDateTime, message)
            VALUES (:sender,:receiver ,:datetime ,:msg );`;

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':sender', $sender, PDO::PARAM_STR);
            $stmt->bindParam(':receiver', $receiver, PDO::PARAM_STR);
            $stmt->bindParam(':datetime', $datetime, PDO::PARAM_STR);
            $stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
          
            $stmt = null;
            $pdo = null;

            return $result;
        }
    
    }
?>