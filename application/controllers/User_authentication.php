<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_authentication extends CI_Controller {

	public function __construct() {
			parent::__construct();
	if ( !$this->session->userdata('logged_in') && substr($_SERVER['PHP_SELF'], -5) != "login" && substr($_SERVER['PHP_SELF'], -18) != "user_login_process") {
		redirect(base_url()."login");
	} else {
	$this->_data['module'] = 'template';
    $this->_data['path'] = 'template/template';

	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('session');
	}
	}
	public function index() {
		$this->load->view('user/login_form');
	}
	public function user_login_process() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
					redirect(base_url().'tts');
			}else{
					$this->load->view('user/login_form');
			}	
		} else {
			$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
			);
			$this->load->model("Muser");
			$result = $this->Muser->login($data);
			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->Muser->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						'level' => $result[0]->user_level,
						'id' => $result[0]->id
					);
					$this->session->set_userdata('logged_in', $session_data);
					redirect(base_url().'tts');
				}
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('user/login_form', $data);
			}		
		}
	}
	public function user_manager() {
		$this->load->view('user/index_user');
        $this->_data['loadPage']= 'user/user_view';
        $this->load->view($this->_data['path'],$this->_data);
	}
	public function user_view($start=0){
		$this->_data['titlePage']="User Manage";
		$this->load->view('user/index_user');
            $this->_data['loadPage']= 'user/user_view';
            $this->load->model("Muser");
	$config['base_url'] = base_url()."user";
            $config['total_rows'] = $this->Muser->countAll();
            $config['per_page'] = 10;
            $config['uri_segment'] = 2;
                //Bootstrap
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tag_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tag_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tag_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tag_close'] = "</li>";

            $this->load->library("pagination",$config);
         	$this->_data['page_link']=$this->pagination->create_links();
			$level = ($this->session->userdata['logged_in']['level']);
			if ($level == 2 ){
				$this->_data['info']=$this->Muser->listAllUser($config['per_page'],$start);
                } else {
                    $id = $this->session->userdata['logged_in']['id'];
                    $this->_data['info']=$this->Muser->listMember($id);
				}
                $this->_data['mess'] = $this->session->flashdata("flash_mess");
                $this->load->view($this->_data['path'],$this->_data);
	}
//	public function user_registration_show() {
//                $this->_data['loadPage']= 'user/add_user';
//                $this->load->view($this->_data['path'],$this->_data);
//        }
	public function add_new_user() {
	        $this->_data['loadPage']="user/add_user";
	        $this->form_validation->set_rules("username","Username","required|min_length[4]|alpha|callback_check_user");
	        $this->form_validation->set_rules("password","Password","required");
	        $this->form_validation->set_rules("password2","Re-Password","required|matches[password]");
	        $this->form_validation->set_rules("email","Email","required|valid_email|is_unique[user_login.user_email]");
	        if ($this->form_validation->run() == TRUE) {
		            $data_insert = array(
        		        'user_name' => $this->input->post('username'),
        		        'user_email' => $this->input->post('email'),
                		'user_password' => $this->input->post('password'),
                		'user_level' => $this->input->post('level')
            			);
            		$this->load->model("Muser");
            		$this->Muser->insertUser($data_insert);
            		$this->session->set_flashdata('flash_mess', 'Added');
            		redirect(base_url()."user");
        	}
        	$this->load->view($this->_data['path'],$this->_data);
    	}

	public function check_user($user){
	        $this->load->model("Muser");
	        $id = $this->uri->segment(3);
	        if ($this->Muser->checkUsername($user,$id) == FALSE){
		            $this->form_validation->set_message("check_user","Your username has been registered, please try again");
        		    return FALSE;
        	} else {
       		     return TRUE;
        	}
	}

	public function edit_user($id){
		$this->load->model("Muser");
		$this->_data['loadPage']="user/edit_user";
		$this->_data['info']=$this->Muser->getUserById($id);
		$this->form_validation->set_rules("password","Password","trim");
		$this->form_validation->set_rules("password2","Re-Password","trim|matches[password]");
		$this->form_validation->set_rules("email","Email","required|valid_email|callback_check_email");
		if($this->form_validation->run() == TRUE){
            $data_update=array(
                'user_level'    => $this->input->post('level'),
                'user_email'    => $this->input->post('email'),
            );
            if($this->input->post("password")){
                $data_update['user_password']=$this->input->post("password");
            }
            $this->Muser->updateUser($data_update,$id);
            $this->session->set_flashdata("flash_mess","Updated");
            redirect(base_url()."user");
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
	public function check_email($email,$id){
        $this->load->model("Muser");
        $id=$this->uri->segment(3);
        if($this->Muser->checkEmail($email,$id) == FALSE){
            $this->form_validation->set_message("check_email","Your email has been registered, please try again");
            return FALSE;
        }else{
            return TRUE;
        }
    }
	public function delete_user($id){
        $this->load->model("Muser");
        $this->Muser->deleteUser($id);
        $this->session->set_flashdata("flash_mess","Deleted");
        redirect(base_url()."user");
    }
	public function logout() {
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('user/login_form', $data);
	}
}
?>

