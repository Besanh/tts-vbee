<div>
	<a href="http://tel4vn.com" >
        <img src="<?php echo base_url();?>public/assets/img/logo_full.png" style="width:182px;height:98px;float:left;">
        </a>
</div>
<?php
     $login = substr($_SERVER['PHP_SELF'], -5);
?>
<?php
     if (isset($this->session->userdata['logged_in'])) {
          $username = ($this->session->userdata['logged_in']['username']);
          $level = ($this->session->userdata['logged_in']['level']);
     } else {
          header("location: login");
     }
?>
	 <?php if ($login != 'login'){ ?>
       		 <body>
        	    <div class="dropdown"></br>
        	        <button class="dropbtn">Welcome <?php echo $username; ?> <br>
        	                <h6>
                                Level: <?php
                                if ($level == 2) {
                                        echo 'Admin';
                                } else if ($level == 1) {
                                        echo 'Member';
                                } else { echo 'Trial';}
				  ?>
        	                </h6>
        	        </button>
                	<div class="dropdown-content">
				<a href="<?php echo base_url();?>tts"></a>
                        	<a href="<?php echo base_url();?>tts">Trang chính</a>
                        	<a href="<?php echo base_url();?>user">User Manager</a>
                        	<a href="<?php echo base_url();?>logout">Logout</a>
                	</div>
            	    </div>
       		 </body>
	<?php } ?>

