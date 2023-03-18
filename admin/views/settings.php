<div class="container">
    <h1>Site Settings</h1>
    
    
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            $q = "SELECT * FROM settings ORDER BY id ASC";
            $r = mysqli_query($dbc, $q);

            while ($opened = mysqli_fetch_assoc($r)) {?>

               <form class="form-inline" action="?page=settings&id=<?php echo $opened['id']?>" method="post" role="form">

                   <div class="form-group">
                        <label for="first">ID:</label>
                        <input type="text" id="id" value="<?php echo $opened['id']; ?>" placeholder="id" name="id" class="form-control">
                   </div>

                   <div class="form-group">
                        <label for="last">Label:</label>
                        <input type="text" id="label" value="<?php echo $opened['label']; ?>" placeholder="label" name="label" class="form-control">
                   </div>

                   <div class="form-group">
                        <label for="last">Value:</label>
                        <input type="text" id="value" value="<?php echo $opened['value']; ?>" placeholder="value" name="value" class="form-control">
                   </div>
                   <button class="btn btn-default" type="submit">Save</button>
                   <input type="hidden" name="submitted" value="1">
                   <input type="hidden" name="openedid" value="<?php echo $opened['id'];?>">
                   <p></p>

                </form> 

            <?php }?>
                
        </div>
    </div>
    
</div>