<?php
    class gigDetailsDAO{

        public function createBooking($booker, $category,$name,$price,$start,$description,$status,$bookeradd) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`
            ,`gigStartDate`,`gigDescription`,`gigStatus`,`bookeraddress`) VALUES (:booker, :category, :gig,:price,:taskstart,:descriptions,:gigstatus,:bookeradd)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':booker', $booker, PDO::PARAM_STR);
           
            $stmt->bindParam(':gig', $name, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
            $stmt->bindParam(':taskstart', $start, PDO::PARAM_STR);
            $stmt->bindParam(':descriptions', $description, PDO::PARAM_STR);
          
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':gigstatus', $status, PDO::PARAM_STR);
            $stmt->bindParam(':bookeradd', $bookeradd, PDO::PARAM_STR);

            $isOk = $stmt->execute();

            # $lastID = $pdo->lastInsertId();
        
            $stmt = null;
            $pdo = null;
        
            return $isOk;
        }

       /* public function addLike($id) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "UPDATE `post` SET `likes` = `likes` + 1 WHERE `id` = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $isOk = $stmt->execute();

            $stmt = null;
            $pdo = null;

            return $isOk;
        }*/
        public function viewBooking($id) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "select * from gigDetails where gigId=:id  ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }
        public function getAllPosts($status) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "select * from gigDetails where gigStatus=:status order by gigId ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function getSomePosts($status) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * from  gigDetails WHERE gigStatus=:status LIMIT 6";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function getUserBooking($book) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "select * from gigDetails where gigbooker=:book and gigStatus='Active' ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':book', $book, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }
        public function getUserTask($task) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "select * from gigDetails where gigaccepter=:task and gigStatus='Active' ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':task', $task, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }
        public function getEarnings($user) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "select gigEndDate,gigPrice from gigDetails where gigaccepter=:book and gigStatus='Completed' ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':book', $user, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result =[];
            while($row = $stmt->fetch()){
                $result[] = [$row["gigPrice"], $row["gigEndDate"]];
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function getGigs($search) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            $sql = 'select * from gigDetails where lower(gigName) like CONCAT("%",:search,"%")';
            //$sql = "SELECT * FROM gigDetails WHERE gigName = ':search' ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"],$row['gigDescription']);
            }
            

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function getUserGigsHistory($user) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM gigDetails WHERE gigbooker=:user ORDER BY gigStartDate DESC ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["gigStatus"],$row["bookeraddress"],$row["accepteraddress"],$row['gigDescription']);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }
        public function getSearch($search) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT  * FROM gigDetails WHERE (gigName LIKE CONCAT('%',:search,'%') OR categoryName=:search) and gigStatus='Active' ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new gigDetails($row['gigId'],$row["gigbooker"],$row["gigaccepter"],$row["categoryName"],$row["gigName"],$row["gigPrice"],$row["gigStartDate"], $row["gigEndDate"],$row['gigDescription'],$row["bookeraddress"],$row["accepteraddress"],$row["gigStatus"]);
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
/*

        public function getHigherThanID($id, $limit){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM `post` WHERE `id` > :id ORDER BY `id` DESC LIMIT :lim";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':lim', $limit, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new Post($row["id"],$row["title"],$row["username"],$row["likes"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }  */
    }
  
?>