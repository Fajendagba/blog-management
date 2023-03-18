<?php

function data_settings_value($dbc, $id) {
    $q = "SELECT * FROM settings WHERE id = '$id'";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);
	
    return $data;
}

function data_user($dbc, $id) {
    
    if (is_numeric($id)) {
        $cond = "WHERE id='$id'";
    } else {
        $cond = "WHERE email='$id'";
    }
    
    $q = "SELECT * FROM user $cond";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);
    
    // Store multiple variables in one array - data[]
    $data['fullname'] = $data['first'].' '.$data['last'];
    $data['fullname_reverse'] = $data['last'].' '.$data['first'];
    return $data;
}


function data_page($dbc, $id) {
    $q = "SELECT * FROM posts WHERE id=$id";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);
    
    $data['body_nohtml'] = strip_tags($data['body']);
    
    if ($data['body'] == $data['body_nohtml']) {
        $data['body_formatted'] = '<p>'.$data['body'].'<p>';
    } else {
        $data['body_formatted'] = $data['body'];
    }
    
    return $data;
}

?>