<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
    }
    
	public function checkUserLogin($email, $password) {

		$this ->db-> select('*');
		$this ->db-> from('users');
		$this ->db-> where('email', $email);
		$this ->db-> where('password', $password);
		$this ->db-> limit(1);

		$query = $this -> db -> get();
 
		if($query -> num_rows() == 1)
			return $query->row();
		else
			return false;
	}
	// check admin login
	public function checkAdminLogin($email, $password) {

		$this ->db-> select('*');
		$this ->db-> from('users');
		$this ->db-> where('email', $email);
		$this ->db-> where('password', $password);
		$this ->db-> limit(1);

		$query = $this -> db -> get();
 
		if($query -> num_rows() == 1)
			return $query->row();
		else
			return false;
	}

}