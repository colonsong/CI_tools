<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colon extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $this->load->helper('cookie');
	  $this->load->library('session');
	}

	public function index()
	{
		die('@@@');
	}

	public function get_session()
	{
		$this->session->set_userdata('some_name', 'some_value');
		echo $this->session->userdata('some_name');
		var_dump($_SESSION);
	}

	public function set_mycookie()
	{

		var_dump($_SESSION);
		$cookie = array(
	        'name'   => 'home_set',
	        'value'  => 'home page Change',
	        
        );
 		set_cookie('home_set','aaaaa',123456);
 		var_dump(get_cookie('home_set'));
 		var_dump($_COOKIE);

 		
 		echo '@@@';
		
		 
		// get cookie
		 
		
		 
		// delete cookie
		// $cookie = array(
		//     'name'   => 'home_set',
		//     'value'  => '',
		//     'expire' => '0',
		//     'domain' => '.localhost',
		//     'prefix' => 'arjun_'
		//     );
		 
		// delete_cookie($cookie);

	}
}
