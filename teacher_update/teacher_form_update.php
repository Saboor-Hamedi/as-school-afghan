<?php
     
      require_once '../Config/config.php';
     
      session_start();
      if(isset($_POST['teacher_update_btn'])){
        $teacherid =  mysqli_real_escape_string($con, $_POST['teacherid']);
        $teachername = mysqli_real_escape_string($con, $_POST['teachername']);
        $teacherlastname = mysqli_real_escape_string ($con, $_POST['teacherlastname']);
        $teacheraddress = mysqli_real_escape_string($con, $_POST['teacheraddress']);
        $teacheremail = mysqli_real_escape_string($con, $_POST['teacheremail']);
        $teacherprofession = mysqli_real_escape_string($con, $_POST['teacherprofession']);
   
        $sql = "UPDATE `teacher` set `teacherid` = '$teacherid'
        ,`tname`='$teachername', `lastname`= '$teacherlastname'
        ,`address`='$teacheraddress', `country`='$teacheremail'
        ,`profession`='$teacherprofession' WHERE `teacherid` = '$teacherid'";
        if ($con->query($sql) === TRUE) {?>
			<?php  
			header('location: ../dashboard/admin.php');
			?>
<?php
       } else {

             echo "Gagal Melakukan Perubahan: " . $con->error;
         }
        $con->close();
}
?>


<!-- =======modal update teacher -->
<!-- <div class="modal fade" id="teachermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="update_content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="exampleModalLabel">Teacher update</h5>
			</div>
			<div class="modal-body" id="update_modal">
				<form id="update_form" method="post" action="../update_student/update_form.php">
					<input type="text" name="teacherid" id="teacherid" placeholder="Teacher ID" autocomplete="off">
					<input type="text" name="teachername" id="teachername" placeholder="Teacher Name" autocomplete="off">
					<input type="text" name="teacherlastname" id="teacherlastname" placeholder="Teacher Last Name" autocomplete="off">
					<input type="text" name="teacheraddress" id="teacheraddress" placeholder="Teacher Address" autocomplete="off">
					<input type="text" name="teacheremail" id="teacheremail" placeholder="Teacher Email" autocomplete="off">
					<input type="text" name="teacherprofession" id="teacherprofession" placeholder="Teacher Profession" autocomplete="off">
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button name="teacher_update_btn" id="teacher_update_btn" class="btn btn-primary">Save changes</button>
			
				</div>
			</div>
		</div>
	</div>
	end modal update update -->
