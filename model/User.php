<?php 
    class User{
        private $email;
        private $password;
        private $fullname;
        private $username;
        public function __construct($Patient_Id,$Email,$P_Name,$Age,$Allergy,$Address,$Password,$ChatId,$Payment){
            $this->Patient_Id = $Patient_Id;
            $this->Email = $Email;
            $this->P_Name = $P_Name;
            $this->Age = $Age;
            $this->Allergy = $Allergy;
            $this->Address = $Address;
            $this->Password = $Password;
            $this->ChatId = $ChatId;
            $this->Payment = $Payment;

        }
        public function getPatient_Idl(){
            return $this->Patient_Id;
        }
        public function getEmail(){
            return $this->Email;
        }
        public function getP_Name(){
            return $this->P_Name;
        }
        public function getAge(){
            return $this->Age;
        }
        public function getAllergy(){
            return $this->Allergy;
        }
        public function getAddress(){
            return $this->Address;
        }
        public function getPassword(){
            return $this->Password;
        }
        public function getChatId(){
            return $this->ChatId;
        }
        public function getPayment(){
            return $this->Payment;
        }
    }
?>