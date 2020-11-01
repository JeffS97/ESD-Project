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


        public function __construct($id, $booker, $accepter,$category,$Name,$Price,$StartDate,$EndDate,$Status,$bookeradd,$accepteradd){
            $this->gigId=$id;
            $this->gigbooker = $booker;
            $this->gigaccepter = $accepter;
            $this->categoryName = $category;
            $this->gigName = $Name;
            $this->gigPrice = $Price;
            $this->gigStartDate = $StartDate;
            $this->gigEndDate = $EndDate;
            $this->gigStatus = $Status;
            $this->bookeraddress = $bookeradd;
            $this->accepteraddress = $accepteradd;
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