
<?php
// Nama : David Leonardo W
// NRP  : 1972017

class EmployeeDaoImpl{
    
    public function login(Employee $user){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM employee WHERE id = ? AND password = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$user->getId());
        $stmt->bindValue(2,$user->getPassword());
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('User');

    }

    public function fetch(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM employee";
        $result = $link->query($query);
        $result->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Employee');
        PDOUtil::closeConnection($link);
        return $result->fetchAll();
    }
}
