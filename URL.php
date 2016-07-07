<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class URL extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home');
	}
	

	public function get($code = null){
		if($code==null){
			$error['mess'] = "URL Is Not Found In Our System";
				$this->load->view('home',$error);
				return;
		}
		
		$this->load->model('Links_model');
		$web = $this->Links_model->getLink($code);
		$url = $web->url;
		redirect($url);
		
	}
	
	
	
	
	
	
	
	private function check($code = null){
		if($code == null){
			$error['errorMessage'] = "Please Enter a Valid URL";
			$this->load->view('home',$link);
		}
		$this->load->model('Links_model');
		$check = $this->Links_model->checkCode($code);
		return $check;

		
	}
	
	/**
	*This function will create a random string with the length of 4/5/6/7 
	*@return the created string 
	*/
	private function random(){
		$list = array('Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','1','2','3','4','5','6','7','8','9','0');	
		$length = count($list);
		$num = rand(4,7);
		$url_code="";
		
		for($i=0;$i<$num;$i++){
			$value = rand(0,$length-1);
			$url_code .= $list[$value];
		}
		return $url_code;
	}
	
	
	
	
	
	public function add(){
		$link;
		$url = $this->input->post('site');
		
		
		if($url==null){
			$code['mess'] = "Please Enter a Valid URL";
				$this->load->view('home',$code);
				return;
		}
		
		
		$this->load->model('Links_model');
		
		if($this->Links_model->checkURL($url)==false){
			$inUse = true;
			$code;
			while($inUse==true){
				$code = $this->random();
				$inUse = $this->Links_model->checkCode($code);
			}
			$this->Links_model->addCode($url,$code);
			$link['code'] = $this->Links_model->getCode($url);
		}else{			
			$link['code'] = $this->Links_model->getCode($url);
		}
		$this->load->view('home',$link);
		
	}
	
	
	
	
}
