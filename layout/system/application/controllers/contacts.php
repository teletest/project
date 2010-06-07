<?php
class Contacts extends My_Controller {

	function Contacts()
	{
		parent::My_Controller();
	    $this->load->helper('download');
	}

	function index()
	{
		$data = tags();
		$data['tabs']	= tabs('contacts');
		$data['links_menu'] =  $this->links_model->menu();
		
		$data['abc_tabs'] = $this->_abc_tabs();
		$data['details'] = array();
		$data['contacts'] = array();
		
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('persons');
		$result = $query->result();
		foreach($result as $row)
		{
			$data['contacts'][] = array(
				'url' => anchor('contacts/detail/' . $row->id, $row->name)
			);
		}
		
		$this->parser->parse('contacts/index', $data);		
	}
	
	function filter($f)
	{
		$data = tags();
		$data['tabs']	= tabs('contacts');
		$data['links_menu'] =  $this->links_model->menu();
		$data['abc_tabs'] = $this->_abc_tabs();
		$data['details'] = array();
		$data['contacts'] = array();
		
		$this->db->like("name", "$f", "after");
		$this->db->or_like("name", " $f");
		$query = $this->db->get('persons');
		$result = $query->result();
		foreach($result as $row)
		{
			$data['contacts'][] = array(
				'url' => anchor('contacts/detail/' . $row->id, $row->name)
			);
		}
		
		
		$this->parser->parse('contacts/index', $data);
	}
	
	function detail($id)
	{
		$data = tags();
		$data['tabs']	= tabs('contacts');
		$data['links_menu'] =  $this->links_model->menu();
		$data['abc_tabs'] = $this->_abc_tabs();
		$data['contacts'] = array();
		
		$query = $this->db->get_where('persons', array('id'=>$id));
		$data['details'] = $query->result();
	
		$this->parser->parse('contacts/index', $data);
	}
	
	function _abc_tabs()
	{
		$abc = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		for($i=0;$i<strlen($abc);$i++)
		{
			$abc_tabs[]=array(
				'url' => anchor('contacts/filter/' . $abc[$i],$abc[$i])
			);
		}
		return $abc_tabs;	
	}
	function download_file( $id )
	{
	   
	    $query = $this->db->get_where('persons', array('id'=>$id));
		$results = $query->result_array();
		             $info = "";
				     $info .= "Name :". $results[0]['name']."
 Login :". $results[0]['login']."
 email :". $results[0]['email']."
 Manager's Name :". $results[0]['manager_name']."
 Assistant's Name :". $results[0]['assisstant_name']."
 Assistant's Phone :". $results[0]['assisstant_phone']." 
 Company : ". $results[0]['company']."
 Department :". $results[0]['department']."
 Web Page : ". $results[0]['web_page']."
 ";

        $name = 'contact details.txt';
        force_download($name, $info);
		$pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		redirect($pieces[1]);
		
	}
}


/* End of file contacts.php */
/* Location: ./system/application/controllers/contacts.php */