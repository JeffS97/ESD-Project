<?php 
    class Healthworker{
        private $email;
        private $password;
        private $fullname;
        private $username;
        public function __construct($Healthworker_Id,$Email,$Username,$Name,$Password,$Role,$Gid){
            $this->Healthworker_Id = $Healthworker_Id;
            $this->Email = $Email;
            $this->Username = $Username;
            $this->Name = $Name;
            $this->Password = $Password;
            $this->Role = $Role;
            $this->Gid = $Gid;
        }
        public function getHealthworker_Idl(){
            return $this->Healthworker_Id;
        }
        public function getEmail(){
            return $this->Email;
        }
        public function getUsername(){
            return $this->Username;
        }
        public function getName(){
            return $this->Name;
        }
        public function getPassword(){
            return $this->Password;
        }
        public function getRole(){
            return $this->Role;
        }
        public function getGid(){
            return $this->Gid;
        }
    }
?>