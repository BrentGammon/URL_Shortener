<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links_model extends CI_Model{


public function checkCode($code){
	$sql ="SELECT url FROM LINKS WHERE code = ?";
	$query = $this->db->query($sql,$code);
	if($query->num_rows()==0){
		return false;
	}else{
		return true;
	}
	//checks if code generated is in the database
	
	
}

public function addCode($url,$code){
	date_default_timezone_set("Europe/London") ;
	$sql = "INSERT INTO LINKS (url,code,submitted,date) VALUES($)";
	$data = array(
		'url'=> $url,
		'code'=>$code,
		'submitted'=> date_default_timezone_get()//date is created when the function is called in format of Mysql
		);	
		$this->db->insert('LINKS',$data);
}

public function getLink($code){
	
	$sql = "SELECT url FROM LINKS WHERE code = ?";
	$query = $this->db->query($sql,$code);
	return $query->row();
	
	//returns the url that is asscoited to the code in the database
}

public function getCode($url){
	$sql = "SELECT code FROM LINKS WHERE url = ?";
	$query = $this->db->query($sql,$url);
	return $query->row();
	
}



public function checkURL($url){
	$sql ="SELECT url FROM LINKS WHERE url = ?";
	$query = $this->db->query($sql,$url);
	if($query->num_rows()==0){
		return false;
	}else{
		return true;
	}
	
}




}


?>