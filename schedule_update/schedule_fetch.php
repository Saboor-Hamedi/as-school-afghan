<?php 
    require_once '../Config/config.php';


    if(isset($_POST['scheduleid'])){
        $query = "SELECT * FROM time_table WHERE time_table_id = '".$_POST['scheduleid']."'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }

?>