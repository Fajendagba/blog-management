<?php

function nav_main ($dbc, $navid) {
    $q = "SELECT * FROM pages";
    $r = mysqli_query($dbc, $q);

    while ($nav = mysqli_fetch_assoc($r)) {?>

        <li<?php if($page == $nav['id']){echo ' class="active"';}?>>
            <a href="?page=<?php echo $nav['id'];?>"><?php echo $nav['label'];?></a>
        </li>

    <?php }
}

?>
