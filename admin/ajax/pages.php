<?php

include('../../config/connection.php');
//echo $_GET['id'];

$id = $_GET['id'];
 
    
$q = "DELETE FROM posts WHERE id=$id";
$r = mysqli_query($dbc, $q);

if($r) {
    echo "<h1>Page Deleted</h1>";
} else {
    echo '<h1>There was an error...</h1><br>';
    echo $q.'<br>';
    echo mysqli_error($dbc);
}
   
?>

