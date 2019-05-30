<head>
	<SCRIPT LANGUAGE="JavaScript">
	      function confirmAction() {
	        return confirm("DELETE. Are you sure ??")
	      }
	</SCRIPT>
</head>
<style>
</style>
<?php
     if (isset($this->session->userdata['logged_in'])) {
          $username = ($this->session->userdata['logged_in']['username']);
          $email = ($this->session->userdata['logged_in']['email']);
     	  $level = ($this->session->userdata['logged_in']['level']);
     } else {
    	redirect(base_url().'login');   	
     }
?>

<h1 style="color:#00a651" class="title"> User Manager </h1>
	<div class="lead">
		<?php if ($level == 2) { ?>
		<a href="<?php echo base_url()."add_user";?>">
		<i class="fa fa-plus-circle" style="margin-left:30px"></i> Add A User</a>
		<?php } ?>
	</div>
	<table class="table table-hover" style="width:95%;margin-left:30px">
	    <thead>
    	        <tr>
             		<th>#</th>
            		<th>Username</th>
            		<th>Email</th>                    
            		<th>Level</th>
            		<th>Action</th>
        	</tr>
    	    </thead>
<?php
	$stt=0;
        foreach($info as $item){
	        $stt++;
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$item[user_name]</td>";
                echo "<td>$item[user_email]</td>";
                if($item['user_level'] == 1){
                        echo "<td>Member</td>";
                }else if($item['user_level'] == 2) {
                        echo "<td><font color='red'>Admin</font></td>";
                } else if ($item['user_level'] == 0){
			echo "<td>Trial</td>";
		}
		if($level  == 2){
                 echo '<td>
                        <a href='.base_url().'user_authentication/edit_user/'.$item['id'].'>
	                        <i class="text-success fa fa-edit font-size-150"></i>
                        </a>
			<a href='.base_url().'user_authentication/delete_user/'.$item['id'].' onclick="return confirmAction()">	
                                <i class="text-danger fa fa-trash-o font-size-150"></i>
                       </a>
                        </td>';
               } else if ($level == 1) {
                   echo '<td>
                        <a href='.base_url().'user_authentication/edit_user/'.$item['id'].'>
	                        <i class="text-success fa fa-edit font-size-150"></i>
                        </a>
                        </td>';}
                   echo "</tr>";
                }
?>
	</table>
<?php
        if ( $level == 1){
                echo "<center>";
                echo $page_link;
                echo "</center>";
        } else { echo "<br>";}
?>

