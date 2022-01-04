<?php


class DB {



    public static function connect($query, $val, $type){

        try {

            $conn = new PDO("mysql:host=localhost;dbname=restart_game", 'root', '');
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Prepare sql and bind parameters
            $stmt = $conn->prepare($query);

            if($type == 'get' AND $val == null){        // Select query from DB

                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }elseif($type == 'get' AND $val != null){   // Select query With conditions have a value

                $stmt->bindParam(':num', $val); 
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }elseif($type == 'set'){                    // Insert query to DB

                $stmt->bindParam(':num', $val); 
                $stmt->execute();
            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

    }


    // public static function get($query, $val){

    //     try {

    //         $conn = new PDO("mysql:host=localhost;dbname=restart_game", 'root', '');
    //         // Set the PDO error mode to exception
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         // Prepare sql and bind parameters
    //         $stmt = $conn->prepare($query);
    //         if($val != null){ $stmt->bindParam(':num', $val); }
    //         $stmt->execute();
    //         return $stmt->fetch(PDO::FETCH_ASSOC);

    //     } catch(PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    //     $conn = null;

    // }

    // public static function set($query, $val){

    //     try {

    //         $conn = new PDO("mysql:host=localhost;dbname=restart_game", 'root', '');
    //         // Set the PDO error mode to exception
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         // Prepare sql and bind parameters
    //         $stmt = $conn->prepare($query);
    //         $stmt->bindParam(':num', $val);
    //         $stmt->execute();

    //     } catch(PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    //     $conn = null;

    // }


}
