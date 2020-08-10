<?php
 if(isset($_POST["employee_id"]))
 {
      $output = '';
        require_once '../Config/config.php';
      $query = "SELECT * FROM student WHERE NIM = '".$_POST["employee_id"]."'";
      $result = mysqli_query($con, $query);
?>
<?php    while($result1 = mysqli_fetch_array($result)){?>
    <head>

    </head>
    <table class="center-alig">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Nationality</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Grade</th>

                </tr>
            </thead>
            <tbody>
<tr>
    <td><?php echo $result1['NIM']; ?></td>
    <td><?php echo $result1['name']; ?></td>
    <td><?php echo $result1['lastname']; ?></td>
    <td><?php echo $result1['address']; ?></td>
    <td><?php echo $result1['nationality']; ?></td>
    <td><?php echo $result1['email']; ?></td>
    <td><?php echo $result1['age']; ?></td>
    <td><?php echo $result1['class_id']; ?></td>
</tr>
</tbody>
</table>
<?php } ?>

<?php } ?>