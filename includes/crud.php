<?php
    include('includes/database.php');

    class Crud extends database {
        public function __construct() { 
            parent::__construct();        
        } 

        //Create function
        public function create($name, $email, $phone, $note, $reservation_date) {
            $sql = "INSERT INTO reservations (name, email, phone, note, reservation_date) VALUES (:name, :email, :phone, :note, :reservation_date)";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':email', $email);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':note', $note);
            $query->bindValue(':reservation_date', $reservation_date);
            $result = $query->execute();
            return $result;
        }

        //Read function
        public function read() {
            $sql = "SELECT * FROM reservations";
            $query = $this->connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        //Update function
        public function update($id, $name, $email, $phone, $note, $reservation_date) {
            $sql = "UPDATE reservations SET name=:name, email=:email, phone=:phone, note=:note, reservation_date=:reservation_date  WHERE id=:id";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id);
            $query->bindValue(':name', $name);
            $query->bindValue(':email', $email);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':note', $note);
            $query->bindValue(':reservation_date', $reservation_date);
            $result = $query->execute();
            return $result;
        }

        //Delete function
        public function delete($id) {
            $sql = "DELETE FROM reservations WHERE id=:id";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id);
            $result = $query->execute();
            return $result;
        }
    }
?>