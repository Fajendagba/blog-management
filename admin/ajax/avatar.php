<?php
include ('../config/connection.php');

$id = $_GET['id'];

$q = "SELECT avatar FROM user WHERE id = $id";
$r = mysqli_query($dbc, $q);

if($r) {
    $data = mysqli_fetch_assoc($r); 
    echo "<h1>Upload successful</h1>";
} else {
    echo '<h1>There was an error...</h1><br>';
    echo $q.'<br>';
    echo mysqli_error($dbc);
}


?>

<div class="avatar-container" style="background-image: url('uploads/<?php echo $opened['avatar'];?>')"></div>