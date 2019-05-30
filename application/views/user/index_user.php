<?php
$login = substr($_SERVER['PHP_SELF'],-5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://tts.tel4vn.com/public/assets/css/main.css" rel="stylesheet">


    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>public/favicon.ico"/>
    <meta name="author" content="tel4vn.vn">
    
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <?php if ($login != 'login'){ ?>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/metisMenu/metisMenu.min.css"/>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/font-awesome/css/font-awesome.min.css"/>
                <script src="<?php echo base_url();?>public/js/jquery-3.1.1.min.js"></script>
                <script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
                <script src="<?php echo base_url();?>public/vendor/metisMenu/metisMenu.min.js"></script>
                <script src="<?php echo base_url();?>public/js/sb-admin-2.min.js"></script>
                <script src="<?php echo base_url();?>public/js/jquery.datetimepicker.full.min.js"></script>
        <?php } ?>

        <title>TEL4VN TTS</title>
</head>
<body>
        <?php
                if ($login == 'login'){
                        $this->load->view($loadPage);
                } else {
                                //Content of each page and footer
                                echo '<div id="page-wrapper">';
                                        //content of each page
                                        //$this->load->view($loadPage);

                                echo '</div>';//end div of <div id="page-wrapper">
                        echo '</div>';//end div of <div id="wrapper">
                }

        ?>

        <?php if ($login != 'login'){ ?>

        <?php } ?>
  <script src="<?php echo base_url(); ?>public/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>

