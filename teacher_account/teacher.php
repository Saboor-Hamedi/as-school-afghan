<?php require_once '../Config/config.php'; ?>
<?php

if (isset($_GET['load_teacher'])) {
    $id = $_GET['load_teacher']; 
 }else{
     echo 'Not';
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher account</title>
	<script src="../query/query1.js"></script>
	<script src="../query/query2.js"></script>
	<link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
	<link rel="stylesheet" href="../bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../Style/general_style.css">
</head>

<body >

	<section>
		<!-- =========accordion 1 =========== -->
		<div class="panel panel-default ">
			<div data-toggle="collapse" data-target="#panel1" class="panel-heading collapsed">
				<h4 class="panel-title">
					<i class="fas fa-user-graduate"> Teacher </i>
				</h4>
			</div>
			<div id="panel1" class="panel-collapse collapse">
				<div class="panel-body">
					<table class="center-alig">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Name</th>
								<th>Last name</th>
								<th>Address</th>
								<th>Country</th>
								<th>Professions</th>
							
							</tr>
						</thead> <?php

            $sql = "SELECT * FROM teacher WHERE teacher.teacherid = $id";
                $query = mysqli_query($con, $sql);
                while ($result = mysqli_fetch_array($query)) {?> <tbody>
							<tr>
								<td><?php echo $result['tec_id']; ?></td>
								<td><?php echo $result['teacherid'] ?></td>
								<td><?php echo $result['tname'];?></td>
								<td><?php echo $result['lastname'];?></td>
								<td><?php echo $result['address'];?></td>
                                <td><?php echo $result['country'];?></td><td>
								<?php echo $result['profession'];?></td>
							</tr>
						</tbody> 
                        <?php }?>
					</table>
				</div>
			</div>
		</div>
		
	<!-- =========accordion 2 =========== -->
	<div class="panel panel-default">
            <div data-toggle="collapse" data-target="#panel2" class="panel-heading collapsed">
                <h4 class="panel-title">
                    <i class="fas fa-calendar-alt"> Classes </i>
                </h4>
            </div>
            <div id="panel2" class="panel-collapse collapse">
                <div class="panel-body">
					<?php $teacher_counter = 0;?>
					<?php $years =  null;?>
					<?php $teacher_sql = "SELECT * FROM teacher
                     INNER JOIN classes ON teacher.teacherid= classes.teacherid
					 INNER JOIN years ON classes.start_time = years.year_name
					 INNER JOIN subjects ON classes.subjectid=subjects.subjectid
                     WHERE teacher.teacherid = '$id' ORDER BY year_name 
					";?> 
					<?php $teacher_query = mysqli_query($con, $teacher_sql);?>
					<?php $teacher_row_count = mysqli_num_rows($teacher_query);?>
					<?php if($teacher_row_count == 0){
						echo "No class registrate yet";
					} ?>
			
				<?php while($teacher_found = mysqli_fetch_array($teacher_query)){?>
					<?php if($years !=($teacher_found['year_name'] . ' Years ' . $teacher_found['start_time'])){?>	
						<table class="table table-bordered table-dark">					
						 <thead>
						<tr>
						<?php $years = $teacher_found['year_name'] . ' Years ' . $teacher_found['start_time'];?>
							<th>No</th>
							<th>Class grade</th>
							<th>Class code</th>
							<th>Years</th>
							<th>Subjects</th>
						</tr>
						 <div class="grades">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)"><?php echo $teacher_found  ['class_grade'];?> </a>
                                </li>
                            </ul>
							<span> <a href="javascript:void(0)"><?php echo $teacher_found  ['start_time'];?> </a></span>
                        </div>
						</thead>
						<?php }?>
						<tbody>
							<tr>
								<td><?php echo $teacher_found ['id'];?></td>
								<td><?php echo $teacher_found ['class_grade'];?></td>
								<td><?php echo $teacher_found ['class_code'];?></td>
								<td><?php echo $teacher_found ['start_time'];?></td>
								<td><?php echo $teacher_found ['subjectname'];?></td>
							</tr>
						</tbody>
						 <?php } ?>
						</table>
						
                </div>
            </div>
        </div>
		<!-- =========accordion 3 =========== -->
		<!-- ================ -->
	</section>
	<!-- end footer -->
</body>
<script>
// $("#admin_edge").click(function () {
//     var div = $("#admin_setting");
//     div.width(div.width()== 300 ? 0 : 300);
// });
</script>
<script>
$(".panel .panel-collapse").on('shown.bs.collapse', function() {
	var active = $(this).attr('id');
	var panels = localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels);
	if($.inArray(active, panels) == -1) //check that the element is not in the array
		panels.push(active);
	localStorage.panels = JSON.stringify(panels);
});
$(".panel .panel-collapse").on('hidden.bs.collapse', function() {
	var active = $(this).attr('id');
	var panels = localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels);
	var elementIndex = $.inArray(active, panels);
	if(elementIndex !== -1) //check the array
	{
		panels.splice(elementIndex, 1); //remove item from array
	}
	localStorage.panels = JSON.stringify(panels); //save array on localStorage
});
var panels = localStorage.panels === undefined ? new Array() : JSON.parse(localStorage.panels); //get all panels
for(var i in panels) { //<-- panel is the name of the cookie
	if($("#" + panels[i]).hasClass('panel-collapse')) // check if this is a panel
	{
		$("#" + panels[i]).collapse("show");
	}
}
</script>

</html>