<?php

class Database
{
      private $conection;

      function connect()
      {
      	$this->connection=mysqli_connect('localhost' , 'root' , '' , 'typing_speed');
      } 

      function disconnect()
      {
      	mysqli_close($this->connection);
      }

      function run_query($query)
      {
      	return mysqli_query($this->connection , $query);
      }
}

?>