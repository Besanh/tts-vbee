<style>
table {} 
th { padding-left: 120px; }
td { padding-left: 50px;   }
#tts-audio{
	background-color: #3d566e;
}
</style>
<head>	<title> TEL4VN Text To Speech </title>
</head>
<section id="contact">
<div class="container text-center">
<div class="row">
	<h1 style="color:#00a651;" class="title"> TEL4VN Text To Speech </h1>
	<div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
<table>
<td>	  <h4> Chon giọng đọc </h4>
	  <form role="form"  action="<?php echo base_url();?>read" method="post">
	    <div class="form-group">
		<select name="voice" class="base--select">
		<option value="hn_male_xuantin_vdts_48k-hsmm"  <?php if ($voice == 'hn_male_xuantin_vdts_48k-hsmm') echo 'selected'; ?>>Mạnh Dũng (Nam Hà Nội) &emsp;  </option>
		<option value="hn_female_xuanthu_news_48k-hsmm" <?php if ($voice == 'hn_female_xuanthu_news_48k-hsmm') echo 'selected'; ?>>Mai Phương (Nữ Hà Nội)</option>
		<option value="hn_female_thutrang_phrase_48k-hsmm" <?php if ($voice == 'hn_female_thutrang_phrase_48k-hsmm') echo 'selected'; ?>>Thùy Linh (Nữ Hà Nội)</option>
		<option value="sg_male_xuankien_vdts_48k-hsmm" <?php if ($voice == 'sg_male_xuankien_vdts_48k-hsmm') echo 'selected'; ?>>Nhất Nam (Nam Sài Gòn)</option>
		<option value="sg_female_xuanhong_vdts_48k-hsmm" <?php if ($voice == 'sg_female_xuanhong_vdts_48k-hsmm') echo 'selected'; ?>>Lan Trinh (Nữ Sài Gòn)</option>
 		</select>
	   </div> 
</td>	   <br>
<td>	   <h4> Chọn định dạng </h4>
	   <div class="form-group">
        	<select name="format" class="base--select">
          		<option value="mp3" <?php if ($format == 'mp3') echo 'selected'; ?>>  MP3 &emsp;  </option>
          		<option value="wav" <?php if ($format == 'wav') echo 'selected'; ?>>  WAV &emsp;  </option>
        	</select>
	   </div>
</td>
</table>
           <div class="controls form-group">
		<label for="Text" class="col-sm-2 control-label"></label>
        	<textarea  name="text" class="form-control"  ><?php echo $text ?></textarea>
           </div>
	   <br>	
<table>
<th>	   <div class="form-group">	
           	<button type="submit" id="ok" name='ok' class="btn btn-lg btn-common">ĐỌC CHỮ</button>
	   </div>
    </th>    
 <th>	</form>
	<form action="<?php echo base_url();?>tts" method="post">
		<div class="form-group"> 
			<button type="submit" name="" class="btn btn-lg btn-common">TẢI LẠI</button>
		</div>
	</form> 
</th>

</table>
<br>
<div>
<audio controls autoplay id="tts-audio">
  <source src="<?php echo $outputurl ; ?>" type="audio/wav">
  <source src="<?php echo $outputurl; ?>" type="audio/mp3">
</audio>
</div>

     </div>
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
