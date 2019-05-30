<?php
class Muser extends CI_Model{
        protected $_table="user_login";
        public function __construct(){
                parent::__construct();
        }
	public function login($data) {
		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function api_auth($api_user) {
		$condition = "user_name =" . "'" . $api_user['username'] . "' AND " . "user_password =" . "'" . $api_user['password'] . "'";
                $this->db->select('*');
                $this->db->from('user_api');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();
                if ($query->num_rows() == 1) {
                        return true;
                } else {
                        return false;
                }
	}
	public function read_user_information($username) {
		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function listAllUser($all,$start){
                                $sql = 'SELECT * FROM '.$this->_table;

                $sql .= ' LIMIT '.$start.', '.$all;
                //$this->db->limit($all,$start);
                return $this->db->query($sql)->result_array();
        }
	public function listMember($id) {
                $sql = 'SELECT *
                        FROM '.$this->_table.'
                        WHERE id = '.$id;
                return $this->db->query($sql)->result_array();
        }

	public function countAll(){
                return $this->db->count_all($this->_table);
        }
	public function checkUsername($user,$id=""){
                if($id != ""){
                        $this->db->where("id !=",$id);
                }
                $this->db->where("user_name",$user);
                $query=$this->db->get($this->_table);
                if($query->num_rows() > 0){
                        return FALSE;
                }else{
                        return TRUE;
                }
        }
	public function checkLogin($u,$p){
                $this->db->where("user_name",$u);
                $this->db->where("user_password",$p);
                $query=$this->db->get($this->_table);
                if($query->num_rows() > 0){
                        return $query->row_array();
                }else{
                        return FALSE;
                }
        }
	public function checkEmail($email,$id=""){
                if($id != ""){
                        $this->db->where("id !=",$id);
                }
                $this->db->where("user_email",$email);
                $query=$this->db->get($this->_table);
                if($query->num_rows() > 0){
                        return FALSE;
                }else{
                        return TRUE;
                }
        }
	public function updateUser($data_update,$id){
                $this->db->where("id",$id);
                $this->db->update($this->_table,$data_update);
        }

	public function deleteUser($id){
                $this->db->where("id",$id);
                $this->db->delete($this->_table);
        }
	public function insertUser($data_insert){
                $this->db->insert($this->_table,$data_insert);
        }
	public function getUserById($id){
                $this->db->where("id",$id);
                return $this->db->get($this->_table)->row_array();
        }

}
