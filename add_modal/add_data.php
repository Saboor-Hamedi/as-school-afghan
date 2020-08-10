<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
	<link rel="stylesheet" href="../Style/admin.css">



</head>
<style>
* {
	margin: 0;
	padding: 0;
}
body{
	background-color: #00203f;
}

</style>

<body>
	<section>
		<div class="">
			<div class="left">
				<div class="btn btn-primary family" data-toggle="modal" data-target="#family_modal">Add Family</div>
				<br>
				<div class="btn btn-primary family" data-toggle="modal" data-target="#parent_modal">Add Parent</div>
			
				<!-- <div class="btn btn-primary family" data-toggle="modal" data-target="#insert_schedule_modal">New Time table</div> -->
				<br>
				<div class="btn btn-primary family" data-toggle="modal" data-target="#teacher_insert_modal">New Teacher</div>
				<br>
				
				<div class="btn btn-primary family" class="btn btn-primary" data-toggle="modal" data-target="#classesmodal">
				Add Class
				</div>
				<br>
				<div class="btn btn-primary family"  data-toggle="modal" data-target="#gradeModal">Add grade</div>
				<br>
				<div class="btn btn-primary btn-xs family" data-toggle="modal" data-target="#subjectmodal">New subject</div>
			
			</div>
			<div class="splitter"></div>
			<div class="right">
				<h1>A.S private high school</h1>
			</div>
		</div>
	</section>

	<script src="../query_ajax/data_query_ajax.js"></script>
	<?php include('../modals/modals.php'); ?>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="../query_ajax/query_ajax.js"></script>
	<script src="../query_ajax/data_query_ajax.js"></script>

</html>
