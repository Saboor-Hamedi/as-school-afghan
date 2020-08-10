<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS','');
define('DB_NAME','thesis');?>

<?php
 class db_con{
    private  $con;

     public function __construct()
     {
         $con = new mysqli('localhost', 'root', '', 'thesis');
     }

     public function delete($table, $id){
         $result = mysqli_query($this->con, "DELETE FROM $table WHERE $id");
         return $result;
     }
 }
?>