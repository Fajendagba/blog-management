<?php

function nav_main ($dbc, $path) {
    $q = "SELECT * FROM navigation ORDER BY position ASC";
    $r = mysqli_query($dbc, $q);

    while ($nav = mysqli_fetch_assoc($r)) {
        $nav['slug'] = $slug = get_slug($dbc, $nav['url']);
        ?>
		<!--if($path == $nav['slug']){echo ' class="active"';}-->
        <li<?php selected($path, $nav['slug'], ' class="active"')?>>
            <a href="<?php echo $nav['url'];?>"><?php echo $nav['label'];?></a>
        </li>

    <?php }
}

?>
