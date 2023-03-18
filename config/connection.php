<?php

# Database connection HERE...
$dbc = mysqli_connect('localhost', 'root', '', 'mirror_series') or
        die('Could not connect to database because: '. mysqli_connect_error());

?>