<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends Controller
{
	function My_Controller()
	{
		parent::Controller();

		// a list of unlocked (ie: not password protected) controllers.  We assume
		// controllers are locked if they aren't explicitly on this list
		$unlocked = array('changelog', 'credits', 'welcome', 'help', 'login');

		if ( ! $this->site_sentry->is_logged_in() AND ! in_array(strtolower(get_class($this)), $unlocked))
		{
			redirect('login/');
		}
		$this->load->model('links_model'); //===== menu like feedback ====
		
		
		$option =  $this->options_model->get_options('debug_mode');

		$this->output->enable_profiler(($option['debug_mode'] == 'on')?TRUE:FALSE);
	}

}