<div class="container">
    <h1>Navigation</h1>
    
    <div class="row">
        
        <div class="col-md-4">
            <ul class="list-group" id="sort-nav">
                
                <?php
                $q = "SELECT * FROM navigation ORDER BY position ASC";
                $r = mysqli_query($dbc, $q);
                
                while ($list = mysqli_fetch_assoc($r)) {?>
                    <li id="list_<?php echo $list['id'];?>" class="list-group-item">
                        
                        <a id="label_<?php echo $list['id'];?>" data-toggle="collapse" data-target="#form_<?php echo $list['id'];?>">
                            <?php echo $list['label'];?> <i class="fa fa-chevron-down"></i>
                        </a>
                        <div id="form_<?php echo $list['id'];?>" class="collapse">
                            
                            <form class="form-horizontal nav-form" action="index.php?page=navigation&id=<?php echo $list['id']?>" method="post" role="form">

                               <div class="form-group">
                                   <label class="col-sm-2 control-label" for="first">ID:</label>
                                   <div class="col-sm-10">
                                       <input type="text" id="id" value="<?php echo $list['id']; ?>" placeholder="id" name="id" name="id" class="form-control input-sm">
                                   </div>
                                </div>

                               <div class="form-group">
                                    <label class="col-sm-2 control-label" for="last">Label:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="label" value="<?php echo $list['label']; ?>" placeholder="label" name="label" class="form-control input-sm">
                                    </div>
                               </div>

                               <div class="form-group">
                                    <label class="col-sm-2 control-label" for="last">URL:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="url" value="<?php echo $list['url']; ?>" placeholder="url" name="url" name="url" class="form-control input-sm">
                                    </div>
                               </div>

                               <div class="form-group">
                                    <label class="col-sm-2 control-label" for="last">Target:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="target" value="<?php echo $list['target']; ?>" placeholder="target" name="target" class="form-control input-sm">
                                    </div>
                               </div>

                               <div class="form-group">
                                    <label class="col-sm-2 control-label" for="last">Status:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="status" value="<?php echo $list['status']; ?>" placeholder="status" name="status" class="form-control input-sm">
                                    </div>
                               </div>

                               <button class="btn btn-default" type="submit">Save</button>
                               <input type="hidden" name="submitted" value="1">
                               <input type="hidden" name="openedid" value="<?php echo $list['id'];?>">
                               <p></p>

                            </form>
                            
                        </div>
                    </li>
                <?php }?>                
                    
            </ul>
        </div>
        <div class="col-md-8">
            <?php if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }?>
                
        </div>
    </div>
    
</div>