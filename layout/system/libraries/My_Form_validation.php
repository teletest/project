<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Form_validation Class
 *
 * Extends Form_Validation library
 *
 * Allows for custom error messages to be added to the error array
 *
 * Note that this update should be used with the
 * form_validation library introduced in CI 1.7.0
 */
class MY_Form_validation extends CI_Form_validation {

    function My_Form_validation()
    {
        parent::CI_Form_validation();
    }
	// --------------------------------------------------------------------
	/**
	*
	* validate callback
	*
	*/
	function run($module = '', $group = '') 
	{
 		(is_object($module)) AND $this->CI =& $module;
 		return parent::run($group);
 	}

    // --------------------------------------------------------------------

    /**
     * Set Error
     *
     * @access  public
     * @param   string
     * @return  bool
    */  

    function set_error($error = '')
    {
        if (empty($error))
        {
            return FALSE;
        }
        else
        {
            $CI =& get_instance();

            $CI->form_validation->_error_array['custom_error'] = $error;

            return TRUE;
        }
    }
    // --------------------------------------------------------------------

    /**	
	* matches_pattern()
	
    * Ensures a string matches a basic pattern
    
	* # numeric, ? alphabetical, ~ any character
	
	*/
   function matches_pattern($str, $pattern)
   {
    	$characters = array(
		  '[', ']', '\\', '^', '$',
		  '.', '|', '+', '(', ')',
		  '#', '?', '~'            // Our additional characters
		);
 
		$regex_characters = array(
		  '\[', '\]', '\\\\', '\^', '\$',
		  '\.', '\|', '\+', '\(', '\)',
		  '[0-9]', '[a-zA-Z]', '.' // Our additional characters
		);
 
    	$pattern = str_replace($characters, $regex_characters, $pattern);
    
		if (preg_match('/^' . $pattern . '$/', $str)) return TRUE;
    	return FALSE;
  }
  
  function decimal($str)
  {
        return (bool)preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $str);
  }
}

?>
