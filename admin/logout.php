<?php

session_start();

unset($_SESSION['username']);#Deletes the username key
/*
 * session_unset($_SESSION['username']); same as unset
 * session_destroy();  Deletes all session keys
*/

header("Location: login.php");

?>