<style>
    .modal-content {
        margin: auto;
        width: 350px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .modal-body {
        width: 100%;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .modal-body input {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 300px;
        padding: 5px;
        margin: 10px;
    }

    .modal-body select {
        width: 300px;
        padding: 5px;
        margin-top: 5px;
        margin-left: 10px;
    }

    .modal-title {
        color: white;
        font-size: 20px;
        text-align: center;
    }

    .close {
        color: white;
    }
    .select_div{
        margin-bottom: 0.3rem;
    }
</style>

<?php require_once '../Config/config.php';?>
<!-- Insert family -->
<div class="modal fade" id="family_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="add-modal">
            <div class="modal-header">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                <h5 class="modal-title" id="exampleModalLabel">New Family</h5>
            </div>
            <div class="modal-body" id="modal-center-body">
                <form method="POST" id="familyform">
                    <select name="familyid" id="familyid">
                        <option value="0" name="select_id_drop">Select ID</option>
                        <?php $family_sql = "SELECT * FROM student"; ?>
                        <?php $fmaily_result = $con->query($family_sql);?>
                        <?php if($fmaily_result->num_rows > 0 ){ while($family_row=mysqli_fetch_array($fmaily_result)){?>
                        <option value="<?php echo $family_row['nim']; ?>"><?php echo $family_row['nim']; ?> </option>
                        <?php } }?>
                    </select>
                    <input type="text" name="familyname" id="familyname" placeholder="Enter Father Name" />
                    <input type="text" name="familyjob" id="familyjob" placeholder="Enter Father Job" />
                    <input type="text" name="familyincome" id="familyincome" placeholder="Enter Father income" />
                    <input type="submit" name="family_insert_btn" id="family_insert_btn" value="Insert" class="btn btn-success family_insert_btn" />
                </form>
            </div>
            <script></script>
        </div>
    </div>
</div>

<!-- Family form parent -->
<div class="modal fade" id="parent_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="add-modal">
            <div class="modal-header">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                <h5 class="modal-title" id="exampleModalLabel">New Parent</h5>
            </div>
            <div class="modal-body" id="modal-center-body">
                <form method="post" action="../family_insert/parent_insert.php" id="parent-modal">
                    <select name="parentnim" id="parentnim">
                        <option value="0">Select ID</option>
                        <?php
                         $parent_sql = "SELECT * FROM family";
                         $parent_query = mysqli_query($con, $parent_sql);
                         while($parent_result = mysqli_fetch_array($parent_query)){?>
                        <option value=" <?php echo $parent_result['nim']?>"> <?php echo $parent_result['nim']?></option>
                        <?php }?>
                    </select>

                    <select name="parent_insert_id" id="parent_insert_id">
                        <option value="0">Select ID</option>
                        <?php
                         $parent_sql = "SELECT * FROM family";
                         $parent_query = mysqli_query($con, $parent_sql);
                         while($parent_result = mysqli_fetch_array($parent_query)){?>
                        <option value=" <?php echo $parent_result['family_id']?>"> <?php echo $parent_result['family_id']?></option>
                        <?php }?>
                    </select>

                    <input type="submit" name="parent_insert_btn" id="parent_insert_btn" class="btn btn-success" value="Insert" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Schedule Insert -->
<div class="modal fade" id="insert_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="add-modal">
            <div class="modal-header">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                <h5 class="modal-title" id="exampleModalLabel">New Schedule</h5>
            </div>
            <div class="modal-body" id="modal-center-body">
                <form method="POST" id="schedule_modal">
                    <select name="schedule_student_id" id="schedule_student_id">
                        <option value="0">Choose Student ID</option>
                        <?php  $sql = "SELECT * FROM student";
                            $query = mysqli_query($con, $sql);
                            while ($result1 = mysqli_fetch_array($query)) {?>
                        <option name="schedule_student_id" value="<?php echo $result1['nim']?>"><?php echo $result1['nim']?> </option>
                        <?php }?>
                    </select>
                    <!-- ===========subjects========== -->
                    <select name="choose_subject" id="choose_subject">
                        <option value="0">Choose Your Subject</option>
                        <?php
                             $sql = "SELECT * FROM subjects";
                            $query = mysqli_query($con, $sql);
                            while ($subjectid = mysqli_fetch_array($query)) {?>
                        <option name="choose_subject" value="<?php echo $subjectid['subjectid']?> "> <?php  echo $subjectid['subjectname'] . ": " .$subjectid['subjectid']?> </option>
                        <?php }?>
                    </select>
                    <!-- =============================== -->
                    <select name="choose_teacher" id="choose_teacher">
                        <option value="0">Choose The Teacher</option>
                        <?php
                           $sql = "SELECT * FROM teacher";
                            $query = mysqli_query($con, $sql);
                            while ($teacher_id = mysqli_fetch_array($query)) {?>
                        <option name="choose_teacher" value="<?php echo $teacher_id['teacherid']?> "> <?php  echo $teacher_id['teacherid']?> </option>
                        <?php }?>
                    </select>
                    <!-- ======================================== -->
                    <!-- ================== -->
                    <select name="class_id" id="class_id">
                        <option value="0">Select Class</option>
                        <?php 
                        $class_grade = "SELECT * FROM class_grade_student ";
                        $class_query = mysqli_query($con, $class_grade);
                        while($class_row = mysqli_fetch_array($class_query)){?>
                        <option value="<?php echo $class_row['class_grade'];?>"><?php echo $class_row['class_grade']; ?></option>
                        <?php } ?>
                    </select>
                    <!-- <input type="text" name="day_time" value="<?php echo $day_time;?>" placeholder="Enter Day"> -->
                    <select name="choose_day" id="choose_day">
                        <option value="0">Select days</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                    <input type="datetime-local" class="time" name="start_time" value="<?php echo $start_time;?>" placeholder="Enter Start time" />
                    <input type="datetime-local" class="time" name="end_time" value="<?php echo $end_time;?>" placeholder="Enter End time" />
                    <input type="submit" value="Insert" name="insert_schedule_btn" id="insert_schedule_btn" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- insert teacher -->
<div class="modal fade" id="teacher_insert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="add-modal">
            <div class="modal-header">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                <h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
            </div>
            <div class="modal-body" id="modal-center-body">
                <form method="post" id="teacher_modal">
                    <input type="hidden" name="teacher_add_nim" id="teacher_add_nim" placeholder="ID" value="<?php echo random_number (14); ?>" autocomplete="off" />
                    <input type="text" name="teacher_add_name" id="teacher_add_name" placeholder="Name" autocomplete="off" />
                    <input type="text" name="teacher_add_lname" id="teacher_add_lname" placeholder="Last Name" autocomplete="off" />
                    <input type="text" name="teacher_add_address" id="teacher_add_address" placeholder="Address" autocomplete="off" />
                    <input type="text" name="teacher_add_email" id="teacher_add_email" placeholder="Country" autocomplete="off" />
                    <select name="teacher_add_profession" id="teacher_add_profession">
                        <option value="0">Select Professions</option>
                        <?php
                           $sql = "SELECT * FROM professions";
                            $query = mysqli_query($con, $sql);
                            while ($subjectid = mysqli_fetch_array($query)) {?>
                        <option name="teacher_add_profession" value="<?php echo $subjectid['profession_name']?> ">
                            <?php  echo $subjectid['profession_name']?>
                        </option>
                        <?php }?>
                    </select>
                    <input type="password" name="teacher_add_pass" id="teacher_add_pass" placeholder="Enter password" autocomplete="off" />
                    <input type="submit" value="Insert" name="teacher_add_btn" id="teacher_add_btn" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- insert student -->
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog-centered" role="document">
        <div class="modal-content" id="insert-contents">
            <div class="modal-header" id="modal-headers">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>

                <h5 class="modal-title" id="modal-titles">Insert New Student record</h5>
            </div>
            <div class="modal-body" id="insert_modal modal-center-body">
                <form method="post" action="../insert_student/insert_student.php" id="insert_form">
                    <input type="hidden" name="nim" id="nim" class="form-control" placeholder="Enter Studnet ID" autocomplete="off" value="<?php echo random_number (14); ?>" />
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Student Name" autocomplete="off" />
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Student Last Name" autocomplete="off" />
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Student Adress" autocomplete="off" />
                    <input type="text" name="email_student" id="email_student" class="form-control" placeholder="Email" autocomplete="off" />
                    <input type="text" name="age" id="age" class="form-control" placeholder="Age" autocomplete="off" />
                    <input type="text" name="country_student" id="country_student" class="form-control" placeholder="Country" autocomplete="off" />
                    <input type="password" name="student_password" id="student_password" class="form-control" placeholder="Password" autocomplete="off" />
                    <input type="submit" name="student_insert_data" id="student_insert_data" value="Insert" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end student -->

<!-- Insert grades -->
<div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                <h5 class="modal-title" id="exampleModalLabel">Insert Grade</h5>
            </div>
            <div class="modal-body" id="modal-center-body">
                <form method="POST" id="grade_form">
                    <input type="text" name="number_grade" class="number_grade" id="number_grade" placeholder="Grade like: 90.9 : 49.1 : 80 : 100..." autocomplete="off" oninput="process(this)" />
                    <!-- <select name="select_grade_number" class="select_grade_number" id="select_grade_number">
                        <option value="0" name="grade_character" class="grade_character" id="grade_character">Select grade for student</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                    </select> -->
                    <input type="text" name="grade_student_id" class="grade_student_id" id="grade_student_id" value="" placeholder="Enter your student id..." autocomplete="off" oninput="process(this)" />
                    <input type="text" name="grade_teacher_id" class="grade_teacher_id" id="grade_teacher_id" value="" placeholder="Enetr your id..." autocomplete="off" oninput="process(this)" />

                   <div class="select_div">
                   <select name="select_grade_subjects" id="select_grade_subjects" class="select_grade_subjects">
                        <option value="0">Select Subjects</option>
                        <?php
                        $sql = "SELECT * FROM subjects";
                        $query = mysqli_query($con, $sql);
                        while ($grade_row = mysqli_fetch_array($query)) {?>
                        <option value="<?php echo $grade_row['subjectid']?> "> <?php  echo $grade_row['subjectname'] . "- code -".  $grade_row['subjectid']; ?></option>

                        <?php }?>
                    </select>
                   </div>
                   <div>
                   <select name="select_grade_student" class="select_grade_student" id="select_grade_student">
                        <option value="0">Select student class</option>
                        <option value="1">Grade one</option>
                        <option value="2">Grade two</option>
                        <option value="3">Grade three</option>
                        <option value="4">Grade four</option>
                        <option value="5">Grade five</option>
                        <option value="6">Grade six</option>
                        <option value="7">Grade seven</option>
                        <option value="8">Grade eight</option>
                        <option value="9">Grade nine</option>
                        <option value="10">Grade ten</option>
                        <option value="11">Grade eleven</option>
                        <option value="12">Grade twelve</option>
                    </select>
                   </div>
                    <input type="submit" value="Insert" name="insert_new_grade_student_btn" class="btn btn-success insert_grade" id="insert_new_grade_student_btn" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- add subjects -->
<div class="modal fade" id="subjectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">New Subject</h5>
            </div>
            <div class="modal-body" id="modal-center-body">
                <form method="POST" id="subject-modal-form">
                    <input type="hidden" name="select_subject_all" class="select_subject_all" id="select_subject_all" value="<?php echo random_number (5); ?>" placeholder="Enter unique id for subject" autocomplete="off" />
                    <!-- <input type="text" name="subjectname" class="subjectname" id="subjectname" placeholder="Enter subject name" autocomplete="off"> -->
                    <select name="all_subjectname" id="all_subjectname">
                        <option value="0">Select Subjects</option>
                        <?php 
    
                        $select_sub = "SELECT * FROM all_subjects";
                        $subject_query = mysqli_query($con, $select_sub);
                        while($subject_row = mysqli_fetch_array($subject_query)){?>
                        <option value="<?php echo $subject_row ['all_subjectname']; ?>"> <?php echo $subject_row ['all_subjectname']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="all_subject_id" class="all_subject_id" id="all_subject_id" value="<?php echo Random_class_code(4)?>" placeholder="Enter unique code for subject" autocomplete="off" />
                    <input type="submit" value="Insert" class="insert_subject" id="insert_subject" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>
</div>

<!-- insert classes  -->

<div class="modal fade" id="classesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">New Class</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="../insert_classes/insert_classes.php " id="class-modal-form">
                    <select name="class_grade_number_1" id="class_grade_number_1">
                        <option value="0">Select class grades</option>
                        <?php 
                        $class_grade = "SELECT * FROM class_grade_student ";
                        $class_query = mysqli_query($con, $class_grade);
                        while($class_row = mysqli_fetch_array($class_query)){?>
                        <option value="<?php echo $class_row['class_grade'];?>"><?php echo $class_row['class_grade']; ?></option>
                        <?php } ?>
                    </select>

                    <!-- this is class id which has random number -->
                    <input type="hidden" name="class_code_number_2" class="class_code_number_2" id="class_code_number_2" placeholder="Enter unique class code" value="<?php echo random_number (5); ?>" autocomplete="off" />
                    <!-- this is class code which has random character -->
                    <input type="hidden" name="class_name_number_3" class="class_name_number_3" id="class_name_number_3" placeholder="Enter class name" value="<?php echo Random_class_code(4); ?>" autocomplete="off" />

                    <select name="days_class" id="days_class">
                        <option value="0">Select a day</option>
                        <option value="Moday">Molday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                    <select name="class_start_time" id="datepicker">
                     <option value="0">Select Academic Year</option>
                     <?php 
                        $sql = "SELECT * FROM years";
                        $query = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_array($query)){ ?>
                            <option value="<?php echo $row['year_name']; ?>"><?php echo $row['year_name'];?></option>
                       <?php } ?>
                    </select>
                   
                     
                    <!-- <input type="datetime-local" id="datepicker" class="time" name="class_start_time" value="<?php $class_start_time ?>" /> -->

                    <input type="datetime-local" class="time" name="class_end_time" value="<?php $class_end_time?>" />

                    <select name="class_subject_id" id="class_subject_id">
                        <option value="0">Select Subject</option>
                        <?php 
                        $sql = "SELECT * FROM subjects";
                        $query = mysqli_query($con, $sql);
                        while ($grade_row = mysqli_fetch_array($query)) {?>
                        <option value="<?php echo $grade_row['subjectid']?> "> <?php  echo $grade_row['subjectname'] . " - code - ".  $grade_row['subjectid']; ?></option>
                        <?php  } ?>
                    </select>

                    <!-- teachers -->
                    <select name="class_teacher_id" id="class_teacher_id">
                        <option value="0">Select Teacher</option>
                        <?php 
         
                    $sql = "SELECT * FROM teacher";
                    $query = mysqli_query($con, $sql);
                    while ($grade_row = mysqli_fetch_array($query)) {?>
                        <option value="<?php echo $grade_row['teacherid']?> "> <?php  echo $grade_row['tname'] . " - code - ".  $grade_row['teacherid']; ?></option>
                        <?php  } ?>
                    </select>

                    <!-- student -->
                    <select name="class_student_id" id="class_student_id">
                        <option value="0">Select Student</option>
                        <?php 

                    $sql = "SELECT * FROM student";
                    $query = mysqli_query($con, $sql);
                    while ($grade_row = mysqli_fetch_array($query)) {?>
                        <option value="<?php echo $grade_row['nim']?> "> <?php  echo $grade_row['name'] . " - code - ".  $grade_row['nim']; ?></option>
                        <?php  } ?>
                    </select>
                    <input type="submit" value="Insert" name="insert_class_subjects" id="insert_class_subjects" class="btn btn-success insert_class_subjects" />
                </form>
            </div>
        </div>
    </div>
</div>

<?php
  //    random number
  function random_number($length = 14)
  {
      $number = '';
      for ($i = 0; $i < $length; $i++) $number .= mt_rand(0,9);
      return $number;
  }
  ?>

<?php 
  function Random_class_code($length = 10) {
    $characters = '1abcdefghijk6lmnop7qrstuvwxyzABCD67EFGHIJKLM45NOPQRSTUVWXYZ4589';
 
     $charactersLength = strlen($characters);
   
     $randomString = '';
     for ($i = 0; $i < $length; $i++) {
         $randomString .= strtoupper($characters) [rand(0, $charactersLength - 1)];
     }
     return $randomString;
 }
  ?>
