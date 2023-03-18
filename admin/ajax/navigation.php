<?php

include('../../config/connection.php');

$label    = mysqli_real_escape_string($dbc, $_POST['label']);
$url      = mysqli_real_escape_string($dbc, $_POST['url']);

$action = 'updated';
$q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', target = '$_POST[target]', status = '$_POST[status]' WHERE id = '$_POST[openedid]'";
$r = mysqli_query($dbc, $q);

if ($r) {
    echo '<p class="alert alert-success">Navigation Was '. $action.'</p>';
} else {
    echo '<p class="alert alert-warning">Navigation could not be '.$action.' added because:</p>'. mysqli_error($dbc);                
    echo '<p class="alert alert-warning"> Query: '.$q.'</p>';
}

?>