<?php  if (!defined('APPPATH')) exit('No direct script access allowed');

/*
 * @Author: Dean Ericson
 * @Email: mail@deanericson.com
 *
 */
final class BreadCrumbList{
	private $breadCrumbs;
	private $CI;
	private $delimiter;
	function BreadCrumbList(){
		$this->CI =& get_Instance();
		$delimiter = $this->CI->config->item('breadcrumbDelimiter');

		if(!empty($_SESSION['breadCrumbList'])){
			$s1 = $_SESSION['breadCrumbList'];
			$this->breadCrumbs = $s1;
		}else{
			$this->breadCrumbs = array();
		}
		if(!isset($delimiter)){
			$this->setDelimiter('&rarr;');
		}else{
			$this->setDelimiter($delimiter);
		}

	}
	function reset(){
		$this->breadCrumbs = array();
	}
	function add($bc){
			$tmpArr = array();
			if($bc->isRoot()){
				$this->reset();
			}
			if(!in_array($bc, $this->breadCrumbs)){
				$this->breadCrumbs[] = $bc;
				$_SESSION['breadCrumbList']=$this->breadCrumbs;
			}else{
				// in array, remove objects after index
				$index = array_search($bc,$this->breadCrumbs);
				for($i=(count($this->breadCrumbs)-1); $i>=($index+1); $i-- ){
					unset($this->breadCrumbs[$i]);
				}
				$_SESSION['breadCrumbList']=$this->breadCrumbs;
			}
	}
	function display(){
		$iter = $_SESSION['breadCrumbList'];
		$i=1;
		$return_str='';
		foreach($iter as $bc){
			$uBC = $bc;
			$del = $i < count($iter)?$this->delimiter:'';
			if($i < count($iter)){
				$return_str .= anchor($uBC->getUrl(),$uBC->getTitle(), array('class'=>'activeBreadCrumbs')).' '.$del;
			}else{
				$return_str .= "<span class=\"nonActiveBreadCrumbs\">".$uBC->getTitle().'</span> '.$del;
			}
		$i++;
		}
		return $return_str;
	}
	function getBreadCrumbs(){
		return $this->breadCrumbs;
	}
	function setBreadCrumbs($b){
		$this->breadCrumbs=$b;
	}
	function getCI(){
		return $this->CI;
	}
	function setCI($c){
		$this->CI=$c;
	}
	function getDelimiter(){
		return $this->delimiter;
	}
	function setDelimiter($d){
		$this->delimiter='<span class="delimiter" >'.$d.'</span>';
	}
}
?>
