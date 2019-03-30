<?php
/**
 * Description of CSMB
 *
 * @author Kaca
 */

require_once 'Board.php';
require_once 'Interface/IBoard.php';
class CSMB extends Board implements IBoard{
    
    public function count_average($grades) {
        if(count($grades) > 2){
            sort($grades);
            unset($grades[0]);
        }
        
        $average = array_sum($grades) / count(array_filter($grades));
        return $average;
    }

    public function count_final_result($grades) {
        $final_result = "fail";
        sort($grades);
       
        if (end($grades) > 8) {
            $final_result = "pass";
        }

        return $final_result;
    }

    public function display_student($student) {
        echo json_encode($student);
    }

}
