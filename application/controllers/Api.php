<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

	public function tts_post()
	{
		$voice = $this->post('voice');
                $text = $this->post('text');
		$data = ['username' => $this->post('username'),
			'password' => $this->post('password')
			];
		$this->load->model("Muser_api");
		$val_result = $this->Muser_api->api_auth($data);
		if ($val_result !=true)
		{
			http_response_code(401);
			echo "user are incorrect";
		} elseif ($voice == NULL || $text == NULL)
			{
				http_response_code(404);
				echo "text, voice NOT NULL";
			} else {
	                        $format = 'wav';
	                        $url = $this->config->item('vbee_url');
	                        $app_id = $this->config->item('app_id');
	                        $user_id = $this->config->item('user_id');
	                        $rate = $this->config->item('rate');
	                        $service_type = $this->config->item('service_type');
	                        $timestamp = (int)round(microtime(true)*1000);
				$private_key = $this->config->item('private_key');
	                        $key = md5($private_key.':'.$app_id.':'.$timestamp);
				$bit_rate = '16000';
				$sample_rate = '8000';

	                        $ch = curl_init();
	                        $query_string = [
	                                'app_id' => $app_id,
	                                'key' => $key,
	                                'voice' => $voice,
	                                'rate' => $rate,
	                                'time' => $timestamp,
	                                'service_type' => $service_type,
	                                'user_id' => $user_id,
	                                'input_text' => $text,
					'bit_rate' => $bit_rate,
					'sample_rate' => $sample_rate
	                        ];
	                        curl_setopt($ch, CURLOPT_URL, $url);
	                        curl_setopt($ch, CURLOPT_POST, 1);
	                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query_string));
	                        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
					
				$response = curl_exec($ch);
	
				if (curl_errno($ch)) {
	 			   echo 'Error:' . curl_error($ch);
				}
		                curl_close($ch);
				print_r($response);
		}

	}
	
}
?>
