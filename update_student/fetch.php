<?php require_once '../Config/config.php'; ?>
<?php
 //fetch.php
 if(isset($_POST["id"]))
 {

      $query = "SELECT * FROM student WHERE id = '".$_POST["id"]."'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 ?>

