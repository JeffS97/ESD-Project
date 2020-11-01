<?php
    class gigDetails{
        private $gigId;
        private $gigbooker;
        private $gigaccepter;
        private $categoryName;
        private $gigName;
        private $gigPrice;
        private $gigStartDate;
        private $gigEndDate;
        private $gigStatus;
        private $bookeraddress;
        private $accepteraddress;


        public function __construct( $gigbooker, $gigaccepter,$categoryName,$gigName,$gigPrice,$gigStartDate,$gigEndDate,$gigStatus,$bookeraddress,$accepteraddress){
            $this->gigbooker = $gigbooker;
            $this->gigaccepter = $gigaccepter;
            $this->categoryName = $categoryName;
            $this->gigName = $gigName;
            $this->gigPrice = $gigPrice;
            $this->gigStartDate = $gigStartDate;
            $this->gigStartDate = $gigEndDate;
            $this->gigStatus = $gigStatus;
            $this->bookeraddress = $bookeraddress;
            $this->accepteraddress = $accepteraddress;
        }

        public function getID() {
            return $this->gigId;
        }

        public function getGigBooker() {
            return $this->gigbooker;
        }

        public function getGigAccepter() {
            return $this->gigaccepter;
        }

        public function getCategoryName() {
            return $this->categoryName;
        }
        public function getGigName() {
            return $this->gigName;
        }
        public function getGigPrice() {
            return $this->gigPrice;
        }
        public function getGigStartDate() {
            return $this->gigStartDate;
        }
        public function getGigStatus() {
            return $this->gigStatus;
        }
        public function getGigEndDate() {
            return $this->gigEndDate;
        }
        
        public function getBookeraddress() {
            return $this->bookeraddress;
        }
        public function getAccepteraddress() {
            return $this->accepteraddress;
        }
    }
?>