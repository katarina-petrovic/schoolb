<?php

/**
 *
 * @author Kaca
 */
class Grade {

    private $id;
    private $grade;
    private $student;

    /**
     * @var object Database
     */
    private $db_connect;

    public function __construct() {
        $this->db_connect = new Database;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_grade() {
        return $this->grade;
    }

    public function get_student() {
        return $this->student;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_grade($grade) {
        $this->grade = $grade;
    }

    public function set_student($student) {
        $this->student = $student;
    }

    public function display_grades_for_student() {
        $sql = "SELECT * FROM grades WHERE  student = '$this->student'";
        $grades = array();
        $all_results_res = $this->db_connect->conn->query($sql);
        while ($row = mysqli_fetch_object($all_results_res)) {
            $grades[] = $row->grade;
        }
        return $grades;
    }

}
