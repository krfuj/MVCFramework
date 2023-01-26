<?php

/**
 * 
 * Main class for the model.
 * 
 */

class Model
{
      use Database;
      protected $table = 'unix'; 
      protected $limit = 10;
      protected $offset = 0;


     
      function test()
      {
            $query = "SELECT * FROM unix";
            $result = $this->query($query);
            show($result);
      }

      /**
       * It takes an array of data and an array of data_not, and returns a query that selects all the
       * data from the table where the data is equal to the data and the data_not is not equal to the
       * data_not.
       * 
       * @param data an array of key value pairs that are used to filter the results.
       * @param data_not is an array of data that you want to exclude from the query.
       */
      public function where($data, $data_not=[])
      {
            $keys = array_keys($data); // Get the keys of the array.
            $keys_not = array_keys($data_not);
            $query="SELECT * FROM $this->table WHERE"; // Create the query string.

            foreach($keys as $key)
            {
                  $query .= $key . " = :". $key . " && "; // Add the key and the value to the query string.
            }

            foreach($keys_not as $key)
            {
                  $query .= $key . "!= :" . $key . " && "; 
            }
            $query = trim($query, " && ");// Remove the last ' && ' from the query string.

            $query = "limit $this->limit offset $this->offset "; 
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data); // Execute the query.
            if($result)
            {
                  return $result;
            }
            return false;
            
      }
/**
 * This function returns the first row of the table 'unix' in the database 'test'.
 * 
 * @param data This is the data that you want to insert into the database.
 * @param data_not This is the data that you want to exclude from the query.
 * 
 * @return The first row of the table.
 */

      public function first($data, $data_not)
      {
            $query = "SELECT * FROM unix LIMIT 1";
            $result = $this->query($query);
            return $result;
      }

     /**
      * It takes an array of data, creates a query string, and then executes the query
      * 
      * @param data The data to be inserted into the database.
      */
      public function insert($data)
      {
            $keys = array_keys($data); // Get the keys of the array.
            $query = "INSERT INTO $this->table (".implode(",",$keys).") values (".implode(",:" ,$keys).") "; // Create the query string.
            $this->query($query, $data); 

            return false;
      }

      /**
       * It takes an array of data, and a table name, and updates the table with the data
       * 
       * @param id The id of the row you want to update
       * @param data an array of the data you want to update.
       * @param table The table you want to update
       * @param id_column The column name of the primary key.
       * 
       * @return The result of the query.
       */
      public function update($id, $data,$table, $id_column = 'id')
      {
            $query = "UPDATE $table SET ";
            $i = 0; 
            foreach ($data as $key => $value) {
                  $query .= $key . " = :" . $key;
                  if ($i < count($data) - 1) {
                        $query .= ", ";
                  }
                  $i++;
            }
            $query .= " WHERE $id_column = :id";
            $data['id'] = $id;
            $result = $this->query($query, $data);
            return $result;
      }
      
            

      /**
       * It deletes a row from the database table.
       * 
       * @param id The id of the row you want to delete.
       * @param id_column The column name of the id.
       */
      public function delete($id, $id_column = 'id')
      {
            $data[$id_column] = $id; // Create the data array.
            $query = "DELETE FROM $this->table WHERE $id_column = :id_column"; // Create the query string.
            
            echo $query;
            //this->query($query, $data); // Execute the query.

            return false;  
      }
      
}