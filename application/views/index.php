<!DOCTYPE html>
<?php
	$voice = isset($_POST['voice']) ? $_POST['voice']:null;
	$text  = isset($_POST['text']) ? $_POST['text']:null;
	$format = isset($_POST['format']) ? $_POST['format']:null;
if ($voice) 
{
    $url = 'https://tts.vbeecore.com/api/tts';
    $ch = curl_init($url);
    $m1 = '?app_id=5b6d55c98b6c380aeee20ac1';
    $m2 = '&key=e9803c2db5e10d74635fea6ec988130a';
    $m3 = '&voice='.$voice.'';
    $m4 = '&rate=1';
    $m5 = '&audio_type='.$format.'';
    $m6 = '&time=1534264251742';
    $m7 = '&user_id=46119';
    $m8 = '&service_type=1';
    $m9 = '&input_text='.$text.'';
    $xml = "$m1$m2$m3$m4$m5$m6$m7$m8$m9";
    $link = "$url$xml";
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch,CURLOPT_TIMEOUT,10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

#$response = curl_exec($ch);//Remove # to dowload to server
curl_close($ch);
	switch ($format) { 
		case "mp3": $file = "TEL4VNtts.mp3"; break;
		case "wav": $file = "tel4vntts.wav"; break;}
file_put_contents($file, $response);
}
?>

<html>
<head>
	<title>TEL4VN</title>	<link rel="shortcut icon" href="favicon.ico" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- Bootstrap -->
    	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    	<!-- Main Style -->
    	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
    	<!-- Responsive Style -->
    	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    	<!--Icon Fonts-->
    	<link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    	<!-- Extras -->
    	<!-- style input -->
    	<link rel="stylesheet" type="text/css" href="assets/style_input/style.css">
    	<!-- jQuery Load -->
    	<script src="assets/js/jquery-min.js"></script>
</head>
<body>
	<body data-spy="scroll" data-offset="1" >
	<div style="width:100%;">
    		<img src="assets/img/banner/banner-3.png" style="width:100%;">
	</div>
	<!-- Conatct Section -->
    	<section id="contact">
    	<div class="container text-center">
    	<div class="row">
    		<h1 style="color:#00a651;" class="title"> TEL4VN Text To Speech </h1>
<div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">	
 <!--End-->

       <h4> Chon giọng đọc </h4>    
	
 	<form action="" method="post">
	<div class="form-group">
	 <select name="voice" class="base--select">
	 <option value="hn_male_xuantin_vdts_48k-hsmm">Mạnh Dũng (Nam Hà Nội) &emsp;  </option>
	 <option value="hn_female_xuanthu_news_48k-hsmm">Mai Phương (Nữ Hà Nội)</option>
	 <option value="hn_female_thutrang_phrase_48k-hsmm">Thùy Linh (Nữ Hà Nội)</option>
	 <option value="sg_male_xuankien_vdts_48k-hsmm">Nhất Nam (Nam Sài Gòn)</option>
	 <option value="sg_female_xuanhong_vdts_48k-hsmm">Lan Trinh (Nữ Sài Gòn)</option>
	 </select> <br>
	<h4> Chọn định dạng </h4>  
	<select name="format" class="base--select">
	  <option value="mp3">  MP3 &emsp;  </option>
	  <option value="wav">  WAV &emsp;  </option>
	  </select>
 
	<div class="controls">
	<textarea  name="text" class="form-control" length="500" maxlength="500"  placeholder="Nhập hoặc dán nội dung văn bản tại đây..."></textarea>
    	</div>

    	<button type="submit" name="submit" class="btn btn-lg btn-common">ĐỌC CHỮ</button>
    	<button type="submit" name="" class="btn btn-lg btn-common">RELOAD</button>
	<div id="success" style="color:#14ba38;"></div>
         <a href=$link. download>

<?php
if($_POST){
echo '<audio controls autoplay>';
echo '<source src="'.$link.'" type="audio/wav" />';
echo '</audio>';
}
?>
 </form>
        </div>
        </div>
    </form>
<br><br>
    <div class="col-md-6 wow fadeInRight">
    <div class="social-links">
    <a class="social" href="http://fb.com/tel4vn" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
    <a class="social" href="" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
    <a class="social" href="" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>
    <a class="social" href="" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a>
	</div>
<div class="contact-info">
    <p><i style="color:#00a651;" class="fa fa-map-marker"></i>82/2/9 Đinh Bộ Lĩnh, Phường 26, Quận Bình Thạnh, TPHCM</p>
     <p><i style="color:#00a651;" class="fa fa-envelope"></i> 0126 264 4950 Ms Huệ</p>
</div>
    </div>
    </div>
    </div>
    </section>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</body>
</html>
