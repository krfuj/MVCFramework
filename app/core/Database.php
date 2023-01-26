<?php

trait database
{
      private function connect()
      {
            $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME; // Defining the database name, host, user and password.
            $con = new PDO($string, DBUSER, DBPASS);
            return $con;
      }
      public function query($query, $data = [])
      {
            $con = $this->connect(); // Connecting to the database.
            $stm = $con->prepare($query); // Preparing the query.
            
            $stm->execute($data); // Executing the query.
            
            $check = $stm->execute($data);

            if ($check) {
                  $result = $stm->fetchAll(PDO::FETCH_OBJ); // Returning the result.
                  if (is_array($result) && count($result)) {
                        return $result;
                  }
            }


            return false;
      }

      
}
