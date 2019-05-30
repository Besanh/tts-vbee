<html>
<?php
	if (isset($this->session->userdata['logged_in'])) {
		header("location: http://tts.tel4vn.com/tts");
	}
?>
<head>
	<title>TEL4VN TTS Login</title>
	<link rel="icon" href="<?php echo base_url(); ?>public/favicon.ico" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/tts.css">
</head>
<body>
    <?php
	if (isset($logout_message)) {
		echo "<div class='message'>";
		echo $logout_message;
		echo "</div>";
	}
    ?>
	<form class="modal-content animate" method="post" action="<?php echo base_url();?>user_authentication/user_login_process">
	<div class="imgcontainer">
      		<img src="<?php echo base_url(); ?>public/assets/img/logo_full.png" alt="Avatar" class="avatar">
    	</div>
	<?php
		echo "<div style='color:red' >";
        	if (isset($message_display)) {
                echo "<center>";
                echo $message_display;
                echo "</center>";
        	}
		echo "</div>";
    ?>
	<?php
                echo "<div style='color:red' >";
                if (isset($error_message)) {
                echo "<center >";
                echo $error_message;
                echo "</center>";
                }
                echo validation_errors();
                echo "</div>";
        ?>
    	<div class="container">
      		<label>Username</label>
      		<input type="text" placeholder="Enter Username" name="username" id="name" required>

      		<label>Password</label>
	        <input type="password" placeholder="Enter Password" name="password" id="password" required>

  		<button type="submit" name="submit">Login</button>
	        <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
    	</div>
    	<div class="container" style="background-color:#f1f1f1">
         	<center> <span class="psw">Copyring &copy 2018  <a href="http://tel4vn.vn">TEL4VN</a></span></center>
    	</div>
    </form>
  </body>
</html>
