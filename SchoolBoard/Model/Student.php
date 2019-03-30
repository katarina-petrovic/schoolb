<?php

/**
 *
 * @author Kaca
 */

class Student {

    /**
     * @var int, unique
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $grades;

    /**
     * @var int
     */
    private $board_id;
    private $average;
    private $final_result;

    /**
     * @var object Database
     */
    private $db_connect;

    public function __construct() {
        $this->db_connect = new Database;
    }

    public function get_average() {
        return $this->average;
    }

    public function get_final_result() {
        return $this->final_result;
    }

    public function set_average($average) {
        $this->average = $average;
    }

    public function set_final_result($final_result) {
        $this->final_result = $final_result;
    }

    public function get_grades() {
        return $this->grades;
    }

    public function set_grades($grades) {
        $this->grades = $grades;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_board_id() {
        return $this->board_id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_board_id($board_id) {
        $this->board_id = $board_id;
    }

    public function show_results() {
        $sql = "SELECT * FROM students WHERE  id = '$this->id'";
        $student = array();
        $match_team = array();
        $all_results_res = $this->db_connect->conn->query($sql);
        while ($row = mysqli_fetch_object($all_results_res)) {
            $this->set_name($row->name);
            $this->set_board_id($row->board);
        }
        return $this;
    }

}
