<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'\mytrait\ValidatesRequests.php';
class Api extends CI_Controller 
{
	use blog\application\mytrait\ValidatesRequests;

	function __construct()
	{
	  parent::__construct();
	}

	public function test_fun() 
	{
		$_POST  = [];
		$_POST['name'] = 'colon';
		$_POST['age'] =  '19';

		$post_data = $_POST;

		$messge = [
	        'name.required' => '標題是必填的',
	        'age.required'  => '訊息是必填的',
    	];

		$res = $this->validate($post_data, ['name'=> ['required', 'max:1'],
			                                'age' => ['required','numeric'] 
			                                ],
			                                 $messge);

		var_dump($res);



	}
}