<?php

/**
 *
 */
class DataValidator {

    public function __construct() {

    }

    private function TestMinimalLength($length, $string = "") {
        echo'validator';
        if (strlen($string) < $length) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function TestMaximumLength($length, $string = "") {
        echo'validator';
        if (strlen($string) > $length) {
           
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function TestIfNumeric($string) {
        echo'validator';
        if (is_numeric($string)) {
            return TRUE;

        } else {
            return FALSE;
        }
    }

    private function TestIfInt($string) {
        echo'validator';
        if (is_numeric($string) && floor($string) == $string) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function TestIfBoolean($string) {
        echo'validator';
        if ($string == '1' || $string == 1 || $string == TRUE ||
        $string == '0' || $string == 0 || $string == FALSE) {
            return TRUE;

        } else {
            return FALSE;
        }
    }

    private function TestIfEmail() {
        echo'validator';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
          return TRUE;

        } else {
          return FALSE;
        }
    }

    private function TestIfNotEmpty($string) {
        $string = trim($string);
        echo'validator';
        if (empty($string) ) {
            return FALSE;

        } else {
            return TRUE;
        }

    }



    private function Trim($string) {
        echo'validator';
        return trim($string);
    }

}


 ?>
