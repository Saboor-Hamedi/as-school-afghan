<?php 
    require_once '../Config/config.php';


    if(isset($_POST['familyid'])){
        $query = "SELECT * FROM family WHERE family_id_auto = '".$_POST['familyid']."'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }

?>

