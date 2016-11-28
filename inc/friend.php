<?php
require_once('config.php'); 
require_once('functions.php'); 

?>
<div id="add-friend-container">
    <div class="user-image-heading">
        <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
    </div>
    <div id="add-friend-container">
        <form action="" method="POST" id="add-friend-form">
        	<div class="form-group">
            	<label class="col-md-2 control-label">Name</label>  
            	<div class="col-md-10 inputGroupContainer">
              		<div class="input-group">
                		<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                		<input  name="name" placeholder="Name" class="form-control"  type="text">
              		</div>
            	</div>
          	</div>
          	<div class="form-group">
            	<label class="col-md-2 control-label">Nickname</label>  
            	<div class="col-md-10 inputGroupContainer">
              		<div class="input-group">
                		<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                		<input  name="nickname" placeholder="Nickname" class="form-control"  type="text">
              		</div>
            	</div>
          	</div>
          	<div class="form-group">
            	<label class="col-md-2 control-label">Phone</label>  
            	<div class="col-md-10 inputGroupContainer">
              		<div class="input-group">
                		<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                		<input  name="phone" placeholder="Phone Number" class="form-control"  type="text">
              		</div>
            	</div>
          	</div>
          	<div class="form-group">
            	<label class="col-md-2 control-label">Email</label>  
            	<div class="col-md-10 inputGroupContainer">
              		<div class="input-group">
                		<span class="input-group-addon"><i class="" aria-hidden="true">@</i></span>
                		<input  name="email" placeholder="Email" class="form-control"  type="text">
              		</div>
            	</div>
          	</div>
          	<div class="form-group">
                <label class="col-md-8 control-label"></label>
                <div class="col-md-12">
                	<br>
                  	<button type="submit" class="btn btn-success btn-lg pull-right" >Save <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                	<div class="clear"></div>
                </div>
              </div>
        </form>
    </div>
</div>