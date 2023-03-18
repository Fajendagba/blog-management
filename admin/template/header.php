<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include ('./config/setup.php');?>
<!DOCTYPE HTML>
<html>
	
    <head>

        <title><?php echo $page_title.' | '.$site_title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php include ('./config/css.php');?>
        <?php include ('./config/js.php');?>
        
    </head>
	
    <body>
        <div id="wrap">
            
            <?php include (D_TEMPLATE.'/navigation.php');?>