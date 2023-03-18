<?php

include('../../config/connection.php');

$list = $_GET['list'];

foreach ($list as $position => $id) {
    $q = "UPDATE navigation SET position=$position WHERE id = $id";
    $r = mysqli_query($dbc, $q);

    if($r) {
    echo "<h1>Update successful</h1>";
    } else {
        echo '<h1>There was an error...</h1><br>';
        echo $q.'<br>';
        echo mysqli_error($dbc);
    }
	
}

   
?>

