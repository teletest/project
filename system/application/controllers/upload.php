<?php
class Upload extends Controller
{
	function Upload()
	{
		parent::Controller();
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	
	/*
	*	Display upload form
	*/
	function index()
	{
		$data = tags();
		$data['tabs']	= tabs('home');
		$this->parser->parse('upload/view', $data);
		//$this->load->view('upload/view');
	}
	
	
	/*
	*	Handles JSON returned from /js/uploadify/upload.php
	*/
	function uploadify()
	{
		$data = tags();
		$data['tabs']	= tabs('home');
		//Decode JSON returned by /js/uploadify/upload.php
		$file = $this->input->post('filearray');
		$data['json'] = json_decode($file);
		//print_r($data['json']);
		$this->parser->parse('upload/uploadify', $data);
		//$this->load->view('upload/uploadify',$data);
	}
	
}
/* End of File /application/controllers/upload.php */