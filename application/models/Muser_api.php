<?php
class Muser_api extends CI_Model{
        protected $_table="user_api";
        public function __construct(){
                parent::__construct();
        }
	public function api_auth($data) {
                $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
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

}
