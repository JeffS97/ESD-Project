<?php 
    class Chat{
        private $chatid;
        private $sender;
        private $message;
        private $recipient;
        private $msgDateTime;
        private $gigId;


        public function __construct($chatid,$sender,$message,$recipient,$msgDateTime,$gigId){
            $this->chatid = $chatid;
            $this->sender = $sender;
            $this->message = $message;
            $this->recipient = $recipient;
            $this->msgDateTime = $msgDateTime;
            $this->gigId = $gigId;

        }
        public function getChatId(){
            return $this->chatid;
        }
        public function getSender(){
            return $this->sender;
        }
        public function getMessage(){
            return $this->message;
        }
        public function getRecipient(){
            return $this->recipient;
        }
        public function getMsgDateTime(){
            return $this->msgDateTime;
        }
        public function getGigId(){
            return $this->gigId;
        }
    }
?>