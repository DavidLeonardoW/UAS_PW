<?php
// Nama : David Leonardo W
// NRP  : 1972017

class Attendance implements JsonSerializable
{
    public $att_date;
    public $employee_id;
    public $first_in_time;
    public $last_out_time;

    /**
     * @return mixed
     */
    public function getAtt_date()
    {
        return $this->att_date;
    }

    /**
     * @param mixed $att_date
     */
    public function setAtt_date($att_date)
    {
        $this->att_date = $att_date;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * @param mixed $employee_id
     */
    public function setEmployeeId($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return mixed
     */
    public function getFirst_in_time()
    {
        return $this->first_in_time;
    }

    /**
     * @param mixed $first_in_time
     */
    public function setFirst_in_time($first_in_time)
    {
        $this->first_in_time = $first_in_time;
    }

    /**
     * @return mixed
     */
    public function getLast_out_time()
    {
        return $this->last_out_time;
    }

    /**
     * @param mixed $last_out_time
     */
    public function setLast_out_time($last_out_time)
    {
        $this->last_out_time = $last_out_time;
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}