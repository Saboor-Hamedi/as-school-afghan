
<?php require_once '../Config/config.php'?>
<?php 
  if(isset($_GET['delete_file'])){
    $idc = $_GET["delete_file"];
    if($con->query("DELETE FROM files WHERE file_id=$idc")){
         echo "deleted";
    } else { 
        echo "fail".mysqli_error($con);
       
    }
  }  
?>

<?php 
echo "<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
";?>