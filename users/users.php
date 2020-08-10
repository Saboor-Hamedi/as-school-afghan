<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
    
    <link rel="stylesheet" href="../Style/admin.css">
</head>

<body>

    <section class="add_admin_user">
        <section class="section-form">
            <div class="form-content">
                <!-- action="../admin_insert/admin_insert.php" -->
                <h3>Add new Admin</h3>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="admin_form"
                    enctype='multipart/form-data'>
                    <input type="text" name="admin_nim" id="admin_nim" placeholder="Enter admin ID..."
                        value="<?php  echo randomNumberSequence(14,9);?>" autocomplete="off" oninput="process(this)" />
                    <input type="text" name="admin_name" id="admin_name" placeholder="Enter admin name..."
                        autocomplete="off" />
                    <input type="text" name="admin_email" id="admin_email" placeholder="Enter admin email..."
                        autocomplete="off" />
                    <input type="password" name="admin_pass" id="admin_pass" placeholder="Enter admin password..."
                        autocomplete="off" />
                    <input type="password" name="admin_conpass" id="admin_conpass"
                        placeholder="Enter admin confirm password..." autocomplete="off" />
                    <input type='file' name='file' class="image file" id="file" />
                    <button type="submit" name="admin_insert" class="admin_insert btn btn-success" id="admin_insert">New
                        Admin</button>
                    <?php randomNumberSequence(14,9);?>
                </form>
            </div>
        </section>
       
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="../query_ajax/query_ajax.js"></script>
	<script src="../query_ajax/data_query_ajax.js"></script>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>



</html>


<?php
function randomNumberSequence($requiredLength , $highestDigit ) {
    $sequence = '';
    for ($i = 0; $i < $requiredLength; ++$i) {
        $sequence .= mt_rand(3, $highestDigit);
    }
    return $sequence;
}

$numberPrefixes = ['2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011','2010'];
for ($i = 0; $i <1; ++$i) {
    // echo $numberPrefixes[array_rand($numberPrefixes)] , randomNumberSequence(13,9) , "\n";
    
}

?>