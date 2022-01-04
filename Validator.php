<?php

class Validator {


    public static function validate($val){

        $array_val = array_map('intval', str_split($val));

        //Validate integer value
        if(!preg_match('/^[0-9]*$/', $val)){     

            echo 'The entered value should be a numeric value';
            die();
        }

        //Validate 5 numbers value
        if(count($array_val) != 5){      

            echo 'The entered number should be consisting of 5 numbers';
            die();
        }


    }


}





