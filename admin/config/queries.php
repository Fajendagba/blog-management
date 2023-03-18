<?php

switch ($page) {
    
    case 'pages':
        if (isset($_POST['submitted'])==1) {
            $label  = mysqli_real_escape_string($dbc, $_POST['label']);
            $title  = mysqli_real_escape_string($dbc, $_POST['title']);
            $header = mysqli_real_escape_string($dbc, $_POST['header']);
            $body   = mysqli_real_escape_string($dbc, $_POST['body']);
            $slug   = mysqli_real_escape_string($dbc, $_POST['slug']);
            $user   = mysqli_real_escape_string($dbc, $_POST['user']);

            if (isset($_POST['id'])!='') {
                $action = 'updated';
                $q = "UPDATE posts SET user = '$user', slug = '$slug', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
            } else {
                $action = 'added';
                $q = "INSERT INTO posts (type, user, slug, title, label, header, body) VALUES (1, '$_POST[user]', '$_POST[slug]', '$title', '$label', '$header', '$body')";
            }

            $r = mysqli_query($dbc, $q);

            if ($r) {
                $message = '<p>Page Was '. $action.'</p>';
            } else {
                $message = '<p>Page could not be '.$action.' added because</p>'. mysqli_error($dbc);
                $message .= '<p>'.$q.'</p>';
            }
        }
        
        if (isset($_GET['id'])) {
            $opened = data_page($dbc, $_GET['id']); // data_page function in inside the functions folder data.php
        }
    break;
    
    case 'users':
        if (isset($_POST['submitted'])==1) {
            $first    = mysqli_real_escape_string($dbc, $_POST['first']);
            $last     = mysqli_real_escape_string($dbc, $_POST['last']);
            $email    = mysqli_real_escape_string($dbc, $_POST[email]);
            $status   = $_POST['status'];
            
            if ($_POST['password'] != '') {
                if ($_POST['password'] == $_POST['passwordv']) {
                    $password = " password = SHA1('$_POST[password]'),";
                    $verify =  true;
                } else {
                    $verify =  false;
                }
            } else {
                $verify =  false;
            }
            
            if (isset($_POST['id'])!='') {
                $action = 'updated';
                $q = "UPDATE user SET first = '$first', last = '$last', email = '$email', $password status = $status WHERE id = $_GET[id]";
            	$r = mysqli_query($dbc, $q);
			} else {
                $action = 'added';
                $q = "INSERT INTO user (first, last, email, password, status) VALUES ('$first', '$last', '$email', SHA1('$_POST[password]'), $status)";
                if ($verify == true) {
                    $r = mysqli_query($dbc, $q);
                }
            }

            if ($r) {
                $message = '<p class="alert alert-success">User Was '. $action.'</p>';
            } else {
                $message = '<p class="alert alert-warning">User could not be '.$action.' added because:</p>'. mysqli_error($dbc);                
                if ($verify == FALSE) {
                    $message .= '<p class="alert alert-danger"> Password fields empty and/or do not match.</p>';
                }
                $message .= '<p class="alert alert-warning"> Query: '.$q.'</p>';
            }

        }
        if (isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
    break;
    
    case 'dashboard':
        
    break;
    
    case 'settings':
        if (isset($_POST['submitted'])==1) {
            $label    = mysqli_real_escape_string($dbc, $_POST['label']);
            $value    = mysqli_real_escape_string($dbc, $_POST['value']);
            
            if (isset($_POST['id'])!='') {
                $action = 'updated';
                $q = "UPDATE settings SET id = '$_POST[id]', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
            	$r = mysqli_query($dbc, $q);
            }

            if ($r) {
                $message = '<p class="alert alert-success">Setting Was '. $action.'</p>';
            } else {
                $message = '<p class="alert alert-warning">Setting could not be '.$action.' added because:</p>'. mysqli_error($dbc);                
                $message .= '<p class="alert alert-warning"> Query: '.$q.'</p>';
            }

        }
    break;
    
    case 'navigation':
        if (isset($_POST['submitted'])==1) {
            $label    = mysqli_real_escape_string($dbc, $_POST['label']);
            $url      = mysqli_real_escape_string($dbc, $_POST['url']);
            
            if (isset($_POST['id'])!='') {
                $action = 'updated';
                $q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', target = '$_POST[target]', position = '$_POST[position]', status = '$_POST[status]' WHERE id = '$_POST[openedid]'";
            	$r = mysqli_query($dbc, $q);
            }

            if ($r) {
                $message = '<p class="alert alert-success">Navigation Was '. $action.'</p>';
            } else {
                $message = '<p class="alert alert-warning">Navigation could not be '.$action.' added because:</p>'. mysqli_error($dbc);                
                $message .= '<p class="alert alert-warning"> Query: '.$q.'</p>';
            }

        }
    break;

    default:
        
    break;
	
}



?>