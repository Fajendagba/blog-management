<?php if (isset($opened['id'])){?>
    <script>

        $(document).ready(function() {

            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#avatar-dropzone");
            myDropzone.on("success", function(file) {
                $("#avatar").load("ajax/avatar.php?id=<?php echo $opened['id']; ?>");
            });

        });

    </script>
<?php }?> 

<div class="container">
    <h1>User Manager</h1>
    
    <div class="row">
        <div class="col-md-3">
        	
            <div class="list-group">
            
                <a href="?page=users" class="list-group-item">
                    <i class="fa fa-plus-square"></i> New User
                </a>
                
                <?php 
                $q = "SELECT * FROM user ORDER BY last ASC";
            	$r = mysqli_query($dbc, $q);
                
                while ($list = mysqli_fetch_assoc($r)) {
                    $list = data_user($dbc, $list['id']);
                    //$blurb = substr(strip_tags($page['body']), 0, 160) ;
                ?>
                <a class="list-group-item <?php selected($opened['id'], $list['id'], 'active')?>" href="?page=users&id=<?php echo $list['id'];?>">
                    <h4 class="list-group-item-heading"><?php echo $list['fullname_reverse'];?></h4>
                    <!--<p class="list-group-item-text"><?php //echo $blurb;?></p>-->
                </a> <!-- Left Navigation -->
                    
                <?php }?>
                
            </div>
        </div>
        
        <div class="col-md-9">
            
             <?php if (isset($message)) {
                echo '<p>'.$message.'</p>';
             }?>
            
            <form action="?page=users&id=<?php echo $opened['id']?>" method="post" role="form">
               
                
                <?php if ($opened['avatar'] != '') { ?>
                    <div id="avatar">
                        <div class="avatar-container" style="background-image: url('uploads/<?php echo $opened['avatar'];?>')"></div>
                    </div>
               <?php } ?>
                
               
               <div class="form-group">
                    <label for="first">First Name:</label>
                    <input type="text" id="first" value="<?php echo $opened['first']; ?>" placeholder="First Name" name="first" class="form-control">
               </div>
               
               <div class="form-group">
                    <label for="last">Last Name:</label>
                    <input type="text" id="last" value="<?php echo $opened['last']; ?>" placeholder="Last Name" name="last" class="form-control">
               </div>
               
               <div class="form-group">
                    <label for="last">Email Address:</label>
                    <input type="email" id="email" value="<?php echo $opened['email']; ?>" placeholder="Email Address" name="email" class="form-control">
               </div>
               
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-control">
                        
                        <option value="0" <?php if (isset($_GET['id'])){ selected('0', $opened['status'], 'selected'); } ?>>Inactive</option>
                        <option value="1" <?php if (isset($_GET['id'])){ selected('1', $opened['status'], 'selected'); }?>>Active</option>
                        
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="last">Password:</label>
                    <input type="password" id="password" placeholder="Password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="last">Verify Password:</label>
                    <input type="password" id="passwordv" placeholder="Type Password again" name="passwordv" class="form-control">
                </div>
                
                <button class="btn btn-default" type="submit">Save</button>
                <input type="hidden" name="submitted" value="1">
                <?php if (isset($opened['id'])) {?>
                    <input type="hidden" name="id" value="<?php echo $opened['id'];?>">
                <?php }?>                
                
            </form>
            
            <?php if (isset($opened['id'])) {?>
                <form action="uploads.php?id=<?php echo $opened['id']?>" class="dropzone" id="avatar-dropzone">

                    <input type="file" name="file">

                </form>
            <?php }?> 
            
        </div>
    </div>
    
</div>