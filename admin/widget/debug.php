<div id="console-debug">
    
    
    <h1>Opened Array</h1>
    <pre> <?php print_r( $opened);?> </pre>
    
    <?php
    $all_vars = get_defined_vars(); 
    ?>
    
    <h1>All Varialbles</h1>
    <pre> <?php print_r( $all_vars);?> </pre>
    
    <h1>Page Array</h1>
    <pre> <?php print_r( $page);?> </pre>
    
    <h1>GET Array</h1>
    <pre> <?php print_r( $_GET);?> </pre>
    
    <h1>POST Array</h1>
    <pre> <?php print_r( $_POST);?> </pre>
    
    <h1>SERVER Array</h1>
    <pre> <?php print_r( $_SERVER);?> </pre>
    
    <h1>Settings Array</h1>
    <pre> <?php print_r( $debug);?> </pre>
    
</div>