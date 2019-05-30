<!-- Conatct Section -->
<style>
table {}
th { padding-left: 120px; }
td { padding-left: 50px;   }
</style>
<head>  <title> TEL4VN TextToSpeech </title> </head>
   <?php
	 if($error){
   ?>
<script type="text/javascript">
     $(window).load(function(){
         $('#myModal').modal('show');
      });
     $('#myModal').on('hidden.bs.modal', function (e) {
  	// do something...
	}) 
</script>
<div class="container">
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
  <div class="modal fade"  tabindex="-1" id="myModal" role="dialog" data-show="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" onclick="javascript:window.location='<?php echo base_url(); ?>tts' ">
		<span aria-hidden="true">&times;</span>
	</button>
	<h4 class="modal-title">Text To Speech</h4>
        </div>
        <div class="modal-body">
          <?php echo validation_errors("<p>","</p>"); ?>
        </div>
        <div class="modal-footer">
	  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location='<?php echo base_url(); ?>tts'">Close</button>
	  <!--<a id="closemodal" href="<?php echo base_url(); ?>" class="btn btn-primary close" data-dismiss="modal" target="_blank">Close</a>-->
	  
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<?php
};
?>

<section id="contact">
<div class="container text-center">
<div class="row">
	<h1 style="color:#00a651;" class="title"> TEL4VN Text To Speech </h1>
	<div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
	  <!--End-->
<table> 
<td>	  <h4> Chon giọng đọc </h4>
 	  <form role="form"  action="<?php echo base_url()?>read"  method="post">
	    <div class="form-group">
		<select name="voice" class="base--select">
		<option value="hn_male_xuantin_vdts_48k-hsmm">Mạnh Dũng (Nam Hà Nội) &emsp;  </option>
		<option value="hn_female_xuanthu_news_48k-hsmm">Mai Phương (Nữ Hà Nội)</option>
		<option value="hn_female_thutrang_phrase_48k-hsmm">Thùy Linh (Nữ Hà Nội)</option>
		<option value="sg_male_xuankien_vdts_48k-hsmm">Nhất Nam (Nam Sài Gòn)</option>
		<option value="sg_female_xuanhong_vdts_48k-hsmm">Lan Trinh (Nữ Sài Gòn)</option>
 		</select>
	   </div> 
</td>	   <br>
<td>	   <h4> Chọn định dạng </h4>
	   <div class="form-group">
        	<select name="format" class="base--select">
          		<option value="mp3">  MP3 &emsp;  </option>
          		<option value="wav">  WAV &emsp;  </option>
        	</select>
	   </div>
</td>
</table>
           <div class="controls">
        	<textarea  name="text" class="form-control"  placeholder="Nhập hoặc dán nội dung văn bản tại đây..."></textarea>
           </div>
	   <br>	
	   <div class="form-group">	
           	<button type="submit" id="ok" name='ok' class="btn btn-lg btn-common">ĐỌC CHỮ</button>
	   </div>
           <!--<button type="submit" name="" class="btn btn-lg btn-common">RELOAD</button>-->
           <!--<div id="success" style="color:#14ba38;"></div>-->
           <!--<a href=$link. download>-->
 	</form>
     </div>
    <br><br>
    
    <div class="col-md-6 wow fadeInRight">
       <div class="social-links">
	    <a class="social" href="http://fb.com/tel4vn" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
	    <!--a class="social" href="" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
	    <a class="social" href="" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a-->
	    <a class="social" href="" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>
       </div>
       <div class="contact-info">
    	  <p><i style="color:#00a651;" class="fa fa-map-marker"></i>82/2/9 Đinh Bộ Lĩnh, Phường 26, Quận Bình Thạnh, TPHCM</p>
     	  <p><i style="color:#00a651;" class="fa fa-envelope"></i> 0126 264 4950 Ms Huệ</p>
       </div>
    </div>
  </div>
  </div>
</section>                                   
