
<?php
// Nama : David Leonardo W
// NRP  : 1972017

class CatatDaoImpl
{

    public function fetch(){
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM attendance";
        $result = $link->query($query);
        $result->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Attendance');
        PDOUtil::closeConnection($link);
        return $result->fetchAll();
    }

    public function addAttendanceIn(Attendance $attendance){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "insert into attendance(att_data,first_in_time,employee_id) VALUES(?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $attendance->getAtt_date());
        $stmt->bindValue(2, $attendance->getFirst_in_time());
        $stmt->bindValue(3, $attendance->getEmployeeId());
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function addAttendanceOut(Attendance $attendance){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "insert into attendance(att_data,last_out_time,employee_id) VALUES(?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $attendance->getAtt_date());
        $stmt->bindValue(2, $attendance->getLast_out_time());
        $stmt->bindValue(3, $attendance->getEmployeeId());
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }
}