<?php
    include('database.php');

    class crud {
        //Create function
        public function create($name, $email, $phone, $address) {
            $sql = "INSERT INTO reserveringen (name, email, phone, address) VALUES (:name, :email, :phone, :address)";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':email', $email);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':address', $address);
            $result = $query->execute();
            return $result;
        }

        //Read function
        public function read() {
            $sql = "SELECT * FROM reserveringen";
            $query = $this->connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        //Update function
        public function update($id, $name, $email, $phone, $address) {
            $sql = "UPDATE reserveringen SET name=:name, email=:email, phone=:phone, address=:address WHERE id=:id";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id);
            $query->bindValue(':name', $name);
            $query->bindValue(':email', $email);
            $query->bindValue(':phone', $phone);
            $query->bindValue(':address', $address);
            $result = $query->execute();
            return $result;
        }

        //Delete function
        public function delete($id) {
            $sql = "DELETE FROM reserveringen WHERE id=:id";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id);
            $result = $query->execute();
            return $result;
        }

        //Delete function
        public function delete($id) {
            $sql = "DELETE FROM reserveringen WHERE id=:id";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id);
            $result = $query->execute();
            return $result;
        }
    }
?>