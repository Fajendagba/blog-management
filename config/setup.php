<?php
error_reporting(0);
# Database connection HERE...
include ('connection.php');

# Constants ...
DEFINE('D_TEMPLATE', 'template');
DEFINE('D_VIEWS', 'views');

#Including the functions folder
include ('./functions/data.php');
include ('./functions/template.php');
include ('./functions/sandbox.php');

# Site Settings
$debug = data_settings_value($dbc, 'debug-status');

$path = get_path();

$site_title = 'Mirror';
$page_title = $page['title'];

if (!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
	
    header("Location: home");
	
    //$path['call_parts'][0] = 'home'; # Set $path['call_parts'][0] 
    //to equal the value given in the URL
    #$pageid = $_GET['page']; No more used
}

# Page Setup 
$page = data_post($dbc, $path['call_parts'][0]);

$view = data_post_type($dbc, $page['type']);

?>
