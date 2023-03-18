<div class="container">
    <h1>Page Manager</h1>
    
    <div class="row">
        <div class="col-md-3">
        	
            <div class="list-group">
            
                <a href="?page=pages" class="list-group-item">
                    <i class="fa fa-plus-square"></i> New Page
                </a>
                
                <?php 
                $q = "SELECT * FROM posts where type = 1 ORDER BY id ASC";
            	$r = mysqli_query($dbc, $q);
                
                while ($list = mysqli_fetch_assoc($r)) {
                    $blurb = substr(strip_tags($list['body']), 0, 160);
                ?>
                <div id="page_<?php echo $list['id'];?>" class="list-group-item <?php selected($opened['id'], $list['id'], 'active')?>">
                    <h4 class="list-group-item-heading"><?php echo $list['title'];?>
                        <span class="pull-right">
                            <a href="#" id="del_<?php echo $list['id'];?>" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                            <a href="index.php?page=pages&id=<?php echo $list['id'];?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
                        </span>
                    </h4>
                    <p class="list-group-item-text"><?php echo $blurb;?></p>
                </div> <!-- Left Navigation -->
                    
                <?php }?>
                
            </div>
        </div>
        
        <div class="col-md-9">
            
             <?php if (isset($message)) {
                echo '<p>'.$message.'</p>';
             }?>
            
            <form action="?page=pages&id=<?php echo $opened['id']?>" method="post" role="form">
               
                <div class="form-group">
                    <label for="user">User:</label>
                    <select id="user" name="user" class="form-control">
                        <option value="0">No user</option>
                        <?php
                        
                        $q = "SELECT id FROM user ORDER BY first ASC";
                        $r = mysqli_query($dbc, $q);
                        
                        while ($user_list = mysqli_fetch_assoc($r)) {
                            $user_data = data_user($dbc, $user_list['id']);?>
                        
                            <option value="<?php echo $user_data['id']?>"
                            <?php 
                            if (isset($_GET['id'])){
                                selected($user_data['id'], $opened['user'], 'selected');
                            } else {
                                selected($user_data['id'], $user['id'], 'selected');
                            }?>>
                                <?php echo $user_data['fullname'];?>
                            </option>
                            
                        <?php }?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="label">Label:</label>
                    <input type="text" id="label" value="<?php if(isset($opened)){echo $opened['label'];}?>" placeholder="Page label" name="label" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" value="<?php if(isset($opened)){echo $opened['slug'];}?>" placeholder="Page Slug" name="slug" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" value="<?php if(isset($opened)){echo $opened['title'];}?>" placeholder="Page title" name="title" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="header">Header:</label>
                    <input type="text" id="header" value="<?php if(isset($opened)){echo $opened['header'];}?>" placeholder="Page header" name="header" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="label">Body:</label>
                    <textarea id="body" rows="8" placeholder="Page body" name="body" class="form-control editor"><?php if(isset($opened)){echo $opened['body'];}?></textarea>
                </div>
                
                <button class="btn btn-default" type="submit">Save</button>
                <input type="hidden" name="submitted" value="1">
                <?php if (isset($opened['id'])) {?>
                    <input type="hidden" name="id" value="<?php echo $opened['id'];?>">
                <?php }?>   
                
            </form>
            
        </div>
    </div>
</div>