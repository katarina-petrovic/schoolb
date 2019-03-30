<?php
require 'Model\Database.php';
require 'Model\Student.php';
require 'Model\Grade.php';
require 'Model\CSM.php';
require 'Model\CSMB.php';

if (isset($_GET['student']) && $_GET['student'] != "") {
    $student = new Student();
    $grade = new Grade();

    $student->set_id($_GET['student']);
    $grade->set_student($student->get_id());
    $grades = $grade->display_grades_for_student();


    $student_data = $student->show_results();

    $board_id = $student_data->get_board_id();
    $board = "";
    if ($board_id == 1) {
        $board = new CSM();
    } else {
        $board = new CSMB();
    }


    $student_data->set_final_result($board->count_final_result($grades));
    $student_data->set_average($board->count_average($grades));
    $student_data->set_grades($grades);

    $student_array = array();
    $student_array['student_id'] = $student_data->get_id();
    $student_array['name'] = $student_data->get_name();
    $student_array['list_of_grades'] = $student_data->get_grades();
    $student_array['average'] = $student_data->get_average();
    $student_array['final_result'] = $student_data->get_final_result();

    $board->display_student($student_array);
} 
?>

