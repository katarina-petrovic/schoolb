<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Kaca
 */
interface IBoard {
    public function count_average($grades);
    public function count_final_result($grades);
    public function display_student($student);
}
