
<!DOCTYPE html>
<html lang="en">
<?php require_once "../files_for_student/script_files.php" ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../Style/admin.css">
</head>
<body>
    <section class="file_container">
        <div class="file_content">
            <div class="form_file">
                <?php echo "";?>

                <div class="alert alert-secondary" id="alert-hide" role="alert">
                    <?php  if (count($file_msg) > 0) : ?>
                    <div class="error">
                        <?php foreach ($file_msg as $error) : ?>
                        <?php echo $error ?>
                        <br>
                        <?php endforeach ?>
                    </div>
                    <?php  endif ?>
                </div>
              
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <input type="text" name="student_nim" oninput="process(this)" class="student_nim" id="student_nim"
                        placeholder="Student ID: 1116093000120" value="<?php echo $student_nim;?>" autocomplete="off">
                    <input type="text" name="teacher_nim" oninput="process(this)" class="teacher_nim" id="teacher_nim"
                        placeholder="Teacher ID: 1116093000121" value="<?php echo $teacher_nim;?>" autocomplete="off">
                    <input type="text" name="book_title" class="book_title" id="book_title"
                        placeholder="What Is The Title" autocomplete="off">
                        <textarea name="file_description" placeholder="Description...."id="file_desction" cols="30" rows="10"></textarea>
                     <input type='file' name='file' class="image file" id="file" />
                    <button type="submit" name="insert_files" class="insert_files" id="insert_files">Send</button>
                </form>
            </div>
        </div>
    </section>

    <script>
    function process(input) {
        let value = input.value;
        let numbers = value.replace(/[^0-9]/g, "");
        input.value = numbers;
    }
    </script>
    <script>
    // setTimeout(() => {
    // let close = document.getElementById('alert-hide').style.display = 'none';

    // }, 1000);
    </script>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>