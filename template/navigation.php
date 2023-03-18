<div class="navbar navbar-default" role="navigation">
    <?php if($debug['value'] == 1) {?>
        <button id="btn-debug" class="btn btn-default fa fa-bug"></button>
    <?php }?>
    <div class="container">

        <ul class="nav navbar-nav">
            <a class="navbar-brand" href="?page=1">Mirrow</a>
            <!-- 
            *?page: Used to set the Home and About Us page to 
                value 1 and 2. 
                For instance the about us page:
                http://localhost/series/dynamic/AtomCMS/?page=2
            * The $pageid is in setup.php, connected to a 
                GET['page'] array
            -->
            <?php nav_main($dbc, $path['call_parts'][0]);?>
<!--            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact</a></li>-->
        </ul>

    </div>

</div> <!-- End Navigation bar -->