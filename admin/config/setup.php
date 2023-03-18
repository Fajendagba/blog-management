<?php
error_reporting(0);

# Database connection HERE...
//$dbc = mysqli_connect('localhost', 'mirror', 'mirror', 'mirror_series') or
//         die('Could not connect to database because: '. mysqli_connect_error());

# Constants ...
DEFINE('D_TEMPLATE', 'template');

#Including the functions folder
include('connection.php');
include ('./functions/data.php');
include ('./functions/template.php');
include ('./functions/sandbox.php');

# Site Settings
$debug = data_settings_value($dbc, 'debug-status');
$site_title = 'Mirror';
$page_title = $page['title'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'dashboard';
}


# Page Setup #This is the insert and update query from the submitted hidden input
include ('queries.php');


/*
 * If Home or about is clicked, it would send an id
 * we use the $_GET array to get the ID
 * So if an id is sent then the data_page fuction
 * displays the info in the column of the selected id
 */


$user = data_user($dbc, $_SESSION['username']);


?>