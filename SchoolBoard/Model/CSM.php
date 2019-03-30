<?php

/**
 * Description of CSM
 *
 * @author Kaca
 */
require_once 'Board.php';
require_once 'Interface/IBoard.php';

class CSM extends Board implements IBoard {

    public function count_average($grades) {
        $average = array_sum($grades) / count(array_filter($grades));
        return $average;
    }

    public function count_final_result($grades) {
        $final_result = "fail";
        if ($this->count_average($grades) >= 7) {
            $final_result = "pass";
        }

        return $final_result;
    }

    public function display_student($student) {
        $xml = new SimpleXMLElement('<xml/>');
            $track = $xml->addChild('student');
            $track->addChild('student_id', $student['student_id']);
            $track->addChild('name', $student['name']);
            $grades = $track->addChild('grades');
            foreach ($student['list_of_grades'] as $grade){
                $grades->addChild('grade', $grade);
            }

            $track->addChild('average', $student['average']);
            $track->addChild('final_result', $student['final_result']);
       
        Header('Content-type: text/xml; charset=utf-8');
        print($xml->asXML());
    }

}
