<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tts extends CI_Controller {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *              http://example.com/index.php/welcome
         *      - or -
         *              http://example.com/index.php/welcome/index
         *      - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see https://codeigniter.com/user_guide/general/urls.html
         */
        public function __construct(){
                parent::__construct();
                $this->_data['module'] = 'template';
                $this->_data['path'] = "template/template";
        } 

	public function index()
        {
		$title = "TEL4VN TTS";
		$this->_data['loadPage']="tts/index_view";
		$this->_data['error'] = 0;
		$this->load->view($this->_data['path'],$this->_data);	
        }
	function getuuid() { 
    		$s = strtoupper(md5(uniqid(rand(),true))); 
    		$guidText = 
        	substr($s,0,8) . '-' . 
        	substr($s,8,4) . '-' . 
       		substr($s,12,4). '-' . 
        	substr($s,16,4). '-' . 
       		substr($s,20); 
    		return $guidText;
	}
	public function read(){
		$this->load->library("form_validation");
                $this->form_validation->set_rules('text','Text','required|xss_clean|callback_text');
                if($this->form_validation->run() == TRUE){
                	$this->_data['loadPage']="tts/read_view";
                        $voice =  $this->input->post('voice');
                        $text =  $this->input->post('text');
                        $format = $this->input->post('format');
                        $url = $this->config->item('vbee_url');
                        $app_id = $this->config->item('app_id');
                        $key = $this->config->item('key');
                        $user_id = $this->config->item('user_id');
                        $rate = $this->config->item('rate');
                        $service_type = $this->config->item('service_type');
                        $timestamp = (int)round(microtime(true)*1000);
			
			$ch = curl_init();
			$query_string_1 = [
				'app_id' => $app_id,
				'key' => $key,
				'voice' => $voice,
				'rate' => $rate,
				'time' => $timestamp,
				'service_type' => $service_type,
				'user_id' => $user_id,
				'input_text' => $text
			];						
			curl_setopt($ch, CURLOPT_URL, $url);	
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query_string_1));
			//curl_setopt($ch, CURLOPT_TIMEOUT, 20);

			$headers = array();
			$headers[] = "Content-Type: application/json";
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$response = curl_exec($ch);
			curl_close($ch);	
			$media_dir = $this->config->item('media_dir');
			if(!is_dir($media_dir)){
				mkdir($media_dir, 0755, true);	
			}	
			$filename =  $this->getuuid(); 
			$outputurl = $media_dir.'/'.$filename.'.'.$format;
			if (file_exists($outputurl))
                        {
                            unlink($outputurl);
                        } 
			file_put_contents($outputurl ,$response);
			$this->_data['text'] = $text;
			$this->_data['voice'] = $voice;
			$this->_data['format'] = $format;
			$this->_data['outputurl'] = $outputurl;
                	$this->load->view($this->_data['path'],$this->_data);   
                }else{
			$this->_data['loadPage']="tts/index_view";
			$this->_data['error'] = 1;
			$this->load->view($this->_data['path'],$this->_data);    
		}
	}	

	function text($text){
		$lengtext = strlen($text);
		if($text == NULL){
			$this->form_validation->set_message("text","Please enter the text");
			return FALSE;
		}elseif($lengtext > 1000){
			$this->form_validation->set_message("text","Text is over 2000 characters");
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
