<?php
     $login = substr($_SERVER['PHP_SELF'], -5);
?>
<?php
     if (isset($this->session->userdata['logged_in'])) {
          $username = ($this->session->userdata['logged_in']['username']);
          $email = ($this->session->userdata['logged_in']['email']);
     	  $level = ($this->session->userdata['logged_in']['level']);
     } else {
          header("location: login");
     }
?>

<!DOCTYPE html>
<html>
<head>  
       <link rel="icon" href="<?php echo base_url();?>public/favicon.ico" type="image/png" sizes="16x16"> 
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/style-bar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/main.css">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.css">
       <link rel="stylesheet" media="screen" href="<?php echo base_url();?>public/assets/fonts/font-awesome/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/style_input/style.css">
       <script src="<?php echo base_url();?>public/assets/js/jquery-min.js"></script>
       <script src="<?php echo base_url();?>public/assets/js/bootstrap.min.js"></script>
       <script src="<?php echo base_url();?>public/assets/js/smooth-scroll.js"></script>
       <script src="<?php echo base_url();?>public/assets/js/lightbox.min.js"></script>
       <script src="<?php echo base_url();?>public/assets/js/main.js"></script>
</head>
<body>
  <?php if ($login != 'login'){ ?>
      <?php
	  $this->load->view('template/header');
      ?>
  <?php } ?>
	<br><br><br><br><br>
	<?php 
     		$this->load->view($loadPage); 
      	?>
<?php
          $this->load->view('template/footer');
      ?>

</body>
</html>
