	/* --------- SICON GANTT CHART -----------------------------------------------------------
	 * AUTHOR		: Dathq - ICT Service Engineering Jsc, - dathq@ise.com.vn
	 * LICENSE		: Free
	 * DESCRIPTION	: Create a new task item with these info
	 *		- from: start date (format: mm/dd/dddd)
	 *		- to: deadline of task (format: mm/dd/dddd)
	 *		- task: name of the task, what has to be solved (not includes ')
	 *		- resource: who have to solve this task (not includes ')
	 *		- progress: how is it going? (format: integer value from 0 to 100, not includes %)
	 *----------------------------------------------------------------------------------------*/
	function Task(from, to, task, resource, progress)
	{
		var _from = new Date();	
		var _to = new Date();
		var _task = task;
		var _resource = resource;						
		var _progress = progress;
		var dvArr = from.split('-');

		_from.setFullYear(parseInt(dvArr[0], 10), parseInt(dvArr[1], 10) - 1, parseInt(dvArr[2], 10));
		dvArr = to.split('-'); 
		_to.setFullYear(parseInt(dvArr[0], 10), parseInt(dvArr[1], 10) - 1, parseInt(dvArr[2], 10));		
		
		this.getFrom = function(){ return _from};
		this.getTo = function(){ return _to};
		this.getTask = function(){ return _task};
		this.getResource = function(){ return _resource};
		this.getProgress = function(){ return _progress};
	}
	
	function Gantt(gDiv)
	{
		var _GanttDiv = gDiv;
		var _taskList = new Array();		
		this.AddTaskDetail = function(value)
		{
			_taskList.push(value);
			
		}
		this.Draw = function()
		{
			var _offSet = 0;
			var _dateDiff = 0;
			var _currentDate = new Date();
			var _maxDate = new Date();
			var _minDate = new Date();	
			var _dTemp = new Date();
			var _firstRowStr = "<table border=1 style='border-collapse:collapse'><tr><td rowspan='2' width='200px' style='width:200px;'><div class='GTaskTitle' style='width:200px;'>Stage</div></td>";
			var _thirdRow = ""; 
			var _gStr = "";		
			var _colSpan = 0;
			var counter = 0;
			
			_currentDate.setFullYear(_currentDate.getFullYear(), _currentDate.getMonth(), _currentDate.getDate());
			if(_taskList.length > 0)
			{
				_maxDate.setFullYear(_taskList[0].getTo().getFullYear(), _taskList[0].getTo().getMonth(), _taskList[0].getTo().getDate());
				_minDate.setFullYear(_taskList[0].getFrom().getFullYear(), _taskList[0].getFrom().getMonth(), _taskList[0].getFrom().getDate());
				for(i = 0; i < _taskList.length; i++)
				{
					if(Date.parse(_taskList[i].getFrom()) < Date.parse(_minDate))
						_minDate.setFullYear(_taskList[i].getFrom().getFullYear(), _taskList[i].getFrom().getMonth(), _taskList[i].getFrom().getDate());
					if(Date.parse(_taskList[i].getTo()) > Date.parse(_maxDate))
						_maxDate.setFullYear(_taskList[i].getTo().getFullYear(), _taskList[i].getTo().getMonth(), _taskList[i].getTo().getDate());						
				}
				
				//---- Fix _maxDate value for better displaying-----
				// Add at least 5 days
				
				if(_maxDate.getMonth() == 11) //December
				{
					if(_maxDate.getDay() + 5 > getDaysInMonth(_maxDate.getMonth() + 1, _maxDate.getFullYear()))					
						_maxDate.setFullYear(_maxDate.getFullYear() + 1, 1, 5); //The fifth day of next month will be used
					else
						_maxDate.setFullYear(_maxDate.getFullYear(), _maxDate.getMonth(), _maxDate.getDate() + 5); //The fifth day of next month will be used
				}
				else
				{
					if(_maxDate.getDay() + 5 > getDaysInMonth(_maxDate.getMonth() + 1, _maxDate.getFullYear()))					
						_maxDate.setFullYear(_maxDate.getFullYear(), _maxDate.getMonth() + 1, 5); //The fifth day of next month will be used
					else
						_maxDate.setFullYear(_maxDate.getFullYear(), _maxDate.getMonth(), _maxDate.getDate() + 5); //The fifth day of next month will be used
				}
				
				//--------------------------------------------------
				
				_gStr = "";
				_gStr += "</tr><tr>";
				_thirdRow = "<tr><td>&nbsp;</td>";
				_dTemp.setFullYear(_minDate.getFullYear(), _minDate.getMonth(), _minDate.getDate());
				while(Date.parse(_dTemp) <= Date.parse(_maxDate))
				{	
					if(_dTemp.getDay() % 6 == 0) //Weekend
					{
						_gStr += "<td class='GWeekend'><div style='width:24px;'>" + _dTemp.getDate() + "</div></td>";
						if(Date.parse(_dTemp) == Date.parse(_currentDate))						
							_thirdRow += "<td id='GC_" + (counter++) + "' class='GToDay' style='height:" + (_taskList.length * 21) + "'>&nbsp;</td>";
						else
							_thirdRow += "<td id='GC_" + (counter++) + "' class='GWeekend' style='height:" + (_taskList.length * 21) + "'>&nbsp;</td>";
					}
					else
					{
						_gStr += "<td class='GDay'><div style='width:24px;'>" + _dTemp.getDate() + "</div></td>";
						if(Date.parse(_dTemp) == Date.parse(_currentDate))						
							_thirdRow += "<td id='GC_" + (counter++) + "' class='GToDay' style='height:" + (_taskList.length * 21) + "'>&nbsp;</td>";
						else
							_thirdRow += "<td id='GC_" + (counter++) + "' class='GDay'>&nbsp;</td>";
					}
					if(_dTemp.getDate() < getDaysInMonth(_dTemp.getMonth() + 1, _dTemp.getFullYear()))
					{
						if(Date.parse(_dTemp) == Date.parse(_maxDate))
						{							
							_firstRowStr += "<td class='GMonth' colspan='" + (_colSpan + 1) + "'>T" + (_dTemp.getMonth() + 1) + "/" + _dTemp.getFullYear() + "</td>";							
						}
						_dTemp.setDate(_dTemp.getDate() + 1);
						_colSpan++;
					}					
					else 
					{
						_firstRowStr += "<td class='GMonth' colspan='" + (_colSpan + 1) + "'>T" + (_dTemp.getMonth() + 1) + "/" + _dTemp.getFullYear() + "</td>";
						_colSpan = 0;
						if(_dTemp.getMonth() == 11) //December
						{
							_dTemp.setFullYear(_dTemp.getFullYear() + 1, 0, 1);
						}
						else
						{
							_dTemp.setFullYear(_dTemp.getFullYear(), _dTemp.getMonth() + 1, 1);
						}
					}					
				}
				_thirdRow += "</tr>"; 				
				_gStr += "</tr>" + _thirdRow;				
				_gStr += "</table>";
				_gStr = _firstRowStr + _gStr;				
				for(i = 0; i < _taskList.length; i++)
				{
					_offSet = (Date.parse(_taskList[i].getFrom()) - Date.parse(_minDate)) / (24 * 60 * 60 * 1000);
					_dateDiff = (Date.parse(_taskList[i].getTo()) - Date.parse(_taskList[i].getFrom())) / (24 * 60 * 60 * 1000) + 1;
					_gStr += "<div style='position:absolute; top:" + (20 * (i + 2)) + "; left:" + (_offSet * 27 + 204) + "; width:" + (27 * _dateDiff - 1 + 100) + "'><div title='" + _taskList[i].getTask() + "' class='GTask' style='float:left; width:" + (27 * _dateDiff - 1) + "px;'>" + getProgressDiv(_taskList[i].getProgress()) + "</div><div style='float:left; padding-left:3'>" + _taskList[i].getResource() + "</div></div>";
					_gStr += "<div style='position:absolute; top:" + (20 * (i + 2) + 1) + "; left:5px'>" + _taskList[i].getTask() + "</div>";
				}
				_GanttDiv.innerHTML = _gStr;
			}
		}
	}		
	
	function getProgressDiv(progress)
	{
		return "<div class='GProgress' style='width:" + progress + "%; overflow:hidden'></div>"
	}
	// GET NUMBER OF DAYS IN MONTH
	function getDaysInMonth(month, year)  
	{
		
		var days;		
		switch(month)
		{
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				days = 31;
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				days = 30;
				break;
			case 2:
				if (((year% 4)==0) && ((year% 100)!=0) || ((year% 400)==0))				
					days = 29;				
				else								
					days = 28;				
				break;
		}
		return (days);
	}				
	/*----- END OF MY CODE FOR Gantt CHART GENERATOR -----*/

