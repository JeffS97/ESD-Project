<?php 
    class User{
        private $email;
        private $password;
        private $fullname;
        private $username;
        public function __construct($email,$password,$fullname,$username){
            $this->email = $email;
            $this->password = $password;
            $this->fullname = $fullname;
            $this->username = $username;

        }
        public function getEmail(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getFullname(){
            return $this->fullname;
        }
        public function getUsername(){
            return $this->username;
        }
    }
?>