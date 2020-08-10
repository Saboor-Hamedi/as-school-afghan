<?php session_start(); ?>
<?php require_once '../Config/config.php'; ?>
<?php
   if (!isset($_SESSION['admin_nim'])){
       header('location: ../Login/Login.php');
   }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student account </title>
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../Style/admin.css">
</head>
<style>
body {
    background-color: #00203FFF;
}
</style>

<body>
    <nav id="header">
        <header>
            <!-- This is your ID which you login with  -->
            <button class="btn btn-primary btn-danger ">
                <?php echo $id = $_SESSION['admin_nim']; ?>
            </button>
            <button class="btn btn-danger btn-sm">
                <a href="../logout/logout.php" id="exit"> <i class="fas fa-sign-out-alt">
                    </i> </a>
            </button>
        </header>
    </nav>
    <!-- this seperate header from main -->
    <div class="clear_both"> </div>
    <!-- main part -->
    <main id="main">
        <section class="section_tables section_tables_student">
            <!-- =========accordion 1 =========== -->
            <div class="panel panel-default ">
                <div data-toggle="collapse" data-target="#panel1" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-user-graduate"> Students
                        </i>
                    </h4>
                </div>
                <div id="panel1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>ID </th>
                                    <th>Name </th>
                                    <th>Last Name </th>
                                    <th>Address </th>
                                    <th>Country </th>
                                    <th>Email </th>
                                    <th>Age </th>
                                </tr>
                            </thead>
                            <?php
                           $sql = "SELECT * FROM student WHERE student.NIM = $id";
                           $query = mysqli_query($con, $sql);
                           while ($result = mysqli_fetch_array($query))
                           { ?>
                            <tbody>
                                <tr>
                                    <!-- <td><?php echo $countr++; ?></td> -->
                                    <td>
                                        <?php echo $result['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['nim']; ?>
                                    </td>
                                    <td>
                                        <?php echo ucfirst($result['name']) ?>
                                    </td>
                                    <td>
                                        <?php echo $result['lastname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['country']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['age']; ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                           } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- =========accordion 2 =========== -->
            <div class="panel panel-default">
                <div data-toggle="collapse" data-target="#panel2" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-calendar-alt"> Classes
                        </i>
                    </h4>
                </div>
                <div id="panel2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                        $year = null;
                        $sql = "SELECT * FROM student
                        INNER JOIN classes ON student.nim=classes.nim
                        INNER JOIN subjects ON classes.subjectid= subjects.subjectid
                        INNER JOIN teacher ON classes.teacherid=teacher.teacherid
                        WHERE student.nim = '$id' ORDER BY classes.class_grade ";
                        ?>
                        <?php $query = mysqli_query($con, $sql);
                        $num_rows = mysqli_num_rows($query);
                        if ($num_rows == 0)
                        {
                        echo "No classes available";
                        } ?>
                        <?php while ($result = mysqli_fetch_array($query))
                        { ?>
                        <?php if ($year != ($result['class_grade'] . ' Grade ' . $result['class_grade']))
                        { ?>
                        <table class="table table-bordered table-dark">
                            <div class="grades">
                                <ul>
                                    <span>
                                        <a href="javascript:void(0)">
                                            <?php echo $result['class_grade']; ?>
                                        </a>
                                    </span>
                                </ul>
                            </div>
                            <thead>
                                <tr>
                                    <?php $year = $result['class_grade'] . ' Grade ' . $result['class_grade']; ?>
                                    <th>No </th>
                                    <th>Days </th>
                                    <th>Class grade </th>
                                    <th>Teacher Name </th>
                                    <th>Teacher ID </th>
                                    <th>Course </th>
                                    <th>Start Time </th>
                                </tr>
                            </thead>
                            <?php
                           } ?>
                            <tbody>
                                <tr bgcolor="gray">
                                    <td>
                                        <?php echo $result['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['days']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['class_grade'] ?>
                                    </td>
                                    <td>
                                        <?php echo $result['tname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['teacherid']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['subjectname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['end_time']; ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                           } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- =========accordion 3 =========== -->
            <div class="panel panel-default">
                <div data-toggle="collapse" data-target="#panel3" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-database"> Grades
                        </i>
                    </h4>
                </div>
                <?php $grades = null; ?>
                <div id="panel3" class="panel-collapse collapse">
                    <div class="panel-body student_grade">
                        <?php
                        $sql = "SELECT *  FROM student
                        INNER JOIN grades  ON student.nim=grades.nim
                        INNER JOIN subjects ON grades.subjectid=subjects.subjectid
                        INNER JOIN teacher ON grades.teacherid=teacher.teacherid
                        WHERE student.nim= '$id' ORDER BY grades.class_grade_id";
                        ?>
                        <?php $query = mysqli_query($con, $sql); ?>
                        <?php $student_count_row = mysqli_num_rows($query); ?>
                        <?php while ($result = mysqli_fetch_array($query))
                        { ?>
                        <?php if ($grades != ($result['class_grade_id'] . ' ' . $result['class_grade_id'])){ ?>
                        <table class="table table-bordered table-dark">
                            <div class="grades">
                                <ul>
                                    <span>
                                        <a href="javascript:void(0)">
                                            <?php echo $result['class_grade_id']; ?>
                                        </a>
                                    </span>

                                </ul>
                            </div>
                            <thead>
                                <tr>
                                    <th>Teacher Name </th>
                                    <th>Subject </th>
                                    <th>Total Grade </th>
                                </tr>
                            </thead>
                            <?php $grades = $result['class_grade_id'] . ' ' . $result['class_grade_id']; ?>
                            <?php
                           } ?>
                            <tbody>
                                <tr bgcolor="gray">
                                    <td>
                                        <?php echo $result['tname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['subjectname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['grade_number']; ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                           } ?>
                        </table>
                        <!-- gpa start -->
                        <?php $average_grades = null; ?>
                        <?php $avg = "
                                 SELECT *, format (avg(grade_number),1) AS average
                                 from grades where grades.nim = '$id';
                                 "; ?>
                        <?php $avg_query = mysqli_query($con, $avg); ?>
                        <?php
                                 while ($avg_row = mysqli_fetch_array($avg_query)) { ?> <span>


                            <div class="grades">
                                <ul>
                                  <span>
                                      <a href="javascript:void(0)">
                                    <?php echo $avg_row['average']; ?>
                                </a>
                                  </span>
                                </ul>
                                
                           </div>

                            </ul>
                    </div>
                    </span>
                    <?php } ?>
                    <!-- gpa end -->
                </div>
            </div>
            </div>
            <!-- =========accordion 4 =========== -->
            <div class="panel panel-default">
                <div data-toggle="collapse" data-target="#panel4" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-database"> Family data
                        </i>
                    </h4>
                </div>
                <div id="panel4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <th>No </th>
                                <th>Family ID </th>
                                <th>Name </th>
                                <th>Job </th>
                                <th>Income </th>
                            </thead>
                            <tbody>
                                <?php
                              $sql = "SELECT * FROM student
                              INNER JOIN family on student.nim=family.nim where student.nim = '$id'";
                              $query = mysqli_query($con, $sql);
                              while ($result = mysqli_fetch_array($query))
                              { ?>
                                <tr>
                                    <!-- <td><?php echo $countr++; ?></td> -->
                                    <td>
                                        <?php echo $result['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['family_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['familyname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['familyjob']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['familyincome']; ?>
                                    </td>
                                </tr>
                                <?php
                              } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- =========accordion 5 =========== -->
            <div class="panel panel-default">
                <div data-toggle="collapse" data-target="#panel5" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-database"> Parents
                        </i>
                    </h4>
                </div>
                <div id="panel5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <th>No </th>
                                <th>ID </th>
                                <th>family_id </th>
                            </thead>
                            <tbody>
                                <?php
                              $sql = "SELECT * FROM student
                              LEFT JOIN family on student.nim = family.nim
                              LEFT JOIN parent on student.nim = parent.nim
                              WHERE student.nim= '$id'";
                              $query = mysqli_query($con, $sql);
                              while ($result = mysqli_fetch_array($query))
                              { ?>
                                <tr>
                                    <td>
                                        <?php echo $result['parent_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['nim']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['family_id']; ?>
                                    </td>
                                </tr>
                                <?php
                              } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="admin_profile">
            <div class="student_forgot_password">
                <form method="POST" id="student_form_change_password">
                    <input type="password" name="old_student_password" class="old_student_password"
                        id="old_student_password" placeholder="Your old password" autocomplete="off">
                    <input type="password" name="new_student_password" class="new_student_password"
                        id="new_student_password" placeholder="New password" autocomplete="off">
                    <input type="password" name="new_student_conpassword" class="new_student_conpassword"
                        id="new_student_conpassword" placeholder="Confirm password" autocomplete="off">
                    <button type="submit" name="change-student-password" class="change-student-password"
                        id="change-student-password">Change password </button>
                    <?php include '../student_change_password/student_change_password.php'; ?>
                    <div id="success">
                        <?php echo $password_error; ?>
                    </div>
                </form>
            </div>
            <?php
               $sql = "SELECT * FROM student INNER JOIN files ON student.nim=files.nim
               INNER JOIN teacher ON files.teacherid=teacher.teacherid
               WHERE student.nim = '$id'";
               $result = mysqli_query($con, $sql);
               while ($row = mysqli_fetch_array($result))
               { ?>
            <div class="file_contents">
                <div class="file_title">
                    <h1>
                        <?php echo $row['file_title'] ?>
                    </h1>
                </div>
                <div class="file_description">
                    <?php echo $row['file_description'] ?>
                </div>
                <div class="file_attachment">
                    <a href="../docs/<?php echo $row['file_attachment'] ?>" target="_blank">
                        <?php echo $row['file_attachment'] ?>
                    </a>
                </div>
                <div class="file_date">
                    <?php echo $row['send_date'] ?>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="file_delete">
                        <a href="../files_for_student/delete_your_file.php?delete_file=<?php echo $row['file_id'] ?>">
                            <i class="fa fa-times-circle" name="delete_file_student">
                            </i> </a>
                    </div>
                </form>
            </div>
            <?php
               } ?>
        </section>
    </main>
    <script src="../query_ajax/query_ajax.js"></script>
    <script src="../query_ajax/data_query_ajax.js"></script>
</body>

</html>