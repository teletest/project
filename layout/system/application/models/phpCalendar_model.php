<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class phpCalendar_model extends Model{


    function phpCalendar_model()
	{
		parent::Model();
		
		$this->load->library('calendar');
	    $this->load->model('projects_model');

	}
    //Requires phpUser class
    //Requires phpCalendarEvent class

    private $month, $year, $display, $weeks;
    private $current, $prev, $next;
    
    /*
    *****************************************************
    Name: getNextMonth
    Function: This function will determine what the month following
        the specified month will be, and store information
        about this month including: name, abbreviated name, etc.
    *****************************************************
    */
    private function getNextMonth()
    {
        if ($this->current['month']==12)
             $this->next['month']=1;
             $this->next['year']=$this->current['year']+1;
        if ($this->current['month']!=12)
             $this->next['month']=$this->current['month']+1;
             $this->next['year']=$this->current['year'];
    }
    
    /*
    *****************************************************
    Name: getPrevMonth
    Function: This function will determine what the month preceding
        the specified month will be, and store information
        about this month including: name, abbreviated name, etc.
    *****************************************************
    */
    private function getPrevMonth()
    {
        if ($this->current['month']==1)
             $this->prev['month']=12;
             $this->prev['year']=$this->current['year']-1;    
        if ($this->current['month']!=1)
             $this->prev['month']=$this->current['month']-1;
             $this->prev['year']=$this->current['year'];
    }

    /*
    *****************************************************
    Name: showCalendar
    Function: This function generate and display the specified calendar
    *****************************************************
    */
    public function getCal( &$a)
    { 
	
	     
        date_default_timezone_set('America/Chicago');
		
        
		$calendar = "<div id='phpCalendar'>";
		
		    $calendar .= "<div class='weekhead'>";
            $calendar .= "<div class='nextprevdiv'>".'<span style="font-weight: bold; font-size: 16px "><a href="/teletestproject/project/index.php/projects/index/'.$this->prev["month"].'/'.$this->prev["year"].'"> <img height="45" width="83" src="/teletestproject/project/images/Prev1.gif" /> </a></span>'."</div>";
			$calendar .= "<div class='displaydiv'>".'<span style="font-weight: bold;  font-family: arial; font-size: 16px ">'.$this->current["m_text"]." ".$this->current["year"].'</span>'. "</div>";
			$calendar .= "<div class='nextprevdiv'>".'<span style="font-weight: bold; font-size: 16px "><a href="/teletestproject/project/index.php/projects/index/'.$this->next["month"].'/'.$this->next["year"].'"><img height="45" width="85" src="/teletestproject/project/images/Next1.gif" /></a></span>'."</div>";	
		    $calendar .= "</div>";
			
		    $calendar .= "<div class='dayhead'>";
			$calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Sun</span>'. "</div>";
            $calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Mon</span>'. "</div>";
			$calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Tue</span>'. "</div>";
			$calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Wed</span>'. "</div>";
			$calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Thu</span>'. "</div>";
			$calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Fri</span>'. "</div>";
			$calendar .= "<div class='weekday'>".'<span style="font-weight: bold; font-family: arial; font-size: 16px ">Sat</span>'. "</div>";	
		    $calendar .= "</div>";	 
            $date=1;
            $initpadding = date('w', mktime(0,0,0, $this->current['month'], 1, $this->current['year']));
            $m= $this->current['month']; 
			$y= $this->current['year']; 
            do 
            {
                $calendar .= "<div class='week'>";
                
                for ($i=0; $i<7; $i++)
                {
                    if ($initpadding > 0 || $date > $this->current['m_last_day']) {
                        $calendar .= "<div class='day'>&nbsp;";
                        $calendar .= "</div>";
                        $initpadding--;
                    }
                    else
                    {
					  
					    $d=$date++;
						// to add projects
					    $dd = '['.sprintf("%4d-%02d-%02d",$y,$m, $d).']';
						 $list="";
						if($a != NULL)
						{
						foreach ($a as $k => $v) 
						{ 
							if ( $dd == "[$k]" )
							{
							 foreach ( $a[$k] as $l => $v)
							 {
							  $id = $a[$k][$l]['id'];
							  $code = $a[$k][$l]['code'];
							  $list .="<ul>
							   <li><a href='/teletestproject/project/index.php/projects/projects_details/".$id."' rel='lyteframe' >".$code."</a></li>
							  </ul>";
							 }
							}
						}
						}		
                        $calendar .= "<div class='day'>" .$d.$list. "</div>";
						
                    }
                }
                
                $calendar .= "</div>";
            }
            while($date <= $this->current['m_last_day']);
            
        $calendar .= "</div>";
        
        return $calendar;
    }
    
    /*
    *****************************************************
    Name: __construct
    Function: Class constructor.  Used to initialize values required 
        to generate the calendar.
    *****************************************************
    */
    function __construct($month=null, $year=null) 
    { 
    
        date_default_timezone_set('America/Chicago');
    
        //If month is not specified, set $month variable to the current month, otherwise, use the specified month
        $this->current['month'] = ($month ? $month : date('n'));
        //If month is not specified, set $year variable to the current year, otherwise, use the specified year
        $this->current['year'] = ($year ? $year : date('Y'));
        //If name is not default, query name in database and store information about the desired
        //calendar in appropriate variables.
        
        //Set variables of the full text and abbreviated version of the specified month
        $this->current['m_text'] = date('F', mktime(0,0,0,$this->current['month'], 1, $this->current['year']));
        $this->current['m_abbr'] = date('M', mktime(0,0,0,$this->current['month'], 1, $this->current['year']));
        //Set variable of what todays date is
        $this->current['m_date'] = date('j');
        
        //Initialize variables for the previous and next month information
        $this->getNextMonth();
        $this->getPrevMonth();
        
        //Set variable of what the last day of the month is
        $this->current['m_last_day'] = date('j', mktime(0,0,0, $this->next['month'], 0, $this->next['year']));
        
    }
}
?>