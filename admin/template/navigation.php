<div class="navbar navbar-default" role="navigation">
    
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="?page=dashboard">Mirrow</a></li>
            <!-- 
            *?page: Used to set the Home and About Us page to 
                value 1 and 2. 
                For instance the about us page:
                http://localhost/series/dynamic/AtomCMS/?page=2
            * The $pageid is in setup.php, connected to a 
                GET['page'] array
            -->
            <li<?php if($page == 'dashboard'){echo ' class="active"';}?>><a href="?page=dashboard">Dashboard</a></li>
            <li<?php if($page == 'pages'){echo ' class="active"';}?>><a href="?page=pages">Pages</a></li>
            <li<?php if($page == 'users'){echo ' class="active"';}?>><a href="?page=users">Users</a></li>
            <li<?php if($page == 'navigation'){echo ' class="active"';}?>><a href="?page=navigation">Navigation</a></li>
            <li<?php if($page == 'settings'){echo ' class="active"';}?>><a href="?page=settings">Settings</a></li>
        </ul>

        <div class="pull-right">
            <ul class="nav navbar-nav">
                <li>
                    <?php if($debug['value'] == 1) {?>
                    <button type="button" id="btn-debug" class="btn btn-default navbar-btn fa fa-bug"></button>
                    <?php }?>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['fullname_reverse'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div> <!-- End Navigation bar -->