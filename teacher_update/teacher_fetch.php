<?php require_once '../Config/config.php'; ?>
<?php
 //fetch.php
 if(isset($_POST["NIM"]))
 {

      $query = "SELECT * FROM teacher WHERE tec_id = '".$_POST["NIM"]."'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 ?>

