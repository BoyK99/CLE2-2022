<?php 
    class database { 
        private $db_localhost = 'localhost'; 
        private $db_user = 'root'; 
        private $db_password = ''; 
        private $db_name = 'reservering2022'; 
     
        protected $connection; 
     
        public function __construct() { 
            if(!isset($this-> connection)) {        
            $this->connection = new mysqli(
                $this->db_localhost, 
                $this->db_user, 
                $this->db_password , 
                $this->db_name);
            }   
            return $this->connection;     
        } 
    } 
?> 