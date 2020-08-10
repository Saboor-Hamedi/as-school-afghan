<style>
.modal-content{
            margin: auto;
            width: 350px;        
            background-color: rgba(0,0,0,0.100);   
        }
        .modal-body{
            width:100%;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0,0,0,0.1);   
        }
        .modal-body input, select {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            padding: 5px;
            margin: 10px;
        }
		.modal-body  select {
           
            width: 300px;
            padding: 5px;
            margin: 10px;
        }
        .modal-title {
    color: white;
    font-size: 20px;
    text-align: center;

}

/* end update moda */
</style>
<!-- student update -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="update_content">
			<div class="modal-header" id="modal-headers">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
	</button>
		<h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
	</div>
	<div class="modal-body" id="update_modal">
	<form id="update_form" method="post" action="../update_student/update_form.php">
	<input type="hidden" name="updateidnim" id="updateidnim" placeholder="Student ID" autocomplete="off">
		<input type="text" name="updatenim" id="updatenim" placeholder="Student ID" autocomplete="off">
		<input type="text" name="updatename" id="updatename" placeholder="First Name" autocomplete="off">
		<input type="text" name="updatelname" id="updatelname" placeholder="Last Name" autocomplete="off">
		<input type="text" name="updateaddress" id="updateaddress" placeholder="Adddress" autocomplete="off">
		<input type="text" name="updateemail" id="updateemail" placeholder="Student Email" autocomplete="off">
		<input type="text" name="updateage" id="updateage" placeholder="Student Age" autocomplete="off">
		<input type="text" name="updatecountrystudent" id="updatecountrystudent" placeholder="Country" autocomplete="off">
		<input type="password" name="updatepassword" id="updatepassword" placeholder="Student Password" >
		<input type="submit" value="Update" name="student_update_btn" id="student_update_btn" class="btn btn-primary">
	</form>
		</div>
	</div>
</div>
</div>
<!-- ======================================== -->
<!-- teacher update -->
<div class="modal fade" id="teachermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="update_content">
			<div class="modal-header" id="modal-headers">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h5 class="modal-title" id="exampleModalLabel">Update Teacher</h5>
			</div>
			<div class="modal-body" id="update_modal">
				<form id="update_form" method="post" action="../teacher_update/teacher_form_update.php">
				<input type="hidden" name="tec_id" id="tec_id" placeholder="Teacher ID" autocomplete="off">
					<input type="text" name="teacherid" id="teacherid" placeholder="Teacher ID" autocomplete="off">
					<input type="text" name="teachername" id="teachername" placeholder="Teacher Name" autocomplete="off">
					<input type="text" name="teacherlastname" id="teacherlastname" placeholder="Teacher Last Name" autocomplete="off">
					<input type="text" name="teacheraddress" id="teacheraddress" placeholder="Teacher Adddress" autocomplete="off">
					<input type="text" name="teacheremail" id="teacheremail" placeholder="Teacher country" autocomplete="off">
					<input type="text" name="teacherprofession" id="teacherprofession" placeholder="Teacher Professions" autocomplete="off">
					<input type="submit"  value ="Update" name="teacher_update_btn" id="teacher_update_btn" class="btn btn-primary">
					<script>
					</script>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ======================================== -->
<!-- Schedule udpate -->
<div class="modal fade" id="schedulemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="update_content">
			<div class="modal-header" id="modal-headers">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
			</div>
			<div class="modal-body" id="update_modal">
				<form id="update_form" method="post" action="../schedule_update/schedule_form_update.php">
					<input type="hidden" name="timetableid" id="timetableid" placeholder="Time table ID">
					<input type="text" name="studentid" id="studentid" placeholder="Student ID">
					<input type="text" name="subjectid" id="subjectid" placeholder="Subject ID">
					<input type="text" name="teachersid" id="teachersid" placeholder="Teacher ID">
					<input type="text" name="class_id" id="class_id" placeholder="Class grade">
					<select name="days" id="days">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
					</select>
					<input type="text" name="starttime" id="starttime" placeholder="Start Class time">
					<input type="text" name="endtime" id="endtime" placeholder="End class time">
					<input type="submit"  value="Update"name="schedule_update_btn" id="schedule_update_btn" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ======================================== -->
<!-- Fmaily udpate -->
<div class="modal fade" id="familymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="update_content">
			<div class="modal-header" id="modal-headers">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h5 class="modal-title" id="exampleModalLabel">Update Family</h5>
			</div>
			<div class="modal-body" id="update_modal">
				<form id="update_form" method="post" action="../family_insert/family_update.php">
					<input type="text" name="family_id_auto" id="family_id_auto" placeholder="Main ID">
					<input type="text" name="familystudentid" id="familystudentid" placeholder="Student ID">
					<input type="text" name="familyfatherid" id="familyfatherid" placeholder="Family ID">
					<input type="text" name="familyfathername" id="familyfathername" placeholder="Family Name ">
					<input type="text" name="familyfatherjob" id="familyfatherjob" placeholder="Family Job ">
                    <input type="submit"   value="Insert" name="family_update_btn" id="family_update_btn" class="btn btn-primary">

				</form>
			</div>
		</div>
	</div>
</div>
<!-- ======== start modal insert =========  -->
      