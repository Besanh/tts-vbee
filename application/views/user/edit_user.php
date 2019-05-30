<head>
<title> Add User </title>
<link href="../public/assets/css/add_user.css" rel="stylesheet">
</head>
<h2 style="color:#00a651" class="title"> Edit User </h2>
<?php
        echo '<div class="row">';
                echo '<div class="col-lg-12">';
                if(isset($error)){
                        echo "<div class='alert alert-warning'>";
                                echo "<ul>";
                                echo "<li>$error</li>";
                                echo "</ul>1";
                        echo "</div>";
                }
                if (strlen(validation_errors())>0){
                        echo "<div class='alert alert-warning'>";
                        echo validation_errors('<ul><li>','</li></ul>');
                        echo "</div>";
                }
                echo "</div>";
        echo "</div>";
?>
<div class="row">
  <div class="col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">Add A User</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" action="<?php echo base_url()."user_authentication/edit_user/".$info['id'];?>">
	    <div class="form-group">
              <label class="col-lg-3 control-label" for="inputLevel">Level:</label>
                <div class="col-lg-9">
		   <select class="form-control" id="inputLevel" name="level">
<?php if($this->session->userdata['logged_in']['level'] == 2) { ?>
                    <option value="0" selected>Member</option>
                    <option value="1" selected>Admin</option>
<?php } ?>
<?php if($this->session->userdata['logged_in']['level'] == 1) { ?>
                    <option value="0" selected>Member</option>
<?php } ?>
                  </select>
                </div>
           </div>
           <div class="form-group">
            <label class="col-lg-3 control-label" for="inputUser">Username:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="inputUser" name="username" placeholder="Enter Nickname" value="<?php echo $info['user_name']; ?>"  disabled   />
              </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="inputPass">Password:</label>
              <div class="col-lg-9">
               <input type="password" class="form-control" id="inputPass" name="password" placeholder="Enter Password" required />
              </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="inputPass2">Re-Password:</label>
              <div class="col-lg-9">
                <input type="password" class="form-control" id="inputPass2" name="password2" placeholder="Enter Confirm Password" required />
              </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="inputEmail">Email:</label>
              <div class="col-lg-9">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter Email" value="<?php echo $info['user_email']; ?>" required  />
              </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
              <button type="submit" class="btn btn-primary" id="ok" name='ok'>Submit</button>
            </div>
          </div>
          </form>
        </div>
    </div>
</div>

