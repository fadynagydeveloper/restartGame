<?php

require 'DB.php';
require 'Validator.php';


class Game {

    private $secret_player1 = 12345; //Hard Code
    private $secret_player2 = 58245; //Hard Code

    function __get($prop){
       return 'Sorry! you can\'t get the value of ' . $prop . ' because it\'s PRIVET';
    }


    public function get_result($secret_player1, $num){

        $secret_player2 = $this->secret_player2;
        $result = [];
        $asterisks = 0;
        $dots = 0;

        $array_num = array_map('intval', str_split($num));
        $array_secret = array_map('intval', str_split($secret_player1));

        for($i=0; $i < count($array_num); $i++){
            if($array_num[$i] == $array_secret[$i]){
                $asterisks += 1;
            }else{
                $dots += 1;
            }
        }
    
        $result = ['asterisks' => $asterisks, 'dots' => $dots];
        if($asterisks == 5){
            echo 'Congratulations .. You Have Guessed Right ' . $num . '<br>'  ;
            print_r( $result );
        }else{
            print_r( $result );
        }

    }



    public function guess(){

        // var_dump( $guess_num );  
        // die();
        $guess_num = rand(10000,99999);
        Validator::validate($guess_num);  // Validation

        $prev_nums = DB::connect("SELECT number FROM guesses where number = (:num)", $guess_num, 'get') ;
        if($prev_nums == true){
            return $this->get_result($this->secret_player1, $prev_nums["number"]);
        }else{
            DB::connect("INSERT INTO guesses (number) VALUES (:num)", $guess_num, 'insert') ;
            return $this->get_result($this->secret_player1, $guess_num);
        }

    }



}

