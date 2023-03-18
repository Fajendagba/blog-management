<?php
include ('../config/connection.php');

$id = $_GET['id'];

$ds          = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'uploads';   //2

$ext     = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$newname = time();
$random  = rand(1000, 9099);
$name    = $random.$newname.'.'.$ext;

$q = "UPDATE user SET avatar = '$name' WHERE id = $id";
$r = mysqli_query($dbc, $q);

echo $q.'<br>';
echo mysqli_error($dbc);

if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $name;//Formerly used $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}
?>  