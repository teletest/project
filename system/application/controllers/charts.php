<?php
/**
 * Teletest
 *
 * A telecommunication sites rollout management system
 */

// ------------------------------------------------------------------------

/**
 * Teletest Charts Controller
 *
 * This controller manages all of the request to manage a project and the related sites.
 */
class Charts extends My_Controller {
/**
* Constructor
*
* Loads the different related model classes etc.
*
* @access public
*/
    function Charts()
	{
		parent::My_Controller();
		$this->load->model('charts_model');
		$this->load->model('projects_model');
		$this->load->model('admin_model');
		$this->load->model('sites_model');
		$this->load->plugin( 'fusion' );		
	}
	
	function index()
	{
		$data = tags();
		$data['tabs']	= tabs('charts');
		$data['chart_type']= "AngularGauge.swf";
		// Angular2
		$strXML  = "";
		$strXML .= "<chart lowerLimit='0' upperLimit='100' numberSuffix='%25' chartTopMargin='100' bgColor='FFFFFF' showBorder='0' chartBottomMargin='20' basefontColor='FFFFFF' toolTipBgColor='453269'>";
		$strXML .= "<colorRange>";
		$strXML .= "<color minValue='0' maxValue='75' code='FF654F'/>";
	    $strXML .= "<color minValue='75' maxValue='90' code='F6BD0F'/>";
		$strXML .= "<color minValue='90' maxValue='100' code='8BBA00'/>";
		$strXML .= "</colorRange>";
		$strXML .= "<dials>";
		$strXML .= "<dial value='92' rearExtension='10'/>";
		$strXML .= "</dials>";
		$strXML .= "<annotations>";
		$strXML .= "<annotationGroup id='Grp1' showBelow='1' >";
					/* Rectangles behind the gauge */
		$strXML .= "<annotation type='rectangle' x='0' y='0' toX='400' toY='200' radius='10' fillColor='333333, 453269' fillAngle='180' />";
		$strXML .= "<annotation type='rectangle' x='5' y='5' toX='395' toY='195' radius='10' color='000000' fillAlpha='0' showBorder='1' borderColor='FFFFFF' borderThickness='3'/>";
					/* Logo above the gauge */
		$strXML .= "<annotation type='image' x='110' y='7' URL='{site_url}charts/Resources/logo.gif' />";
		$strXML .= "</annotationGroup>";
		$strXML .= "</annotations>";
        $strXML .= "</chart>";
		$data['xml'] = $strXML;	
	    $this->parser->parse('charts/index', $data);		
		
	}
	function Angular1()
	{
		$data = tags();
		$data['tabs']	= tabs('charts');
		$data['chart_type']= "AngularGauge.swf";
		$data['height'] = 270; 
	    $data['width'] = 270;
		// Angular1
		$strXML  = "";
		$strXML .= "<chart bgColor='333333' bgAlpha='100' gaugeStartAngle='90' gaugeEndAngle='-270' lowerLimit='0' upperLimit='12' lowerLimitDisplay=' ' upperLimitDisplay='12' majorTMNumber='12' majorTMThickness='3' majorTMColor='FFFFFF' majorTMHeight='7' minorTMNumber='4' minorTMColor='FFFFFF' minorTMHeight='4' placeValuesInside='1' tickValueStep='3' tickValueDistance='20' gaugeOuterRadius='95' gaugeInnerRadius='95' showShadow='0' pivotRadius='6' pivotFillColor='FFFFFF' annRenderDelay='0'> ";
		$strXML .= "<dials>";
		$strXML .= "<dial value='5' color='FFFFFF' baseWidth='3' topWidth='1' radius='70' rearExtension='12'/>";
		$strXML .= "</dials>";
		$strXML .= "<annotations>";
			/* circles behind the gauge */
		$strXML .= "<annotationGroup id='Grp1' showBelow='1'>";
		$strXML .= "<annotation type='circle' x='135' y='135' color='EBF0F4,85898C,484C4F,C5C6C8' fillRatio='30,30,30,10' fillAngle='270' radius='120' fillPattern='linear' />";
		$strXML .= "<annotation type='circle' x='135' y='135' color='8E8E8E,83878A,E7E7E7' fillAngle='270' radius='105' fillPattern='linear' /> ";
		$strXML .= "<annotation type='circle' x='135' y='135' color='07476D,19669E,186AA6,D2EAF6' fillRatio='5,45,40,10' fillAngle='270' radius='103' fillPattern='linear' />";
		$strXML .= "<annotation type='circle' x='135' y='135' color='07476D,19669E,07476D' fillRatio='5,90,5' fillAngle='270' radius='100' fillPattern='linear' />";
		$strXML .= "</annotationGroup>";
	
			/* Circle behind the pivot */
		$strXML .= "<annotationGroup id='Grp2' showBelow='1'>";
		$strXML .= "<annotation type='circle' x='135' y='135' radius='12' color='012A46' />";
		$strXML .= "</annotationGroup>";
		$strXML .= "</annotations>";
		$strXML .= "<styles>";
		$strXML .= "<definition>";
		$strXML .= "<style name='TTipFont' type='font' color='FFFFFF' bgColor='012A46' borderColor='706C11' font='Verdana' size='10' />";
		$strXML .= "<style name='ValueFont' font='Times New Roman' italic='1' type='font' size='18' color='FFFFFF' bold='1' />";
		$strXML .= "</definition>";
	
		$strXML .= "<application>";
		$strXML .= "<apply toObject='TOOLTIP' styles='TTipFont' />";
		$strXML .= "<apply toObject='TICKVALUES' styles='ValueFont' />";
		$strXML .= "<apply toObject='LIMITVALUES' styles='ValueFont' />";
		$strXML .= "</application>";
		$strXML .= "</styles>";
	    $strXML .= "</chart>";
		
		$data['xml'] = $strXML;	
	    $this->parser->parse('charts/index', $data);
	}
	function Angular2()
	{
	    $data = tags();
		$data['tabs']	= tabs('charts');
		$data['chart_type']= "AngularGauge.swf";
		$data['height'] = 400; 
	    $data['width'] = 200; 
		// Angular2
		$strXML  = "";
		$strXML .= "<chart lowerLimit='0' upperLimit='100' numberSuffix='%25' chartTopMargin='100' bgColor='FFFFFF' showBorder='0' chartBottomMargin='20' basefontColor='FFFFFF' toolTipBgColor='453269'>";
			
		$strXML .= "<colorRange>";
		$strXML .= "<color minValue='0' maxValue='75' code='FF654F'/>";
	    $strXML .= "<color minValue='75' maxValue='90' code='F6BD0F'/>";
		$strXML .= "<color minValue='90' maxValue='100' code='8BBA00'/>";
		$strXML .= "</colorRange>";
		$strXML .= "<dials>";
		$strXML .= "<dial value='92' rearExtension='10'/>";
		$strXML .= "</dials>";
		$strXML .= "<annotations>";
		$strXML .= "<annotationGroup id='Grp1' showBelow='1' >";
					/* Rectangles behind the gauge */
		$strXML .= "<annotation type='rectangle' x='0' y='0' toX='400' toY='200' radius='10' fillColor='333333, 453269' fillAngle='180' />";
		$strXML .= "<annotation type='rectangle' x='5' y='5' toX='395' toY='195' radius='10' color='000000' fillAlpha='0' showBorder='1' borderColor='FFFFFF' borderThickness='3'/>";
					/* Logo above the gauge */
		$strXML .= "<annotation type='image' x='110' y='7' URL='{site_url}charts/Resources/logo.gif' />";
		$strXML .= "</annotationGroup>";
		$strXML .= "</annotations>";
        $strXML .= "</chart>";
		$data['xml'] = $strXML;	
	    $this->parser->parse('charts/index', $data);
	}
	function Angular3()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 250; 
	  $data['width'] = 250; 
	  // Angular1
	  $strXML  = "";
	  $strXML .= "<chart palette='4' lowerLimit='0' upperLimit='100' gaugeStartAngle='220' gaugeEndAngle='-40' numberSuffix='%25' bgColor='FFFFFF' showBorder='0' basefontColor='FFFFFF' gaugeOuterRadius='90' gaugeInnerRadius='75' chartTopMargin='45' toolTipBgColor='AEC0CA' toolTipBorderColor='FFFFFF' pivotRadius='6'>";
	  $strXML .= "<colorRange>";
	  $strXML .= "<color minValue='0' maxValue='100' code='F6BD0F'/>";
	  $strXML .= "</colorRange>";
	  $strXML .= "<trendpoints>";
	  $strXML .= "<point startValue='70' endValue='100' color='E10000' radius='75' innerRadius='70' alpha='70'/>";
	  $strXML .= "</trendpoints>";
	  $strXML .= "<dials>";
	  $strXML .= "<dial value='62' rearExtension='10' baseWidth='6' />";
	  $strXML .= "</dials>";
	  $strXML .= "<annotations>";
		/* Rectangles below the gauge */
	  $strXML .= "<annotationGroup id='Grp1' showBelow='1'>";
	  $strXML .= "<annotation type='rectangle' x='0' y='0' toX='250' toY='250' radius='10' fillColor='AEC0CA, 333333, AEC0CA' fillAngle='90' />";
	  $strXML .= "<annotation type='rectangle' x='5' y='5' toX='245' toY='245' radius='10' fillColor='333333, C3D0D8, 333333' fillAngle='90' />";
	  $strXML .= "<annotation type='rectangle' x='10' y='10' toX='240' toY='240' radius='10' fillColor='C4D5DC, A3A5A4' fillAngle='180' />";
	  $strXML .= "</annotationGroup>";
	  $strXML .= "</annotations>";
      $strXML .= "</chart>";
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular4()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 300; 
	  $data['width'] = 300; 
	  $strXML  = "";
	  $strXML .= "<Chart palette='3' bgColor='333333, 453269' bgAlpha='100' lowerLimit='0' upperLimit='100' gaugeStartAngle='240' gaugeEndAngle='-60' gaugeInnerRadius='60%' gaugeFillMix='{light-10},{light-30},{light-20},{dark-5},{color},{light-30},{light-20},{dark-10}' gaugeFillRatio=''  baseFontColor='FFFFFF' toolTipBgColor='333333' toolTipBorderColor='333333' decimals='1'>";
      $strXML .= "<colorRange>";
	  $strXML .= "<color minValue='0' maxValue='30' />";
      $strXML .= "<color minValue='30' maxValue='50' />"; 
	  $strXML .= "<color minValue='50' maxValue='80' />"; 
      $strXML .= "<color minValue='80' maxValue='100'  />"; 
      $strXML .= "</colorRange>"; 

      $strXML .= "<dials>"; 
	  $strXML .= "<dial id='Dial1' value='60.2' baseWidth='6' topWidth='1' editMode='1' showValue='1' rearExtension='10' valueY='270' />";
	  $strXML .= "<dial id='Dial2' value='50.3' baseWidth='6' topWidth='1' editMode='1' rearExtension='10' showValue='1' valueY='250'/>";	
      $strXML .= "</dials>";
      $strXML .= "<styles>";
      $strXML .= "<definition>";
      $strXML .= "<style type='font' name='valueFont' borderColor='FFFFFF' bold='1' size='13'/>";
      $strXML .= "</definition>";
      $strXML .= "<application>";
      $strXML .= "<apply toObject='value' styles='valueFont'/>";
      $strXML .= "</application>";
      $strXML .= "</styles>";
      $strXML .= "</Chart>";
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular5()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 350; 
	  $data['width'] = 200; 
	  $strXML  = "";
	  $strXML .= "<chart bgAlpha='0' bgColor='FFFFFF' lowerLimit='0' upperLimit='100' numberSuffix='%25' showBorder='0' basefontColor='FFFFDD' chartTopMargin='25' chartBottomMargin='25' chartLeftMargin='25' chartRightMargin='25' toolTipBgColor='80A905' gaugeFillMix='{dark-10},FFFFFF,{dark-10}' gaugeFillRatio='3'>";
      $strXML .= "<colorRange>";
      $strXML .= "<color minValue='0' maxValue='45' code='FF654F'/>";
      $strXML .= "<color minValue='45' maxValue='80' code='F6BD0F'/>";
      $strXML .= "<color minValue='80' maxValue='100' code='8BBA00'/>";
      $strXML .= "</colorRange>";

      $strXML .= "<dials>";
      $strXML .= "<dial value='92' rearExtension='10'/>";
      $strXML .= "</dials>";

      $strXML .= "<trendpoints>";
      $strXML .= "<point value='50' displayValue='Average' fontcolor='FF4400' useMarker='1' dashed='1' dashLen='2' dashGap='2' valueInside='1' />";
      $strXML .= "</trendpoints>";

      /* Rectangles behind the gauge */
      $strXML .= "<annotations>";
      $strXML .= "<annotationGroup id='Grp1' showBelow='1' >";
      $strXML .= "<annotation type='rectangle' x='5' y='5' toX='345' toY='195' radius='10' color='009999,333333' showBorder='0' />";
      $strXML .= "</annotationGroup>";
      $strXML .= "</annotations>";

      $strXML .= "<styles>";
      $strXML .= "<definition>";
      $strXML .= "<style name='RectShadow' type='shadow' strength='3'/>";
      $strXML .= "</definition>";
      $strXML .= "<application>";
      $strXML .= "<apply toObject='Grp1' styles='RectShadow' />";
      $strXML .= "</application>";
      $strXML .= "</styles>";
      $strXML .= "</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	  
	}
	function Angular6()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 320; 
	  $data['width'] = 320; 
	  $strXML  = "";
	  
	  $strXML .= "<chart bgCOlor='FFFFFF' upperLimit='240' lowerLimit='0' baseFontColor='FFFFFF'  majorTMNumber='9' majorTMColor='FFFFFF'  majorTMHeight='8' majorTMThickness='5' minorTMNumber='5' minorTMColor='FFFFFF' minorTMHeight='3' minorTMThickness='2' pivotRadius='10' pivotBgColor='000000' pivotBorderColor='FFFFFF' pivotBorderThickness='2' hoverCapBorderColor='FFFFFF' toolTipBgColor='333333'  gaugeOuterRadius='135' gaugeScaleAngle='300' gaugeAlpha='0' decimalPrecision='0' displayValueDistance='0' showColorRange='0' placeValuesInside='1' pivotFillMix='' showPivotBorder='1' pivotBorderColor='FFFFFF' pivotBorderThickness='2' annRenderDelay='0'> ";
	  $strXML .= "<dials>"; 	
	  $strXML .= "<dial value='65' bgColor='000000' borderColor='FFFFFF' borderAlpha='100' baseWidth='4' topWidth='4' borderThickness='2'/>";
	  $strXML .= "</dials>";	
	  $strXML .= "<annotations>";
		/* Draw the black background */
	  $strXML .= "<annotationGroup xPos='160' yPos='160'>";	
	  $strXML .= "<annotation type='circle' radius='150' startAngle='0' endAngle='360' fillAsGradient='1' fillColor='4B4B4B, AAAAAA' fillAlpha='100,100'  fillRatio='95,5' />";
	  $strXML .= "<annotation type='circle' xPos='0' yPos='0' radius='140' startAngle='0' endAngle='360' showBorder='1' borderColor= 'cccccc' fillAsGradient='1'  fillColor='ffffff, 000000'  fillAlpha='50,100'  fillRatio='1,99' />";
	  $strXML .= "</annotationGroup>";
		/* To display indicator */
	  $strXML .= "<annotationGroup xPos='160' yPos='280' showBelowChart='0'>";	
	  $strXML .= "<annotation type='text' label='KPH' fontColor='FFFFFF' fontSize='14' isBold='1'/>";
	  $strXML .= "</annotationGroup>";
	  $strXML .= "</annotations>";
      $strXML .= "</chart>";
      $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	
	function Angular7()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 400; 
	  $data['width'] = 250; 
	  $strXML  = "";
	  $strXML .="<Chart bgColor='AEC0CA,FFFFFF' fillAngle='45' upperLimit='2500000' lowerLimit='1600000' majorTMNumber='10' majorTMHeight='8' showGaugeBorder='0' gaugeOuterRadius='140' gaugeOriginX='205' gaugeOriginY='206' gaugeInnerRadius='2' formatNumberScale='1' numberPrefix='$' displayValueDistance='30' decimalPrecision='2' tickMarkDecimalPrecision='1' pivotRadius='17' showPivotBorder='1' pivotBorderColor='000000' pivotBorderThickness='5' pivotFillMix='FFFFFF,000000'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='1600000' maxValue='1930000' code='399E38'/>";
	  $strXML .="<color minValue='1930000' maxValue='2170000' code='E48739'/>";
	  $strXML .="<color minValue='2170000' maxValue='2500000' code='B41527'/>";
	  $strXML .="</colorRange>";
	  $strXML .="<dials>";
	  $strXML .="<dial value='2100000' borderAlpha='0' bgColor='000000' baseWidth='28' topWidth='1' radius='130'/>";
	  $strXML .="</dials>";
	  $strXML .="<annotations>";
		/* Draw the background arcs */
	  $strXML .="<annotationGroup xPos='205' yPos='207.5'>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='2.5' radius='150' startAngle='0' endAngle='180' fillPattern='linear' fillAsGradient='1' fillColor='dddddd,666666' fillAlpha='100,100'  fillRatio='50,50' fillDegree='0' showBorder='1' borderColor='444444' borderThickness='2'/>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='145' startAngle='0' endAngle='180' fillPattern='linear' fillAsGradient='1' fillColor='666666,ffffff' fillAlpha='100,100'  fillRatio='50,50' fillDegree='0' />";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</Chart>";
	  
      $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular8()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 270; 
	  $data['width'] = 270; 
	  $strXML  = "";
	  $strXML .="<Chart upperLimit='360' lowerLimit='0' upperLimitDisplay=' ' lowerLimitDisplay='Start'  bgColor='FFFFFF' bgAlpha='0' showBorder='0' majorTMNumber='12' majorTMHeight='9' minorTMNumber='5' minorTMColor='000000' minorTMHeight='3' majorTMThickness='2' gaugeInnerRadius='0' gaugeScaleAngle='360' displayValueDistance='15' chartTopMargin='30' chartLeftMargin='30' chartRightMargin='30' chartBottomMargin='30' baseFontColor='333333'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='120' code='00B900' alpha='60' borderColor='00B900'/>";
	  $strXML .="<color minValue='120' maxValue='240' code='FDC12E' alpha='60' borderColor='FDC12E'/>"; 
	  $strXML .="<color minValue='240' maxValue='360' code='E95D0F' alpha='60' borderColor='E95D0F'/>"; 
	  $strXML .="</colorRange>"; 
	  $strXML .="<dials> ";	
	  $strXML .="<dial value='160' radius='85'/>";
	  $strXML .="</dials>";
	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup>";	
	  $strXML .="<annotation type='rectangle' xPos='1' yPos='1' radius='15' toXPos='269' toYPos='269' showBorder='1' fillColor='333333' borderColor='333333' borderThickness='2'/>";
	  $strXML .="<annotation type='rectangle' xPos='8' yPos='8' radius='15' toXPos='262' toYPos='262' showBorder='1' fillColor='FFFFFF,009999,FFFFFF' fillAngle='45' fillAlpha='60' borderColor='333333'/>";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</Chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	   
	}
	function Angular9()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 330; 
	  $data['width'] = 300; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='000000' bgAlpha='100' gaugestartAngle='235' gaugeendAngle='-55' lowerLimit='0' upperLimit='10' majorTMNumber='11' majorTMThickness='5' majorTMColor='F48900' majorTMHeight='15' minorTMNumber='4' minorTMThickness='2' minorTMColor='FFFFFF' minorTMHeight='13' placeValuesInside='1' gaugeOuterRadius='140' gaugeInnerRadius='85%25' baseFontColor='F48900' baseFont='Impact' baseFontSize='30' showShadow='0' pivotRadius='20' pivotFillColor='000000,383836'   pivotFillType='linear' pivotFillRatio='50,50' pivotFillAngle='240' annRenderDelay='0'>";
	  $strXML .="<dials>";
	  $strXML .="<dial value='5' color='E70E00' borderColor='E70E00' baseWidth='25' topWidth='1' radius='85' />";
	  $strXML .="</dials>";
	  $strXML .="<trendpoints>";
      $strXML .="<point startValue='8' endValue='10'  radius='140' innerRadius='0' color='F48900' alpha='35' showBorder='0'/>";
	  $strXML .="</trendpoints>";
	  $strXML .="<annotations autoScale='0'>";
	  $strXML .="<annotationGroup id='Grp1' showBelow='0' xScale='200' yScale='120' x='164' y='157'>";
	  $strXML .="<annotation type='circle' x='0' y='0' color='FFFFFF' alpha='15' radius='7' />";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
	  $strXML .="<styles>";
	  $strXML .="<definition>";
	  $strXML .="<style name='pivotGlow' type='glow' color='F48900' blurX='15' blurY='15' alpha='60'/>";
	  $strXML .="<style name='circleBlur' type='blur'/>";
	  $strXML .="<style name='TTipFont' type='font' color='F48900' bgColor='000000' borderColor='F48900' font='Verdana' size='10' />";
	  $strXML .="</definition>";

	  $strXML .="<application>";
	  $strXML .="<apply toObject='PIVOT' styles='pivotGlow' />";
	  $strXML .="<apply toObject='Grp1' styles='circleBlur' />";
	  $strXML .="<apply toObject='TOOLTIP' styles='TTipFont' />";
	  $strXML .="</application>";
	  $strXML .="</styles>";
      $strXML .="</chart>";

	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	  
	}
	function Angular10()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 300; 
	  $data['width'] = 300; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='FFFFFF' gaugeStartAngle='225' gaugeEndAngle='-45' bgAlpha='100' lowerLimit='0' upperLimit='180' majorTMNumber='8' majorTMThickness='3' majorTMColor='FFFFFF' majorTMHeight='7' minorTMNumber='0' placeValuesInside='1' sgaugeOriginY='160' gaugeOuterRadius='110' gaugeInnerRadius='100' showShadow='0' pivotRadius='20' pivotFillColor='000000,383836'   pivotFillType='linear' pivotFillRatio='50,50' pivotFillAngle='240' annRenderDelay='0' gaugeFillMix='' showPivotBorder='1' pivotBorderColor='999999' pivotBorderThickness='2'>";
	  $strXML .="<dials>";
	  $strXML .="<dial value='50' color='FFFFFF,999999' alpha='100' showBorder='0' baseWidth='3' topWidth='3' radius='100' />";
	  $strXML .="</dials>";
	  $strXML .="<annotations autoScale='0'>";
	  $strXML .="<annotationGroup id='Grp1' showBelow='1'>";
	  $strXML .="<annotation type='circle' x='150' y='150' color='1C1C1C,AAAAAA,1C1C1C' radius='127' fillPattern='linear' />";
	  $strXML .="<annotation type='circle' x='150' y='150' color='9E9E9E,ECECEC' radius='117' fillPattern='linear' fillAngle='270'/>";
	  $strXML .="<annotation type='circle' x='150' y='150' color='000000,6C6C6C' radius='115' fillPattern='linear' fillAngle='270'/>";
	  $strXML .="</annotationGroup>";

	  $strXML .="</annotations>";
	  $strXML .="<styles>";
	  $strXML .="<definition>";
	  $strXML .="<style name='TTipFont' type='font' color='FFFFFF' bgColor='333333' borderColor='333333' font='Verdana' size='10' />";
	  $strXML .="<style name='ValueFont' type='font' size='12' color='FFFFFF' bold='1' />";
	  $strXML .="<style name='LimitFont' type='font' size='12' color='70E300' bold='1' />";
	  $strXML .="</definition>";

	  $strXML .="<application>";
	  $strXML .="<apply toObject='TOOLTIP' styles='TTipFont' />";
	  $strXML .="<apply toObject='TICKVALUES' styles='ValueFont' />";
	  $strXML .="<apply toObject='LIMITVALUES' styles='LimitFont' />";
	  $strXML .="</application>";
	  $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular12()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 330; 
	  $data['width'] = 170; 
	  $strXML  = "";
	  
	  $strXML .="<chart animation='1' bgColor='000000' bgAlpha='100' lowerLimit='0' upperLimit='20' gaugeStartAngle='180' gaugeEndAngle='0' gaugeOuterRadius='100' gaugeInnerRadius='90%25' gaugeOriginY='130' showTickValues='0' majorTMNumber='2' minorTMNumber='19' majorTMColor='FFFFFF' minorTMColor='EE0000' majorTMHeight='15' majorTMThickness='2' minorTMHeight='15' minorTMThickness='2' baseFontColor='FFFFFF' placeValuesInside='1' pivotFillMix='414340, 272727' pivotFillRatio='50,50' pivotBorderThickness='40' pivotBorderColor='CCCCCC' pivotRadius='20' showShadow='0' toolTipBgColor='000000'>";
	  $strXML .="<dials>";
	  $strXML .="<dial radius='120' baseWidth='12' topWidth='1' color='FF8F02,FFFFFF' fillRatio='90, 10' borderColor='FFFFFF'  value='7'/>";
	  $strXML .="</dials>";

	  $strXML .="<trendpoints>";
	  $strXML .="<point startValue='1.6' color='000000' alpha='0' radius='90' innerRadius='88' displayValue='E'/>";
	  $strXML .="<point startValue='18.4' color='000000' alpha='0' radius='90' innerRadius='88' displayValue='F'/>";
	  $strXML .="</trendpoints>";

	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup id='Grp1' showBelow='1'>";
	  $strXML .="<annotation type='circle' x='165' y='130' radius='106' startAngle='0' endAngle='180' fillAngle='90' fillRatio='50,50' color='606417, 000000' fillPattern='linear' borderColor='FFFFFF' borderThickness='2'/>";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";

	  $strXML .="<styles>";
	  $strXML .="<definition>";
	  $strXML .="<style name='LimitFont' type='font' face='Verdana' size='20' color='FFFFFF' bold='1'/>";
	  $strXML .="<style name='pivotGlow' type='glow' color='FFFFFF' />";
	  $strXML .="</definition>";
	  $strXML .="<application>";
	  $strXML .="<apply toObject='TRENDVALUES' styles='LimitFont' />";
	  $strXML .="<apply toObject='PIVOT' styles='pivotGlow' />";
	  $strXML .="</application>";
	  $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular13()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 200; 
	  $data['width'] = 190; 
	  $strXML  = "";
	   
	  $strXML .="<Chart bgColor='FFFFFF' lowerLimit='0' upperLimit='55' majorTMNumber='7' showTickValues='0' majorTMHeight='8' minorTMNumber='0' showToolTip='0' majorTMThickness='3' gaugeOuterRadius='130' gaugeOriginX='100' gaugeOriginY='160' gaugeStartAngle='125' gaugeScaleAngle='70' placeValuesInside='1' gaugeInnerRadius='115' annRenderDelay='0' pivotFillMix='{000000},{FFFFFF}' pivotFillRatio='50,50' showPivotBorder='1' pivotBorderColor='444444' pivotBorderThickness='2' showShadow='0' pivotRadius='18' pivotFillType='linear'>";
	  $strXML .="<dials>";
	  $strXML .="<dial value='10' borderAlpha='0' bgColor='FF0000' baseWidth='6' topWidth='6' radius='120'/>";
	  $strXML .="</dials>";
	   /* To display E and F which can't be shown as upper and lower limit text because the tick values have been hidden */
	  $strXML .="<trendpoints>";
	  $strXML .="<point value='0' displayValue='E' alpha='0'/>";
	  $strXML .="<point value='55' displayValue='F' alpha='0'/>";
	  $strXML .="</trendpoints>";
	  $strXML .="<annotations>";
	  /* Draw the background arc */
	  $strXML .="<annotationGroup xPos='100' yPos='160'>";
	  $strXML .="<annotation type='arc' xPos='0' yPos='0' radius='145' innerRadius='132' startAngle='53' endAngle='127' showBorder='1' borderColor='444444' borderThickness='2' />";
	  $strXML .="<annotation type='arc' xPos='0' yPos='0' radius='145' innerRadius='132' startAngle='53' endAngle='107' showBorder='1' color='ffffff' borderColor='444444' borderThickness='2' />";
	  $strXML .="</annotationGroup>";
	  $strXML .="<annotationGroup xPos='90' yPos='60' showBelow='1'>";
	  $strXML .="<annotation type='image' xPos='0' yPos='0' url='Resources/Fuel.swf' xScale='50' yScale='50'/>";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
	  $strXML .="<styles>";
	  $strXML .="<definition>";
	  $strXML .="<style name='trendValueFont' type='font' bold='1' size='12'/>";
	  $strXML .="</definition>";
	  $strXML .="<application>";
	  $strXML .="<apply toObject='TRENDVALUES' styles='trendValueFont' />";
	  $strXML .="</application>";
	  $strXML .="</styles>";
      $strXML .="</Chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular14()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 425; 
	  $data['width'] = 425; 
	  $strXML  = "";
	  
	  $strXML .="<Chart bgColor='FFFFFF' upperLimit='5000' lowerLimit='0' numberSuffix='/s' baseFontColor='646F8F'  majorTMNumber='11' majorTMColor='646F8F'  majorTMHeight='9' minorTMNumber='5' minorTMColor='646F8F' minorTMHeight='3' showGaugeBorder='0' gaugeOuterRadius='150' gaugeInnerRadius='135' gaugeOriginX='210' gaugeOriginY='210' gaugeScaleAngle='280' gaugeAlpha='50' placeValuesInside='1' displayValueDistance='30' toolTipBgColor='F2F2FF' toolTipBorderColor='6A6FA6' gaugeFillMix='' showShadow='0' annRenderDelay='0' pivotRadius='14' pivotFillMix='{A1A0FF},{6A6FA6}' pivotBorderColor='bebcb0' pivotFillRatio='70,30'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='5000' code='A1A0FF' />"; 
	  $strXML .="</colorRange>"; 
	  $strXML .="<dials>"; 	
	  $strXML .="<dial value='2265' bgColor='6A6FA6,A1A0FF' borderAlpha='0' baseWidth='5' topWidth='4' />";
	  $strXML .="</dials>";
	   /* To draw the pre built custom objects */
	  $strXML .="<annotations>";
	   /* To draw it below the chart */
	  $strXML .="<annotationGroup xPos='210' yPos='210' showBelow='1'>";	
	   /* To draw the outer blue dial with gradient effect */
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='200' fillColor='000000,2C6BB2, 135FAB'  fillRatio='80,15, 5' borderColor='2C6BB2' />";
	   /* To fill the dial with gradient effect */
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='180' fillColor='FFFFFF, D4D4D4' fillRatio='20,80' borderColor='2C6BB2' />";
	   /* To draw the green arc circling the outer dial */
	  $strXML .="<annotation type='arc' xPos='0' yPos='0' radius='180' innerRadius='170' startAngle='-60' endAngle='240' fillColor='51884F' fillAlpha='50' borderColor='51884F' />";		
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</Chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular15()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 300; 
	  $data['width'] = 300; 
	  $strXML  = "";
	  
	  $strXML .="<Chart bgColor='FFFFFF' upperLimit='100' lowerLimit='0' baseFontColor='FFFFFF' majorTMNumber='11' majorTMColor='FFFFFF'  majorTMHeight='8' minorTMNumber='5' minorTMColor='FFFFFF' minorTMHeight='3' toolTipBorderColor='FFFFFF' toolTipBgColor='333333' gaugeOuterRadius='100' gaugeOriginX='150' gaugeOriginY='150' gaugeScaleAngle='270' placeValuesInside='1' gaugeInnerRadius='80%25' annRenderDelay='0' gaugeFillMix='' pivotRadius='10' showPivotBorder='0' pivotFillMix='{CCCCCC},{333333}' pivotFillRatio='50,50' showShadow='0'>";
	  $strXML .="<colorRange>";	
	  $strXML .="<color minValue='0' maxValue='50' code='C1E1C1' alpha='40'/>"; 	
	  $strXML .="<color minValue='50' maxValue='85' code='F6F164' alpha='40'/>";
	  $strXML .="<color minValue='85' maxValue='120' code='F70118' alpha='40'/>";
	  $strXML .="</colorRange> ";
	  $strXML .="<dials>";	
	  $strXML .="<dial value='65' borderColor='FFFFFF' bgColor='000000,CCCCCC,000000' borderAlpha='0' baseWidth='10'/>";
	  $strXML .="</dials>";	
	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup xPos='150' yPos='150' showBelow='1'>";		
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='145' startAngle='0' endAngle='360' fillColor='CCCCCC,111111'  fillPattern='linear' fillAlpha='100,100'  fillRatio='50,50' fillAngle='-45'/>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='120' startAngle='0' endAngle='360' fillColor='111111,cccccc'  fillPattern='linear' fillAlpha='100,100'  fillRatio='50,50' fillAngle='-45'/>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='110' startAngle='0' endAngle='360' color='666666'/>";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</Chart>";

	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	  
	}
	function Angular16()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 340; 
	  $data['width'] = 340; 
	  $strXML  = "";
	  
	  $strXML .="<Chart bgColor='FFFFFF' upperLimit='100' lowerLimit='0' showLimits='1' baseFontColor='666666'  majorTMNumber='11' majorTMColor='666666'  majorTMHeight='8' minorTMNumber='5' minorTMColor='666666' minorTMHeight='3' pivotRadius='20' showGaugeBorder='0' gaugeOuterRadius='100' gaugeInnerRadius='90' gaugeOriginX='170' gaugeOriginY='170' gaugeScaleAngle='320' displayValueDistance='10' placeValuesInside='1' gaugeFillMix='' pivotFillMix='{F0EFEA}, {BEBCB0}' pivotBorderColor='BEBCB0' pivotfillRatio='80,20' showShadow='0'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='80' code='00FF00' alpha='0'/>";
	  $strXML .="<color minValue='80' maxValue='100' name='Danger' code='FF0000' alpha='50'/>";
      $strXML .="</colorRange>";
	  $strXML .="<dials>";
	  $strXML .="<dial value='65' bordercolor='FFFFFF' bgColor='bebcb0, f0efea, bebcb0' borderAlpha='0' baseWidth='10' topWidth='3'/>";
	  $strXML .="</dials>";	
	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup xPos='170' yPos='170' fillRatio='10,125,254' fillPattern='radial' >";
	   /* Draw the upper White Rounded Border */
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='150' borderColor= 'bebcb0' fillAsGradient='1' fillColor='f0efea, bebcb0'  fillRatio='85,15'/>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='120' fillColor='bebcb0, f0efea' fillRatio='85,15' />";
	  $strXML .="<annotation type='circle' xPos='0' color='FFFFFF' yPos='0' radius='100' borderColor= 'f0efea' />";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</Chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Angular17()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "AngularGauge.swf";
	  $data['height'] = 280; 
	  $data['width'] = 280; 
	  $strXML  = "";
	  
	  $strXML .="<Chart bgColor='FFFFFF' upperLimit='180' lowerLimit='0' majorTMNumber='7' majorTMColor='AF9A03'  majorTMHeight='8' minorTMNumber='0' majorTMThickness='8' showGaugeBorder='0' gaugeOuterRadius='100' gaugeOriginX='140' gaugeOriginY='140' gaugeScaleAngle='280' placeValuesInside='1' gaugeInnerRadius='90' displayValueDistance='17' pivotRadius='12' pivotFillMix='{AF9A03},{ffffff}' pivotBorderColor='AF9A03' pivotBorderThickness='2' pivotFillRatio='50,50' pivotFillType='linear' showPivotBorder='1' showShadow='0'>";
	  $strXML .="<dials>";
	  $strXML .="<dial value='25' borderAlpha='0'  bgColor='6A6FA6,AF9A03' baseWidth='4' topWidth='4' radius='93'/>";
	  $strXML .="</dials>";
	  $strXML .="<annotations>";
	   /* Draw the background 3D look gauge steel effect */
	  $strXML .="<annotationGroup xPos='140' yPos='140'>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='110' fillPattern='linear' fillColor='eeeeee,ebce05,eeeeee' fillRatio='0,100,0' fillAngle='270' showBorder='1' borderColor='444444' borderThickness='1'/>";
	  $strXML .="<annotation type='circle' xPos='0' yPos='0' radius='100' fillPattern='linear' fillColor='ffffff,ebce05,eeeeee' fillAlpha='100,10,100'  fillRatio='5,83,12' fillAngle='270'/>";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</Chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function bulb1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Bulb.swf";
	  $data['height'] = 130; 
	  $data['width'] = 130; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='C4D283, FFFFFF' decimalPrecision='0' numberSuffix='%25'  lowerLimit='0' upperLimit='100'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='50' name='Normal' code='8BBA00' />";
	  $strXML .="<color minValue='50' maxValue='75' name='Warning' code='F6BD0F' />";
	  $strXML .="<color minValue='75' maxValue='100' name='Danger' code='FF654F' />";
	  $strXML .="</colorRange>";
	  $strXML .="<value>52</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function bulb2()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Bulb.swf";
	  $data['height'] = 110; 
	  $data['width'] = 120; 
	  $strXML  = "";
	  
	  $strXML .="<chart decimalPrecision='0' numberSuffix='%25' placeValuesInside='1' is3D='0' borderColor='638400' bgColor='FFFFFF' useColorNameAsValue='1'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='50' name='Normal' code='99CC00' />";
	  $strXML .="<color minValue='50' maxValue='75' name='Warning' code='FFFF00' />";
	  $strXML .="<color minValue='75' maxValue='100' name='Danger' code='FF0000' />";
	  $strXML .="</colorRange>";
	  $strXML .="<value>32</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Cylinder1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Cylinder.swf";
	  $data['height'] = 150; 
	  $data['width'] = 200; 
	  $strXML  = "";
	  
	  $strXML .="<chart upperLimit='100' lowerLimit='0' tickMarkGap='5' numberSuffix='%'>";
	  $strXML .="<value>32</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Cylinder2()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Cylinder.swf";
	  $data['height'] = 300; 
	  $data['width'] = 170; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='F1F1FD' lowerLimit='0' upperLimit='5000' showTickMarks='0' numberSuffix=' Ltrs' displayValueDistance='20' decimalPrecision='0' tickMarkDecimalPrecision='0' cylFillColor='996633' cylRadius='45' showValue='0'>";
	  $strXML .="<value>3000</value>";
	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup>";
	  $strXML .="<annotation type='rectangle' xPos='120' yPos='60' toXPos='280' toYPos='120' radius='0' fillcolor='333333' fillAlpha='5'/>";
	  $strXML .="<annotation type='line' xPos='120' yPos='60' toYPos='120' color='333333' thickness='2'/>";
	  $strXML .="<annotation type='line' xPos='280' yPos='60' toYPos='120' color='333333'  thickness='2'/>";
	  $strXML .="<annotation type='line' xPos='120' yPos='60' toXPos='125' color='333333'  thickness='2'/>";
	  $strXML .="<annotation type='line' xPos='120' yPos='120' toXPos='125' color='333333'  thickness='2'/>";
	  $strXML .="<annotation type='line' xPos='275' yPos='60' toXPos='280' color='333333'  thickness='2'/>";
	  $strXML .="<annotation type='line' xPos='275' yPos='120' toXPos='280' color='333333'  thickness='2'/>";
	  $strXML .="<annotation type='text' label='Fuel left in tanker' font='Verdana' xPos='145' yPos='65' align='left' vAlign='left' fontcolor='333333' fontSize='10' isBold='1'/>";		
	  $strXML .="<annotation type='text' label='(expressed in ltrs)' font='Verdana' xPos='144' yPos='80' align='left' vAlign='left' fontcolor='333333' fontSize='10'/>";		
	  $strXML .="<annotation type='text' label='3650' font='Verdana' xPos='145' yPos='95' align='left' vAlign='left' fontcolor='333333' fontSize='10' isbold='1'/>";		
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Cylinder3()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Cylinder.swf";
	  $data['height'] = 140; 
	  $data['width'] = 180; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='FFFFFF' bgAlpha='0' showBorder='0' lowerLimit='0' upperLimit='100' showTickMarks='0' showTickValues='0' showLimits='0' numberSuffix='%25' decimalPrecision='0' cylFillColor='CC0000' baseFontColor='CC0000' chartLeftMargin='15' chartRightMargin='15' chartTopMargin='15'>";
	  $strXML .="<value>44</value>";
	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup showBelowChart='1'>";
	  $strXML .="<annotation type='rectangle' xPos='1' yPos='1' toXPos='139' toYPos='179' color='FFFFFF' alpha='100' showBorder='1' borderColor='CC0000' borderThickness='2' radius='10'/>";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function DrawingPad()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "DrawingPad.swf";
	  $data['height'] = 550; 
	  $data['width'] = 300; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='E1F5FF'>";
      $strXML .="<annotations>";
      $strXML .="<annotationGroup id='Grp1' >";
      $strXML .="<annotation type='rectangle' x='30' y='100' toXPos='110' toYPos='220' radius='5' color='453269' />";
      $strXML .="<annotation type='rectangle' x='235' y='100' toXPos='315' toYPos='220' radius='5' color='453269' />";
      $strXML .="<annotation type='rectangle' x='440' y='100' toXPos='520' toYPos='220' radius='5' color='453269' />";
      $strXML .="</annotationGroup>";
      $strXML .="<annotationGroup id='Grp2' >";
      $strXML .="<annotation type='text' x='70' y='155' fontSize='12' isBold='1' label='Chart' color='FFFFFF'/>";
      $strXML .="<annotation type='text' x='275' y='140' fontSize='12' isBold='1' label='Scripts' color='FFFFFF'/>";
      $strXML .="<annotation type='text' x='275' y='170' label='ASP/PHP/.NET/.. pages' color='EFEBF5' wrap='1' wrapWidth='60'/>";
      $strXML .="<annotation type='text' x='480' y='155' fontSize='12' isBold='1' label='Database' color='FFFFFF'/>";
      $strXML .="</annotationGroup>";
      $strXML .="<annotationGroup id='Grp3' >";
      $strXML .="<annotation type='text' x='70' y='65' label='1. HTML provides the URL of XML data document to chart' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="<annotation type='text' x='170' y='130' label='2. Chart sends a request to the specified URL for XML data' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="<annotation type='text' x='380' y='130' label='3. These pages now interact with the database' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="<annotation type='text' x='380' y='200' label='4. Data returned back to the scipts in native objects' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="<annotation type='text' x='275' y='255' label='5. Scripts convert it into XML and finally output it' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="<annotation type='text' x='170' y='200' label='6. XML data is returned to the chart' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="<annotation type='text' x='70' y='250' label='7. Chart is finally rendered' wrap='1' wrapWidth='100' color='453269'/>";
      $strXML .="</annotationGroup>";
      $strXML .="<annotationGroup id='Grp4'>";
       /* arrow for process 2 */
      $strXML .="<annotation type='line' x='120' y='160' toX='220' color='453269' />";
      $strXML .="<annotation type='line' x='215' y='155' toX='220' toY='160' color='453269' />";
      $strXML .="<annotation type='line' x='215' y='165' toX='220' toY='160' color='453269' />";

      /* arrow for process 6 */
      $strXML .="<annotation type='line' x='120' y='175' toX='220' color='453269' />";
      $strXML .="<annotation type='line' x='125' y='170' toX='120' toY='175' color='453269' />";
      $strXML .="<annotation type='line' x='125' y='180' toX='120' toY='175' color='453269' />";

      /* arrow for process 3 */
      $strXML .="<annotation type='line' x='325' y='155' toX='435' color='453269' />";
      $strXML .="<annotation type='line' x='430' y='150' toX='435' toY='155' color='453269' />";
      $strXML .="<annotation type='line' x='430' y='160' toX='435' toY='155' color='453269' />";

      /* arrow for process 4 */
      $strXML .="<annotation type='line' x='325' y='170' toX='435' color='453269' />";
      $strXML .="<annotation type='line' x='330' y='165' toX='325' toY='170' color='453269' />";
      $strXML .="<annotation type='line' x='330' y='175' toX='325' toY='170' color='453269' />";

      $strXML .="</annotationGroup>";
      $strXML .="<annotationGroup id='Grp5'>";
      $strXML .="<annotation type='text' label='FusionCharts dataURL method' fontSize='16' fontColor='666666' isBold='1' x='270' y='20'/>";
      $strXML .="</annotationGroup>";
      $strXML .="</annotations>";
      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style name='Shadow1' type='shadow' distance='7'/>";
      $strXML .="<style name='Shadow2' type='shadow' strength='3'/>";
      $strXML .="<style name='Shadow3' type='shadow' alpha='0'/>";
      $strXML .="<style name='Anim1' type='animation' param='_x' start='-50' wait='0' duration='1' easing='Bounce'/>";
      $strXML .="<style name='Anim2' type='animation' param='_y' start='-30' wait='1' duration='1' easing='Bounce'/>";
      $strXML .="<style name='Anim3' type='animation' param='_xScale' start='0' end='100' wait='2' duration='0.5'/>";
      $strXML .="<style name='Anim4' type='animation' param='_alpha' start='0' wait='2' duration='1'/>";
      $strXML .="<style name='Anim5' type='animation' param='_y' start='-50' wait='2' duration='1'/>";

      $strXML .="</definition>";

      $strXML .="<application>";
      $strXML .="<apply toObject='Grp1' styles='Shadow1, Anim1'/>";
      $strXML .="<apply toObject='Grp2' styles='Shadow2, Anim2'/>";
      $strXML .="<apply toObject='Grp3' styles='Shadow3,Anim5'/>";
      $strXML .="<apply toObject='Grp4' styles='Anim3, Anim4'/>";
      $strXML .="</application>";
      $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Funnel1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Funnel.swf";
	  $data['height'] = 450; 
	  $data['width'] = 450; 
	  $strXML  = "";
	  
	  $strXML .="<chart caption='Conversion Ratio' subcaption='May 2007' showPercentValues='1' decimals='1' baseFontSize='11' isSliced='1'>";
      $strXML .="<set label='Website Visits' value='385634' />";
      $strXML .="<set label='Downloads' value='175631' />";
      $strXML .="<set label='Interested to buy' value='84564' />";
      $strXML .="<set label='Contract finalized' value='35654' />";
      $strXML .="<set label='Purchased' value='12342' />";
      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style type='font' name='captionFont' size='15' />";
      $strXML .="</definition>";
      $strXML .="<application>";
      $strXML .="<apply toObject='CAPTION' styles='captionFont' />";
      $strXML .="</application>";
      $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Funnel2()
	{ 
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Funnel.swf";
	  $data['height'] = 450; 
	  $data['width'] = 450; 
	  $strXML  = "";
	  
	  $strXML .="<chart caption='Conversion Ratio' subcaption='May 2007' decimals='1' baseFontSize='11' isSliced='0' useSameSlantAngle='1' isHollow='0' labelDistance='5'>";
      $strXML .="<set label='Website Visits' value='385634' />";
      $strXML .="<set label='Downloads' value='175631' />";
      $strXML .="<set label='Interested to buy' value='84564' />";
      $strXML .="<set label='Contract finalized' value='35654' />";
      $strXML .="<set label='Purchased' value='18342' />";
      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style type='font' name='captionFont' size='15' />";
      $strXML .="</definition>";
      $strXML .="<application>";
      $strXML .="<apply toObject='CAPTION' styles='captionFont' />";
      $strXML .="</application>";
      $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Funnel3()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Funnel.swf";
	  $data['height'] = 500; 
	  $data['width'] = 400; 
	  $strXML  = "";
	  
	  $strXML .="<chart bgColor='FFFFFF' bgAlpha='0' showBorder='0' caption='Sales distribution by Employee' subCaption='Jan 07 - Jul 07' numberPrefix='$' isSliced='1' streamlinedData='0' isHollow='0' chartRightMargin='40'>";
      $strXML .="<set label='Buchanan' value='20000' color='333333'/>";
      $strXML .="<set label='Callahan' value='49000' color='AEC0CA'/>";
      $strXML .="<set label='Davolio' value='63000' color='333333'/>";
      $strXML .="<set label='Dodsworth' value='41000' color='AEC0CA'/>";
      $strXML .="<set label='Fuller' value='74000' color='333333'/>";
      $strXML .="<set label='King' value='49000' color='AEC0CA'/>";
      $strXML .="<set label='Leverling' value='77000' color='333333'/>";
      $strXML .="<set label='Peacock' value='54000' color='AEC0CA'/>";
      $strXML .="<set label='Suyama' value='14000' color='333333'/>";
      $strXML .="<annotations>";
      $strXML .="<annotationGroup id='Grp1' showBelow='1'>";
      $strXML .="<annotation type='rectangle' x='0' y='0' toX='500' toY='400' radius='10' fillColor='AEC0CA, 333333, AEC0CA' fillAngle='90' />";
      $strXML .="<annotation type='rectangle' x='5' y='5' toX='495' toY='395' radius='10' fillColor='333333, C3D0D8, 333333' fillAngle='90' />";
      $strXML .="<annotation type='rectangle' x='10' y='10' toX='490' toY='390' radius='10' fillColor='C4D5DC, A3A5A4' fillAngle='180' />";
      $strXML .="</annotationGroup>";
      $strXML .="</annotations>";
      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style type='font' name='captionFont' size='15' color='FFFFFF'/>";
      $strXML .="<style type='font' name='subCaptionFont' color='FFFFFF'/>";
      $strXML .="</definition>";
      $strXML .="<application>";
      $strXML .="<apply toObject='CAPTION' styles='captionFont' />";
      $strXML .="<apply toObject='SUBCAPTION' styles='subCaptionFont' />";
      $strXML .="</application>";
      $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Funnel4()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "Funnel.swf";
	  $data['height'] = 500; 
	  $data['width'] = 400; 
	  $strXML  = "";
	  
	  $strXML .="<chart caption='Sales distribution by Employee' subCaption='Jan 07 - Jul 07' numberPrefix='$' is2D='1' isSliced='1' showPlotBorder='1' plotBorderThickness='1' plotBorderColor='000000' streamlinedData='0'>";
      $strXML .="<set label='Buchanan' value='50000' />";
      $strXML .="<set label='Callahan' value='49000' />";
      $strXML .="<set label='Davolio' value='63000' />";
      $strXML .="<set label='Dodsworth' value='41000' />";
      $strXML .="<set label='Fuller' value='74000' />";
      $strXML .="<set label='King' value='49000' />";
      $strXML .="<set label='Leverling' value='77000' />";
      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style type='font' name='captionFont' size='15' />";
      $strXML .="</definition>";
      $strXML .="<application>";
      $strXML .="<apply toObject='CAPTION' styles='captionFont' />";
      $strXML .="</application>";
      $strXML .="</styles>";
      $strXML .="</chart>"; 
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function HBullet1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HBullet.swf";
	  $data['height'] = 400; 
	  $data['width'] = 65; 
	  $strXML  = "";
	  
	  $strXML .="<chart palette='3' animation='1' lowerLimit='0' upperLimit='100' showShadow='1' caption='Revenue' colorRangeFillRatio='0,10,80,10' showColorRangeBorder='0' subcaption='US $ (1,000s)' roundRadius='0' numberPrefix='$' numberSuffix='K' showValue='1'>";
      $strXML .="<colorRange>";
      $strXML .="<color minValue='0' maxValue='30' />";
      $strXML .="<color minValue='30' maxValue='50' />"; 
      $strXML .="<color minValue='50' maxValue='70' />"; 
	  $strXML .="<color minValue='70' maxValue='100' />";
      $strXML .="</colorRange>"; 
      $strXML .="<value>78.9</value>";
      $strXML .="<target>80</target>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function HBullet2()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HBullet.swf";
	  $data['height'] = 400; 
	  $data['width'] = 65; 
	  $strXML  = "";
	  
	  $strXML .="<chart palette='2' animation='1' lowerLimit='0' upperLimit='100' showShadow='1' caption='Revenue' colorRangeFillRatio='0,10,80,10' showColorRangeBorder='0' subcaption='US $ (1,000s)' roundRadius='8' plotAsDot='1' numberPrefix='$' numberSuffix='K' showValue='1'>";
      $strXML .="<colorRange>";
      $strXML .="<color minValue='0' maxValue='30' />";
      $strXML .="<color minValue='30' maxValue='50' />"; 
      $strXML .="<color minValue='50' maxValue='70' />"; 
	  $strXML .="<color minValue='70' maxValue='100' />"; 
      $strXML .="</colorRange> ";
      $strXML .="<value>71.9</value>";
      $strXML .="<target>80</target>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function HBullet3()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HBullet.swf";
	  $data['height'] = 400; 
	  $data['width'] = 80; 
	  $strXML  = "";
	  
	  $strXML .="<chart palette='4' formatNumberScale='1' lowerLimit='0' upperLimit='500000' caption='Page Hits' subcaption='(July 2007)' chartTopMargin='15' chartRightMargin='20' roundRadius='5' colorRangeFillMix='{light-60},{color},{dark-20},{dark-60}' colorRangeFillRatio='20,50,20,10'>";
      $strXML .="<colorRange>";
      $strXML .="<color minValue='0' maxValue='300000' />";
      $strXML .="<color minValue='300000' maxValue='400000' />"; 
      $strXML .="<color minValue='400000' maxValue='500000' />"; 
      $strXML .="</colorRange>"; 
      $strXML .="<value>420000</value>";
      $strXML .="<target>460000</target>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function HLed1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HLED.swf";
	  $data['height'] = 340; 
	  $data['width'] = 100; 
	  $strXML  = "";
	  
	  $strXML .="<chart chartBottomMargin='5' lowerLimit='0' upperLimit='100' lowerLimitDisplay='Low' upperLimitDisplay='High' numberSuffix='%25' showTickMarks='1' tickValueDistance='0'  majorTMNumber='5' majorTMHeight='4' minorTMNumber='0' showTickValues='1' decimalPrecision='0' ledGap='1' ledSize='1' ledBoxBgColor='333333' ledBorderColor='666666' borderThickness='2' chartRightMargin='20' >";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='30' code='FF0000' />";
      $strXML .="<color minValue='30' maxValue='50' code='FFFF00' />"; 
	  $strXML .="<color minValue='50' maxValue='100' code='00FF00' />";
	  $strXML .="</colorRange>"; 
	  $strXML .="<value>70</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function HLed2()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HLED.swf";
	  $data['height'] = 380; 
	  $data['width'] = 120; 
	  $strXML  = "";
	  
	  $strXML .="<chart lowerLimit='0' upperLimit='100' showTickMarks='1' numberSuffix='%25' decimalPrecision='0' ledGap='0' ledSize='2' ledBoxBgColor='333333' ledBorderColor='666666' borderThickness='5' chartLeftMargin='25' chartRightMargin='25' baseFontColor='333333' ticksBelowGauge='0'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='30' code='00cccc' />";
	  $strXML .="<color minValue='50' maxValue='100' code='0066ff' />"; 
	  $strXML .="</colorRange>"; 
	  $strXML .="<value>70</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	
	function HLed3()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HLED.swf";
	  $data['height'] = 350; 
	  $data['width'] = 100; 
	  $strXML  = "";
	  
	  $strXML .="<chart lowerLimit='0' upperLimit='120' lowerLimitDisplay='Low' upperLimitDisplay='High' palette='4' numberSuffix='dB' chartRightMargin='20' chartLeftMargin='20' ledSize='5' ledGap='5' ticksBelowGauge='0'>";
      $strXML .="<colorRange>";
      $strXML .="<color minValue='0' maxValue='60' code='FF0000' />";
      $strXML .="<color minValue='60' maxValue='90' code='FFFF00' />";
      $strXML .="<color minValue='90' maxValue='120' code='00FF00' />";
      $strXML .="</colorRange>";
      $strXML .="<value>102</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function HLed4()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HLED.swf";
	  $data['height'] = 400; 
	  $data['width'] = 100; 
	  $strXML  = "";
	  
	  $strXML .="<chart palette='3' lowerLimit='0' upperLimit='120'  majorTMColor='333333' majorTMAlpha='100' majorTMHeight='10' majorTMThickness='2' minorTMColor='666666' minorTMAlpha='100' minorTMHeight='7' useSameFillColor='1'>";
      $strXML .="<colorRange>";
      $strXML .="<color minValue='0' maxValue='60' code='FF0000' />";
      $strXML .="<color minValue='60' maxValue='90' code='FFFF00' />";
      $strXML .="<color minValue='90' maxValue='120' code='00FF00' />";
      $strXML .=" </colorRange>";
      $strXML .="<value>52</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function VLed1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "VLED.swf";
	  $data['height'] = 240; 
	  $data['width'] = 250; 
	  $strXML  = "";
	  
	  $strXML .="<chart upperLimit='100' lowerLimit='0' numberSuffix='%25' majorTMNumber='11' majorTMColor='646F8F'  majorTMHeight='9' minorTMNumber='2' minorTMColor='646F8F' minorTMHeight='3' majorTMThickness='1' decimalPrecision='0' ledGap='2' ledSize='2' annRenderDelay='1.7'>";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='20' code='00dd00' />";
	  $strXML .="</colorRange>";
	  $strXML .="<annotations>";
	  $strXML .="<annotationGroup id='GRP1' showBelowChart='0' xPos='95' yPos='10' > ";
	  $strXML .="<annotation type='line' xPos='0' yPos='0' toYPos='208' color='000000' lineThickness='3' />";
	  $strXML .="</annotationGroup>";
	  $strXML .="</annotations>";
	  $strXML .="<value>45</value>";
	  $strXML .="<styles>";
	  $strXML .="<definition>";
	  $strXML .="<style type='animation' name='lineAnim' param='_yscale' duration='0.7' start='0' />";
	  $strXML .="</definition>";
	  $strXML .="<application>";
	  $strXML .="<apply toObject='GRP1' styles='lineAnim' />";
	  $strXML .="</application>";
	  $strXML .="</styles>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function VLed2()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "VLED.swf";
	  $data['height'] = 150; 
	  $data['width'] = 250; 
	  $strXML  = "";
	  
	  $strXML .="<chart upperLimit='100' lowerLimit='0' numberSuffix='%25' majorTMNumber='11' majorTMColor='646F8F'  majorTMHeight='9' minorTMNumber='2' minorTMColor='646F8F' minorTMHeight='3' majorTMThickness='1' decimalPrecision='0' ledGap='0' ledSize='1' ledBorderThickness='4' >";
	  $strXML .="<colorRange>";
	  $strXML .="<color minValue='0' maxValue='30' code='cf0000' />"; 
	  $strXML .="<color minValue='30' maxValue='60' code='ffcc33' />"; 
	  $strXML .="<color minValue='60' maxValue='100' code='99cc00' />"; 
	  $strXML .="</colorRange>";
	  $strXML .="<value>95</value>";
      $strXML .="</chart>";
	  
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Linear1()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HLinearGauge.swf";
	  $data['height'] = 450; 
	  $data['width'] = 80; 
	  $strXML  = "";
	  
	  $strXML .="<Chart bgColor='FFFFFF' bgAlpha='0' showBorder='0' upperLimit='100' lowerLimit='-50' gaugeRoundRadius='5' chartBottomMargin='10' ticksBelowGauge='0' showGaugeLabels='0' valueAbovePointer='0' pointerOnTop='1' pointerRadius='9'>";
      $strXML .="<colorRange>"; 
      $strXML .="<color minValue='0' maxValue='100' name='GOOD'  />";
      $strXML .="<color minValue='35' maxValue='70' name='WEAK' />";
      $strXML .="<color minValue='70' maxValue='100' name='BAD' />";
      $strXML .="</colorRange>";
      $strXML .="<value>-11</value>";

      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style name='ValueFont' type='Font' bgColor='333333' size='10' color='FFFFFF'/>";
      $strXML .="</definition>";
      $strXML .="<application>";
      $strXML .="<apply toObject='VALUE' styles='valueFont'/>";
      $strXML .="</application>";
      $strXML .="</styles>";
      $strXML .="</Chart>";

      $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Linear2()
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts');  
	  $data['chart_type']= "HLinearGauge.swf";
	  $data['height'] = 450; 
	  $data['width'] = 80; 
	  $strXML  = "";
	  
	  $strXML .="<Chart bgColor='FFFFFF' bgAlpha='0' showBorder='0' upperLimit='100' lowerLimit='0' numberSuffix='%25' gaugeRoundRadius='5' ticksBelowGauge='1' placeValuesInside='0' showGaugeLabels='0' valueAbovePointer='1' pointerOnTop='1' pointerRadius='6' chartTopMargin='15' chartBottomMargin='15' chartLeftMargin='25' chartRightMargin='30' majorTMColor='666666'>";
      $strXML .="<colorRange>"; 
      $strXML .="<color minValue='0' maxValue='100' code='F6BD0F' />";
      $strXML .="</colorRange>";

      $strXML .="<value>65</value>";

      $strXML .="<trendpoints>";
      $strXML .="<point value='75' displayValue='Target' dashed='1' dashLen='1' dashGap='3' color='FFFFFF' thickness='2'/>";
      $strXML .="</trendpoints>";

      $strXML .="<annotations>";
      $strXML .="<annotationGroup id='Grp1' showBelow='1'>";
      $strXML .="<annotation type='rectangle' x='0' y='0' toX='450' toY='120' radius='10' fillColor='AEC0CA, 333333, AEC0CA' fillAngle='90' />";
      $strXML .="<annotation type='rectangle' x='5' y='5' toX='445' toY='115' radius='10' fillColor='333333, C3D0D8, 333333' fillAngle='90' />";
      $strXML .="<annotation type='rectangle' x='10' y='10' toX='440' toY='110' radius='10' fillColor='C4D5DC, A3A5A4' fillAngle='180' />";
      $strXML .="</annotationGroup>";
      $strXML .="</annotations>";

      $strXML .="<styles>";
      $strXML .="<definition>";
      $strXML .="<style name='valueFont' type='Font' bgColor='333333' size='10' color='FFFFFF'/>";
      $strXML .="</definition>";
      $strXML .="<application>";
      $strXML .="<apply toObject='VALUE' styles='valueFont'/>";
      $strXML .="</application>";
      $strXML .="</styles>";

      $strXML .="</Chart>";
      
	  $data['xml'] = $strXML;	
	  $this->parser->parse('charts/index', $data);
	}
	function Linear3()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "HLinearGauge.swf";
	   $data['height'] = 450; 
	   $data['width'] = 120; 
	   $strXML  = "";
	   
	   $strXML .="<Chart editMode='1' bgColor='FFFFFF' bgAlpha='0' showBorder='0' upperLimit='1000' lowerLimit='0' numberPrefix='$' gaugeRoundRadius='5' chartBottomMargin='30' ticksBelowGauge='0' placeTicksInside='0' showGaugeLabels='0' pointerOnTop='1' pointerRadius='14' chartLeftMargin='25' chartRightMargin='30' majorTMColor='868F9B' majorTMHeight='10' majorTMThickness='2' pointerBgAlpha='0' pointerBorderThickness='2' majorTMNumber='0' minorTMNumber='0' showToolTip='0' decimals='0'>";
       $strXML .="<colorRange>"; 
       $strXML .="<color minValue='0' maxValue='100' code='F6BD0F' />";
       $strXML .="</colorRange>";

       $strXML .="<value>665</value>";

       $strXML .="<trendpoints>";
       $strXML .="<point value='350' fontcolor='FF4400' useMarker='0' dashed='1' dashLen='1' dashGap='3' markerRadius='5' color='FF654F' alpha='100' thickness='2'/>";
       $strXML .="<point value='800' fontcolor='FF4400' useMarker='0' dashed='1' dashLen='1' dashGap='3' markerRadius='5' color='8BBA00' alpha='100' thickness='2'/>";
       $strXML .="</trendpoints>";

       $strXML .="<annotations>";
       $strXML .="<annotationGroup id='Grp1' showBelow='1'>";
       $strXML .="<annotation type='rectangle' x='2' y='2' toX='445' toY='95' radius='10' fillColor='D6E0F6' fillAngle='90' borderColor='868F9B' borderThickness='2'/>";
       $strXML .="</annotationGroup>";
       $strXML .="</annotations>";

       $strXML .="<styles>";
       $strXML .="<definition>";
       $strXML .="<style name='ValueFont' type='Font' bgColor='333333' size='10' color='FFFFFF'/>";
       $strXML .="<style name='RectShadow' type='Shadow' strength='3'/>";
       $strXML .="</definition>";
       $strXML .="<application>";
       $strXML .="<apply toObject='VALUE' styles='valueFont'/>";
       $strXML .="<apply toObject='Grp1' styles='RectShadow' />";
       $strXML .="</application>";
       $strXML .="</styles>";
       $strXML .="</Chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Linear4()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "HLinearGauge.swf";
	   $data['height'] = 380; 
	   $data['width'] = 80; 
	   $strXML  = "";
	   
	   $strXML .="<Chart upperLimit='9' lowerLimit='0' bgColor='FFFFFF' gaugeRoundRadius='7' borderColor='DCCEA1' chartTopMargin='17' chartBottomMargin='10' ticksBelowGauge='0' valuePadding='0' majorTMColor='323433' majorTMNumber='10' minorTMNumber='4' minorTMHeight='-4' majorTMHeight='-8' placeValuesInside='1' showShadow='0' pointerRadius='5' pointerBgColor='E00000' pointerBorderColor='E00000' showGaugeBorder='0' baseFontColor='FFFFFF' gaugeFillMix=''  gaugeFillAlpha='0,0,0,0,0,0' sgaugeFillMix='{09DBFE},{32A6CF},{C1DFEA}' gaugeFillRatio='20,40,40' gaugeFillAngle='90' chartLeftMargin='30' chartRightMargin='30' animation='0'>";
	   $strXML .="<colorRange>"; 
       $strXML .="<color minValue='0' maxValue='9' alpha='0'/>";
	   $strXML .="</colorRange>";
	   $strXML .="<value>6.7</value>";
	   $strXML .="<annotations>";
	   $strXML .="<annotationGroup id='Grp1' showBelow='1' >";
	    /* The gradient rectangle which replaces the gauge */
	   $strXML .="<annotation type='rectangle' x='13' y='15' toX='367' toY='70' radius='8' color='004D69' />";
		/* Border arund the gauge */
	   $strXML .="<annotation type='rectangle' x='13' y='54' toX='367' toY='70' radius='8' color='055472,1D89AF' fillAngle='90'/>";
		/* The extended deep blue rectangle */
	   $strXML .="<annotation type='rectangle' x='13' y='13' toX='367' toY='52' radius='8' color='09DBFE,32A6CF,0177A7' fillRatio='20,40,40' fillAngle='90'/>";
		/* Gauge reflection */
	   $strXML .="<annotation type='rectangle' x='15' y='15' toX='365' toY='50' radius='8' color='09DBFE,32A6CF,C1DFEA' fillRatio='20,40,40' fillAngle='90'/>";
	   $strXML .="</annotationGroup>";
		/* The text Richter Scale */
	   $strXML .="<annotationGroup id='Grp2' showBelow='1'>";
	   $strXML .="<annotation type='text' label='Richter Scale' color='004D69' bold='1' x='190' y='43'/>";
	   $strXML .="</annotationGroup>";
	   $strXML .="</annotations>";
	   $strXML .="<styles>";
	   $strXML .="<definition>";
	   $strXML .="<style name='TTipFont' type='Font' color='FFFFFF' bgColor='004D69' borderColor='004D69'/>";
	   $strXML .="</definition>";
	   $strXML .="<application>";
	   $strXML .="<apply toObject='TOOLTIP' styles='TTipFont' />";
	   $strXML .="</application>";	
	   $strXML .="</styles>";
       $strXML .="</Chart>";

	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Linear5()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "HLinearGauge.swf";
	   $data['height'] = 420; 
	   $data['width'] = 90; 
	   $strXML  = "";
	   
	   $strXML .="<chart lowerLimit='0' upperLimit='100' numberSuffix='%25' showBorder='0' bgColor='FFFFFF' ticksBelowGauge='1' valuePadding='0' gaugeFillMix='' showGaugeBorder='0' pointerOnTop='0' pointerRadius='5' pointerBorderColor='000000' pointerBgColor='000000'  annRenderDelay='0' showShadow='0' minorTMNumber='0' baseFontColor='000000' animation='0'>";
	   $strXML .="<value>62</value>";
	   $strXML .="<colorRange>";
	   $strXML .="<color minValue='0' maxValue='100' alpha='0'/>";
	   $strXML .="</colorRange>";
	   $strXML .="<annotations>";
		/* The circle which makes for the arc shape above the gauge */
	   $strXML .="<annotationGroup id='Grp1' showBelow='0' x='210' y='-160' xScale='200'>";
	   $strXML .="<annotation type='circle' radius='200'  color='FFFFFF'/>";
	   $strXML .="</annotationGroup>";

		/* The gradient rectangle which is usd as the gauge */
	   $strXML .="<annotationGroup id='Grp2' showBelow='1' >";
	   $strXML .="<annotation type='rectangle' x='15' y='10' toX='406' toY='59' color='678000,FCEF27,E00000'/>";
	   $strXML .="</annotationGroup>";

		/* The labels Good and Bad */
	   $strXML .="<annotationGroup id='Grp3' showBelow='0'>";
	   $strXML .="<annotation type='text' x='40' y='40' size='10' color='FFFFFF' bold='1' label='Good' />";
	   $strXML .="<annotation type='text' x='385' y='40' size='10' color='FFFFFF' bold='1' label='Bad' />";
	   $strXML .="</annotationGroup>";
	   $strXML .="</annotations>";
	   $strXML .="<styles>";
	   $strXML .="<definition>";
	   $strXML .="<style name='LabelShadow' type='shadow' distance='1' strength='3' color='333333'/>";
	   $strXML .="</definition>";
	   $strXML .="<application>";
	   $strXML .="<apply toObject='Grp3' styles='LabelShadow' />";
	   $strXML .="</application>";
	   $strXML .="</styles>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Linear6()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "HLinearGauge.swf";
	   $data['height'] = 400; 
	   $data['width'] = 85; 
	   $strXML  = "";
	   
	   $strXML .="<chart bgColor='FFFFFF' borderColor='DCCEA1' chartTopMargin='0' chartBottomMargin='0' upperLimit='100' lowerLimit='0' ticksBelowGauge='1' tickMarkDistance='3' valuePadding='-2' pointerRadius='5' majorTMColor='000000' majorTMNumber='3' minorTMNumber='4' minorTMHeight='4' majorTMHeight='8' showShadow='0' pointerBgColor='FFFFFF' pointerBorderColor='000000' gaugeBorderThickness='3' baseFontColor='000000' gaugeFillMix='{color},{FFFFFF}' gaugeFillRatio='50,50'>";
	   $strXML .="<colorRange>"; 
	   $strXML .="<color minValue='0' maxValue='60' code='B40001' borderColor='B40001' label='Existing'/>";
       $strXML .="<color minValue='0' maxValue='100' code='5C8F0E'  label='Proposed' />";
	   $strXML .="</colorRange>";

	   $strXML .="<value>60</value>";
	   $strXML .="<styles>";
	   $strXML .="<definition>";
	   $strXML .="<style name='limitFont' type='Font' bold='1'/>";
	   $strXML .="<style name='labelFont' type='Font' bold='1' size='10' color='FFFFFF'/>";
	   $strXML .="</definition>";
	   $strXML .="<application>";
	   $strXML .="<apply toObject='GAUGELABELS' styles='labelFont' />";
	   $strXML .="<apply toObject='LIMITVALUES' styles='limitFont' />";
	   $strXML .="</application>";
	   $strXML .="</styles>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Pyramid1()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Pyramid.swf";
	   $data['height'] = 400; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart bgColor='CCCCCC,FFFFFF' caption='Population Distribution' baseFontColor='333333' enableSmartLabels='0' plotfillAlpha='80' decimalPrecision='0' numberSuffix='%25' pyramidYScale='40' chartRightMargin='130' chartBottomMargin='0' captionPadding='0'>";
       $strXML .="<set name=' East Asia &amp; Pacific' value='17' color='FFCC33' />";
       $strXML .="<set name=' Europe &amp; Central Asia' value='21' color='339900' />";
       $strXML .="<set name=' Latin America &amp; Carib.' value='20' color='0066CC' />";
       $strXML .="<set name=' Middle East &amp; North Africa' value='14' color='D95000' />";
       $strXML .="<set value='16' name=' South Asia' color='9B72CF' />";
       $strXML .="<set value='12' name=' Sub-Saharan Africa' color='A10303' />";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Pyramid2()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Pyramid.swf";
	   $data['height'] = 450; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart bgColor='FFFFFF' showBorder='0' decimalPrecision='2' numberPrefix='$' showPercentageValues='0' isSliced='1' chartRightMargin='100' baseFontColor='453269'>";
       $strXML .="<set value='102494' name=' Item A' />";
       $strXML .="<set value='248982' name=' Item B' />";
       $strXML .="<set value='182731' name=' Item C' />";
       $strXML .="<set value='223461' name=' Item D' />";
       $strXML .="<set value='234532' name=' Item E' />"; 
       $strXML .="<annotations>";
       $strXML .="<annotationGroup showBelowChart='1'>";
       $strXML .="<object type='rectangle' xPos='5' yPos='5' toXPos='445' toYPos='345' Color='453269, FFFFFF' fillAlpha='10' fillAngle='90' radius='15' showBorder='1' borderColor='453269' borderThickness='7'/>";
       $strXML .="</annotationGroup>";
       $strXML .="</annotations>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Pyramid3()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Pyramid.swf";
	   $data['height'] = 500; 
	   $data['width'] = 400; 
	   $strXML  = "";
	   
	   $strXML .="<chart caption='Sales distribution by Employee' subCaption='Jan 07 - Jul 07' numberPrefix='$' is2D='1' isSliced='1' showPlotBorder='1' plotBorderThickness='1' plotBorderAlpha='100' plotBorderColor='FFFFFF' enableSmartLabels='0' chartLeftMargin='0'>";
       $strXML .="<set label='Buchanan' value='50000' />";
       $strXML .="<set label='Callahan' value='49000' />";
       $strXML .="<set label='Davolio' value='63000' />";
       $strXML .="<set label='Dodsworth' value='41000' />";
       $strXML .="<set label='Fuller' value='74000' />";
       $strXML .="<set label='King' value='49000' />";
       $strXML .="<set label='Leverling' value='77000' />";
       $strXML .="<set label='Peacock' value='54000' />";
       $strXML .="<set label='Suyama' value='14000' />";
       $strXML .="<styles>";
       $strXML .="<definition>";
       $strXML .="<style type='font' name='captionFont' size='15' />";
       $strXML .="<style type='shadow' name='myShadow' />";
       $strXML .="</definition>";
       $strXML .="<application>";
       $strXML .="<apply toObject='CAPTION' styles='captionFont' />";
       $strXML .="<apply toObject='DATAPLOT' styles='myShadow' />";
       $strXML .="</application>";
       $strXML .="</styles>";
       $strXML .="</chart>"; 
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Pyramid4()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Pyramid.swf";
	   $data['height'] = 500; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart bgColor='FFFFFF' showBorder='0' showValues='0' showNames='0' decimalPrecision='1'  numberPrefix='$' animation='0' isSliced='1' chartLeftMargin='0' chartRightMargin='150' showToolTip='0'>";
       $strXML .="<set value='10' name=' Item A' color='AFD8F8' />";
       $strXML .="<set value='11' name=' Item C' color='8BBA00' />";
       $strXML .="<set value='21' name=' Item D' color='A66EDD' />";
       $strXML .="<set value='22' name=' Item E' color='F984A1' />"; 
       $strXML .="<customObjects>";
       $strXML .="<objectGroup showBelow='0'>";
	   $strXML .="<object type='rectangle' xPos='2' yPos='2' toXPos='498' toYPos='348' fillAlpha='0' radius='15' showBorder='1' borderThickness='2' color='333333' />";
	   $strXML .="<object type='circle' xPos='175' yPos='50' radius='5' borderThickness='1' color='333333'/>";

	   $strXML .="<object type='line' xPos='175' yPos='50' toXPos='230' borderThickness='1' color='333333'/>";
	   $strXML .="<object type='line' xPos='230' yPos='25' toXPos='230' toYPos='75' color='333333' borderThickness='1'/>";
	   $strXML .="<object type='circle' xPos='175' yPos='100' radius='5' color='333333' borderThickness='1'/>";


	   $strXML .="<object type='line' xPos='175' yPos='100' toXPos='260' color='333333' borderThickness='1'/>";
	   $strXML .="<object type='line' xPos='260' yPos='75' toXPos='260' toYPos='125' color='333333' borderThickness='1'/>";

	   $strXML .="<object type='circle' xPos='175' yPos='180' radius='5' color='333333' borderThickness='1'/>";

	   $strXML .="<object type='line' xPos='175' yPos='180' toXPos='280' color='333333' borderThickness='1'/>";
	   $strXML .="<object type='line' xPos='280' yPos='155' toYPos='205' color='333333' borderThickness='1'/>";

	   $strXML .="<object type='circle' xPos='175' yPos='280' radius='5' color='333333' borderThickness='1'/>";

	   $strXML .="<object type='line' xPos='175' yPos='280' toXPos='310' color='333333'  borderThickness='1'/>";
	   $strXML .="<object type='line' xPos='310' yPos='255' toXPos='310' toYPos='305' color='333333' borderThickness='1'/>";

	   $strXML .="<object label='Stocks(speculative)&lt;BR&gt;Options(uncovered)&lt;BR&gt;Margin Accounts&lt;BR&gt;Limited Partnerships' xPos='235' yPos='50' isHTML='1' isBold='1' type='text' align='left' color='333333' />";
	   $strXML .="<object label='Corporate Bond Mutual Fund&lt;BR&gt;Stock Market Funds&lt;BR&gt;Blue Cip Stocks&lt;BR&gt;Investment Grade Bonds' xPos='265' yPos='100' isBold='1' type='text' align='left' color='333333' />";
	   $strXML .="<object label='Money Market, Government and&lt;BR&gt;Municipal Bond Mutual Funds&lt;BR&gt;Government Securities&lt;BR&gt;Unit Investment Trusts' xPos='285' yPos='180' isBold='1' type='text' align='left' color='333333' />";
	   $strXML .="<object label='Certificates of deposits&lt;BR&gt;(CDs) (FDIC insured)&lt;BR&gt;Bank Money Market&lt;BR&gt;Money Market Mutual Funds' xPos='315' yPos='280' isBold='1' type='text' align='left' color='333333' />";

       $strXML .="</objectGroup>";
       $strXML .="</customObjects>";
       $strXML .="<styles>";
       $strXML .="<definition>";
       $strXML .="<style name='TTipFont' type='font' isHTML='1' />";
       $strXML .="</definition>";
       $strXML .="<application>";
       $strXML .="<apply toObject='TOOLTIP' styles='TTipFont' />";
       $strXML .="</application>";
       $strXML .="</styles>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function SparkColumn1()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "SparkColumn.swf";
	   $data['height'] = 220; 
	   $data['width'] = 40; 
	   $strXML  = "";
	   
	   $strXML .="<chart palette='2' caption='Revenue (USD)' subcaption='(12 months)' periodLength='4' highColor='99CC00' lowColor='CC0000'  numberPrefix='$'>";
	   $strXML .="<dataset>";
	   $strXML .="<set value='3400' />";
	   $strXML .="<set value='4400' />";
	   $strXML .="<set value='3400' />";
	   $strXML .="<set value='7600' />";
	   $strXML .="<set value='9400' />";
	   $strXML .="<set value='5800' />";
	   $strXML .="<set value='2300' />";
	   $strXML .="<set value='4600' />";
	   $strXML .="<set value='6500' />";
	   $strXML .="<set value='6400' />";
	   $strXML .="<set value='3400' />";
	   $strXML .="<set value='7600' />";
	   $strXML .="</dataset>";
	   $strXML .="<trendlines>";
	   $strXML .="<line startValue='7000' color='FFCC00'/>";
	   $strXML .="</trendlines>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	   
	}
	function Thm1()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Thermometer.swf";
	   $data['height'] = 100; 
	   $data['width'] = 450; 
	   $strXML  = "";
	   
	   $strXML .="<chart palette='3' bgColor='FFFFFF' bgAlpha='0' showBorder='0' lowerLimit='0' upperLimit='100' lowerLimitDisplay='Low' upperLimitDisplay='High' numberSuffix='%25' majorTMHeight='4' minorTMNumber='5' useSameFillColor='0' showTickValues='1' decimalPrecision='0' chartTopMargin='25' chartLeftMargin='20'>";
	   $strXML .="<value>78.9</value>";
	   $strXML .="<annotations>";
	   $strXML .="<annotationGroup id='Grp1' showBelow='1'>";
	   $strXML .="<annotation type='rectangle' x='0' y='0' toX='100' toY='450' radius='10' fillColor='AEC0CA, 333333, AEC0CA' fillAngle='90' />";
	   $strXML .="<annotation type='rectangle' x='5' y='5' toX='95' toY='445' radius='10' fillColor='333333, C3D0D8, 333333' fillAngle='90' />";
	   $strXML .="<annotation type='rectangle' x='10' y='10' toX='90' toY='440' radius='10' fillColor='C4D5DC, A3A5A4' fillAngle='180' />";
	   $strXML .="</annotationGroup>";
	   $strXML .="</annotations>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	   
	}
	function Thm2()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Thermometer.swf";
	   $data['height'] = 130; 
	   $data['width'] = 380; 
	   $strXML  = "";
	   
	   $strXML .="<Chart lowerLimit='-40' upperLimit='120' majorTMNumber='11' majorTMColor='A4D1FF' minorTMColor='A4D1FF' majorTMWidth='4' minorTMNumber='3' majorTMThickness='1' baseFontColor='A4D1FF' decimalPrecision='0' tickMarkDecimalPrecision='0' thmFillColor='FF5904' chartLeftMargin='40' chartTopMargin='40' chartBottomMargin='40' numberSuffix='°' borderThickness='2' thmbulbRadius='20'>";
	   $strXML .="<value>32</value>";
	   $strXML .="<annotations>";
		/* Draw the background thermometer board  */
	   $strXML .="<annotationGroup showBelowChart='1'>";
	   $strXML .="<annotation type='rectangle' xPos='0' yPos='0' toXPos='130' toYPos='380'  radius='0' showBorder='0' borderThickness='1' fillColor='666666,CCCCCC' fillAlpha='100' fillAsGradient='1' fillDegree='90' fillPattern='linear'/>";
	   $strXML .="<annotation type='rectangle' xPos='5' yPos='5' toXPos='125' toYPos='375'  radius='0' fillColor='CCCCCC,888888' fillAlpha='100,100' fillAsGradient='1' fillDegree='90' fillPattern='linear'/>";
	   $strXML .="<annotation type='rectangle' xPos='10' yPos='10' toXPos='120' toYPos='370'  radius='0' fillColor='004F9D'/>";
	   $strXML .="<annotation type='text' xPos='90' yPos='345' label= 'F' fontSize='40' fontColor='A4D1FF'/>";
	   $strXML .="</annotationGroup>";
	   $strXML .="</annotations>";
       $strXML .="</Chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	   
	}
	function Thm3()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Thermometer.swf";
	   $data['height'] = 130; 
	   $data['width'] = 480; 
	   $strXML  = "";
	   
	   $strXML .="<Chart showBorder='0' bgColor='FFFFFF' bgAlpha='0' lowerLimit='0' upperLimit='100' majorTMNumber='11' majorTMHeight='2' minorTMNumber='9' decimalPrecision='0' thmFillColor='FF5904' chartLeftMargin='33' chartRightMargin='17' chartTopMargin='40' chartBottomMargin='40' numberSuffix='°' borderThickness='2'>";
	   $strXML .="<value>32</value>";
	   $strXML .="<annotations>";
		/* Draw the background thermometer board  */
	   $strXML .="<annotationGroup showBelowChart='1'>";
	   $strXML .="<annotation type='rectangle' xPos='0' yPos='0' toXPos='130' toYPos='480'  radius='15' showBorder='0' borderThickness='2' fillColor='914800,000000' fillAlpha='100' fillAsGradient='1' fillDegree='45' fillPattern='linear'/>";
	   $strXML .="<annotation type='rectangle' xPos='10' yPos='10' toXPos='120' toYPos='470'  radius='10' showBorder='1' borderThickness='2'  fillColor='FFBC79,FFBA75' fillAlpha='50' fillDegree='45'/>";
	   $strXML .="<annotation type='text' xPos='75' yPos='435' label= 'C' fontSize='20' fontColor='000000'/>";
	   $strXML .="</annotationGroup>";
	   $strXML .="</annotations>";
       $strXML .="</Chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	   
	}
	function Gantt1()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 700; 
	   $data['width'] = 400; 
	   $strXML  = "";
	   
	   $strXML .="<chart showTaskNames='1' dateFormat='dd/mm/yyyy' hoverCapBgColor='FFFFFF' hoverCapBorderColor='333333' ganttLineColor='99CC00' ganttLineAlpha='20' baseFontColor='333333' gridBorderColor='99CC00' taskBarRoundRadius='4' showShadow='0'>";
	   $strXML .="<categories  bgColor='333333' fontColor='99cc00' isBold='1' fontSize='14' >";
	   $strXML .="<category start='1/9/2005' end='31/12/2005' name='2005' />";
	   $strXML .="<category start='1/1/2006' end='31/7/2006' name='2006' />";
	   $strXML .="</categories>";
	   $strXML .="<categories  bgColor='99cc00' bgAlpha='40' fontColor='333333' align='center' fontSize='10' isBold='1'>";
	   $strXML .="<category start='1/9/2005' end='30/9/2005' name='Sep' />";
	   $strXML .="<category start='1/10/2005' end='31/10/2005' name='Oct' />";
	   $strXML .="<category start='1/11/2005' end='30/11/2005' name='Nov' />";
	   $strXML .="<category start='1/12/2005' end='31/12/2005' name='Dec' />";
	   $strXML .="<category start='1/1/2006' end='31/1/2006' name='Jan' />";
	   $strXML .="<category start='1/2/2006' end='28/2/2006' name='Feb' />";
	   $strXML .="<category start='1/3/2006' end='31/3/2006' name='March' />";
	   $strXML .="<category start='1/4/2006' end='30/4/2006' name='Apr'  />";
	   $strXML .="<category start='1/5/2006' end='31/5/2006' name='May' />";
	   $strXML .="<category start='1/6/2006' end='30/6/2006' name='June' />";
	   $strXML .="<category start='1/7/2006' end='31/7/2006' name='July' />";
	   $strXML .="</categories>";
	   $strXML .="<processes positionInGrid='right' align='center' headerText=' Leader  ' fontColor='333333' fontSize='11' isBold='1' isAnimated='1' bgColor='99cc00' headerbgColor='333333' headerFontColor='99CC00' headerFontSize='16' bgAlpha='40'>";
	   $strXML .="<process Name='Mark' id='1' />";
	   $strXML .="<process Name='Tom' id='2' />";
	   $strXML .="<process Name='David' id='3' />";
	   $strXML .="<process Name='Alan' id='4' />";
	   $strXML .="<process Name='Adam' id='5' />";
	   $strXML .="<process Name='Peter' id='6' />";
	   $strXML .="</processes>";
	   $strXML .="<dataTable showProcessName='1' fontColor='333333' fontSize='11' isBold='1' headerFontColor='000000' headerFontSize='11' >";
	   $strXML .="<dataColumn headerbgColor='333333' width='150' headerfontSize='16' headerAlign='left' headerfontcolor='99cc00'  bgColor='99cc00' headerText=' Team' align='left' bgAlpha='65'>";
	   $strXML .="<text label=' MANAGEMENT' />"; 
	   $strXML .="<text label=' PRODUCT MANAGER' />";
	   $strXML .="<text label=' CORE DEVELOPMENT' />";
	   $strXML .="<text label=' Q &amp; A / DOC.' />";
	   $strXML .="<text label=' WEB TEAM' />";
	   $strXML .="<text label=' MANAGEMENT' />";
	   $strXML .="</dataColumn>";
	   $strXML .="</dataTable>";
	   $strXML .="<tasks  width='10' >";
	   $strXML .="<task name='Survey' hoverText='Market Survey' processId='1' start='7/9/2005' end='10/10/2005' id='Srvy' color='99cc00' alpha='60' topPadding='19' />";
 	   $strXML .="<task name='Concept' hoverText= 'Develop Concept for Product' processId='1' start='25/10/2005' end='9/11/2005' id='Cpt1' color='99cc00' alpha='60'  />";
	   $strXML .="<task name='Concept' showName='0' hoverText= 'Develop Concept for Product' processId='2' start='25/10/2005' end='9/11/2005' id='Cpt2' color='99cc00' alpha='60'  />";
	   $strXML .="<task name='Design' hoverText= 'Preliminary Design' processId='2' start='12/11/2005' end='25/11/2005' id='Desn' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Product Development' processId='2' start='6/12/2005' end='2/3/2006' id='PD1' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Product Development' processId='3' start='6/12/2005' end='2/3/2006' id='PD2' color='99cc00' alpha='60' />";
	   $strXML .="<task name='Doc Outline' hoverText='Documentation Outline' processId='2' start='6/4/2006' end='1/5/2006' id='DocOut' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Alpha' hoverText='Alpha Release' processId='4' start='15/3/2006' end='2/4/2006' id='alpha' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Beta' hoverText='Beta Release' processId='3' start='10/5/2006' end='2/6/2006' id='Beta' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Doc.' hoverText='Documentation' processId='4' start='12/5/2006' end='29/5/2006' id='Doc' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Website Design' hoverText='Website Design' processId='5' start='18/5/2006' end='22/6/2006' id='Web' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Release' hoverText='Product Release' processId='6' start='5/7/2006' end='29/7/2006' id='Rls' color='99cc00' alpha='60'/>";
	   $strXML .="<task name='Dvlp' hoverText='Development on Beta Feedback' processId='3' start='10/6/2006' end='1/7/2006' id='Dvlp' color='99cc00' alpha='60'/>";

	   $strXML .="<task name='QA' hoverText='QA Testing' processId='4' start='9/4/2006' end='22/4/2006' id='QA1' color='99cc00' alpha='60'/>";
  	   $strXML .="<task name='QA2' hoverText='QA Testing-Phase 2' processId='4' start='25/6/2006' end='5/7/2006' id='QA2' color='99cc00' alpha='60'/>";
	   $strXML .="</tasks>";
	   $strXML .="<connectors color='99cc00' thickness='2' >";
	   $strXML .="<connector fromTaskId='Cpt1' toTaskId='Cpt2' fromTaskConnectStart='1'/>";
	   $strXML .="<connector fromTaskId='PD1' toTaskId='PD2' fromTaskConnectStart='1'/>";
	   $strXML .="<connector fromTaskId='PD1' toTaskId='alpha' />";
	   $strXML .="<connector fromTaskId='PD2' toTaskId='alpha' />";
	   $strXML .="<connector fromTaskId='DocOut' toTaskId='Doc' />";
	   $strXML .="<connector fromTaskId='QA1' toTaskId='beta' />";
	   $strXML .="<connector fromTaskId='Dvlp' toTaskId='QA2' />";
	   $strXML .="<connector fromTaskId='QA2' toTaskId='Rls' />";
	   $strXML .="</connectors>";
	   $strXML .="<milestones>";
	   $strXML .="<milestone date='29/7/2006' taskId='Rls' radius='10' color='333333' shape='Star' numSides='5' borderThickness='1'/>";
	   $strXML .="<milestone date='2/3/2006' taskId='PD1' radius='10' color='333333' shape='Star' numSides='5' borderThickness='1' />";
	   $strXML .="<milestone date='2/3/2006' taskId='PD2' radius='10' color='333333' shape='Star' numSides='5' borderThickness='1'/>";
	   $strXML .="</milestones>";	
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt2()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 300; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='dd/mm/yyyy' ganttLineColor='CCCCCC' ganttLineAlpha='20' gridBorderAlpha='20' showTaskNames='1' hoverCapBgColor='F1F1F1' hoverCapBorderColor='333333' paletteThemeColor='333333'>";
       $strXML .="<categories bgColor='333333' baseFont='Arial' baseFontCOlor='FFFFFF' baseFontSize='12' >";
	   $strXML .="<category start='1/1/2005' end='31/5/2005' align='center' name='Sales Territory Assignment' fontColor='ffffff' isBold='1' fontSize='16' />";
       $strXML .="</categories>";
       $strXML .="<categories font='Arial' fontColor='ffffff' isBold='1' fontSize='12' bgColor='333333'>";
	   $strXML .="<category start='1/1/2005' end='31/1/2005' name='January'  />";
	   $strXML .="<category start='1/2/2005' end='28/2/2005' name='February'  />";
	   $strXML .="<category start='1/3/2005' end='31/3/2005' name='March' />";
	   $strXML .="<category start='1/4/2005' end='30/4/2005' name='April'/>";
	   $strXML .="<category start='1/5/2005' end='31/5/2005' name='May' />";
       $strXML .="</categories>";
       $strXML .="<processes headerbgColor='333333' fontColor='ffffff' fontSize='12' bgColor='333333' align='right' >";
	   $strXML .="<process Name='Tom' id='1'  />";
	   $strXML .="<process Name='Harry' id='2' />";
	   $strXML .="<process Name='Mary' id='4' />";
	   $strXML .="<process Name='Mike' id='3' />";
       $strXML .="</processes>";

       $strXML .="<tasks  color='' alpha='' font='' fontColor='' fontSize='' isAnimated='1'>";
	   $strXML .="<task name='North' processId='1' start='3/1/2005' end='4/2/2005' Id='1_1' color='e1f5ff' borderColor='AFD8F8'/>";
	   $strXML .="<task name='East' processId='1' start='6/2/2005' end='24/3/2005' Id='1_2' color='e1f5ff' borderColor='AFD8F8'/>";
	   $strXML .="<task name='Vacation' processId='1' start='25/3/2005' end='18/4/2005' Id='1_3' color='e1f5ff' borderColor='AFD8F8' height='2' showBorder='1'/>";
	   $strXML .="<task name='South' processId='1' start='18/4/2005' end='24/5/2005' Id='1_4' color='e1f5ff' borderColor='AFD8F8'/>";

	   $strXML .="<task name='South' processId='2' start='15/1/2005' end='5/3/2005' Id='2_1' color='F6BD0F' borderColor='F6BD0F'/>";
	   $strXML .="<task name='West' processId='2' start='21/3/2005' end='10/5/2005' Id='2_2' color='F6BD0F' borderColor='F6BD0F'/>";

	   $strXML .="<task name='Global' processId='3' start='7/1/2005' end='26/5/2005' Id='3_1' width='12' color='8BBA00' borderColor='8BBA00'/>";

  	   $strXML .="<task name='South' processId='4' start='13/2/2005' end='19/4/2005' Id='4_1' width='12' color='FF654F' borderColor='FF654F' />";

       $strXML .="</tasks>";
       $strXML .="<connectors>";
	   $strXML .="<connector fromTaskId='1_2' toTaskId='2_2' color='AFD8F8' thickness='2'/>";
	   $strXML .="<connector fromTaskId='2_1' toTaskId='4_1' color='F7CB41' thickness='2'/>";
       $strXML .="</connectors>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt3()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 300; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='dd/mm/yyyy' ganttWidthPercent='70' gridBorderAlpha='0' showTaskNames='1' paletteThemeColor='453269'>";
       $strXML .="<categories>";
	   $strXML .="<category start='1/1/2005' end='31/5/2005' name='Development Life Cycle' isBold='1' fontSize='16' />";
       $strXML .="</categories>";
       $strXML .="<categories isBold='1'>";
	   $strXML .="<category start='1/1/2005' end='31/1/2005' name='January'  />";
	   $strXML .="<category start='1/2/2005' end='28/2/2005' name='February'  />";
	   $strXML .="<category start='1/3/2005' end='31/3/2005' name='March' />";
	   $strXML .="<category start='1/4/2005' end='30/4/2005' name='April'/>";
	   $strXML .="<category start='1/5/2005' end='31/5/2005' name='May' />";
       $strXML .="</categories>";
       $strXML .="<processes headerText='Tasks' headeralign='left' bgColor='453269' headerBgColor='453269' fontColor='FFFFFF' headerFontColor='FFFFFF' isBold='1' headerFontSize='16' align='left'>";
	   $strXML .="<process Name='Get Data' id='1'  />";
	   $strXML .="<process Name='Get Approval' id='2' />";
	   $strXML .="<process Name='Identification Details' id='3' />";
	   $strXML .="<process Name='Design' id='4' />";
	   $strXML .="<process Name='Coding' id='5'  />";
	   $strXML .="<process Name='Develop Improvement' id='6' />";
	   $strXML .="<process Name='Implementation' id='7' />";
	   $strXML .="<process Name='Testing' id='8' />";

       $strXML .="</processes>";
       $strXML .="<dataTable showProcessName='1' nameAlign='left' headerFontSize='16' headerFontIsBold='1'>";
       $strXML .="</dataTable>";
	   $strXML .="<tasks >";
	   $strXML .="<task name='Dept. 1' processId='1' start='6/1/2005' end='24/1/2005' Id='1' color='453269' sborderColor='453269'/>";
	   $strXML .="<task name='Dept. 1' processId='2' start='6/2/2005' end='24/2/2005' Id='2' color='453269' sborderColor='453269'/>";
	   $strXML .="<task name='Dept. 1' processId='3' start='5/3/2005' end='18/4/2005' Id='3' color='453269' borderColor='453269' showBorder='1'/>";
	   $strXML .="<task name='Dept. 2' processId='4' start='18/2/2005' end='24/3/2005' Id='4' color='cccccc' borderColor='cccccc'/>";
	   $strXML .="<task name='Dept. 2' processId='5' start='15/1/2005' end='5/3/2005' Id='6' color='cccccc' borderColor='cccccc'/>";
	   $strXML .="<task name='Dept. 2' processId='2' start='21/3/2005' end='10/5/2005' Id='7' color='cccccc' borderColor='cccccc'/>";
	   $strXML .="<task name='Dept. 3' processId='8' start='7/4/2005' end='26/5/2005' Id='8' width='12' color='66499C' borderColor='66499C'/>";
  	   $strXML .="<task name='Dept. 3' processId='7' start='13/3/2005' end='19/4/2005' Id='9' width='12' borderColor='66499C' color='66499C'/>";
  	   $strXML .="<task name='Dept. 3' processId='6' start='13/1/2005' end='19/2/2005' Id='10' width='12' borderColor='66499C' color='66499C'/>";

       $strXML .="</tasks>";
       $strXML .="<connectors>";
	   $strXML .="<connector fromTaskId='1' toTaskId='2' thickness='2'/>";
	   $strXML .="<connector fromTaskId='6' toTaskId='9' thickness='2'/>";
	   $strXML .="<connector fromTaskId='10' toTaskId='8' thickness='2' />";	
       $strXML .="</connectors>";
       $strXML .="<milestones>";
	   $strXML .="<milestone date='6/1/2005' taskId='1' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='24/1/2005' taskId='1' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='6/2/2005' taskId='2' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='5/3/2005' taskId='3' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='18/2/2005' taskId='4' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='24/3/2005' taskId='4' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='18/4/2005' taskId='3' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='15/1/2005' taskId='6' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='5/3/2005' taskId='6' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='24/2/2005' taskId='2' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='21/3/2005' taskId='7' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='10/5/2005' taskId='7' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='7/4/2005' taskId='8' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='26/5/2005' taskId='8' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='13/3/2005' taskId='9' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='19/4/2005' taskId='9' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='13/1/2005' taskId='10' radius='5' color='333333' borderColor='FFFFFF' shape='Polygon' numSides='4' borderThickness='1'/>";
	   $strXML .="<milestone date='19/2/2005' taskId='10' radius='5' color='FFCC33' borderColor='333333' shape='Polygon' numSides='4' borderThickness='1'/>";

       $strXML .="</milestones>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt4()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 400; 
	   $strXML  = "";	   
	   $strXML .="<chart canvasBgColor='F1F1FF, FFFFFF'  canvasBgAngle='90' dateFormat='dd/mm/yyyy' ganttLineColor='0372AB' ganttLineAlpha='8' gridBorderColor='0372AB' canvasBorderColor='0372AB' showShadow='0'>";
       $strXML .="<categories bgColor='0372AB'>";
	   $strXML .="<category start='1/1/2005' end='4/2/2005' name='Machine Operation Sheet' fontColor='FFFFFF' />";
       $strXML .="</categories>";
       $strXML .="<categories bgAlpha='0'>";
	   $strXML .="<category start='1/1/2005' end='7/1/2005' name='Week1' />";
	   $strXML .="<category start='8/1/2005' end='14/1/2005' name='Week2' />";
	   $strXML .="<category start='15/1/2005' end='21/1/2005' name='Week3' />";
	   $strXML .="<category start='22/1/2005' end='28/1/2005' name='Week4'/>";
	   $strXML .="<category start='29/1/2005' end='4/2/2005' name='Week5'/>";
       $strXML .="</categories>";
       $strXML .="<processes isBold='1' headerbgColor='0372AB' fontColor='0372AB' bgColor='FFFFFF' >"; 
	   $strXML .="<process Name='Machine A' id='A'  />";
	   $strXML .="<process Name='Machine B' id='B' />";
	   $strXML .="<process Name='Machine C' id='C' />";
	   $strXML .="<process Name='Machine D' id='D' />";
	   $strXML .="<process Name='Machine E' id='E' />";
	   $strXML .="<process Name='Machine F' id='F' />";
	   $strXML .="<process Name='Machine G' id='G' />";
	   $strXML .="<process Name='Machine H' id='H' />";
       $strXML .="</processes>";
       $strXML .="<tasks >";
	   $strXML .="<task name='In Use' processId='A' start='1/1/2005' end='13/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Idle' processId='A' start='13/1/2005' end='18/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";
	   $strXML .="<task name='In Use' processId='A' start='18/1/2005' end='27/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Repair' processId='A' start='27/1/2005' end='29/1/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";
	   $strXML .="<task name='In Use' processId='A' start='29/1/2005' end='4/2/2005' taskId='B' borderColor='FF654F' color='FF654F' />";

	   $strXML .="<task name='Idle' processId='B' start='1/1/2005' end='7/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";		
	   $strXML .="<task name='In Use' processId='B' start='7/1/2005' end='18/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Repair' processId='B' start='18/1/2005' end='24/1/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";
	   $strXML .="<task name='In Use' processId='B' start='24/1/2005' end='4/2/2005' taskId='B' borderColor='FF654F' color='FF654F' />";

	   $strXML .="<task name='Idle' processId='C' start='1/1/2005' end='14/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";
	   $strXML .="<task name='In Use' processId='C' start='14/1/2005' end='3/2/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Idle' processId='C' start='3/2/2005' end='4/2/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";

	   $strXML .="<task name='Repair' processId='D' start='1/1/2005' end='7/1/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";
	   $strXML .="<task name='Idle' processId='D' start='7/1/2005' end='11/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";
	   $strXML .="<task name='In Use' processId='D' start='11/1/2005' end='27/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Repair' processId='D' start='27/1/2005' end='4/2/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";

	   $strXML .="<task name='Idle' processId='E' start='1/1/2005' end='18/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";
	   $strXML .="<task name='In Use' processId='E' start='18/1/2005' end='3/2/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Idle' processId='E' start='3/2/2005' end='4/2/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";

	   $strXML .="<task name='In Use' processId='F' start='1/1/2005' end='8/1/2005' taskId='B' borderColor='FF654F' color='FF654F'  />";
	   $strXML .="<task name='Repair' processId='F' start='8/1/2005' end='11/1/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";
	   $strXML .="<task name='In Use' processId='F' start='11/1/2005' end='18/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Repair' processId='F' start='18/1/2005' end='21/1/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";
	   $strXML .="<task name='Idle' processId='F' start='21/1/2005' end='4/2/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";

	   $strXML .="<task name='In Use' processId='G' start='1/1/2005' end='13/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Idle' processId='G' start='13/1/2005' end='20/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";
	   $strXML .="<task name='In Use' processId='G' start='20/1/2005' end='27/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Repair' processId='G' start='27/1/2005' end='4/2/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";

	   $strXML .="<task name='In Use' processId='H' start='1/1/2005' end='8/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Idle' processId='H' start='8/1/2005' end='18/1/2005' taskId='B' borderColor='8BBA00' color='8BBA00' />";
	   $strXML .="<task name='In Use' processId='H' start='18/1/2005' end='27/1/2005' taskId='B' borderColor='FF654F' color='FF654F' />";
	   $strXML .="<task name='Repair' processId='H' start='27/1/2005' end='29/1/2005' taskId='B' borderColor='F6BD0F' color='F6BD0F' />";
	   $strXML .="<task name='In Use' processId='H' start='29/1/2005' end='4/2/2005' taskId='B' borderColor='FF654F' color='FF654F' />";

       $strXML .="</tasks>";
       $strXML .="<connectors>";
	   $strXML .="<connector fromTaskId='2' toTaskId='1'  color='' alpha='' thickness='' isDotted='' />";
       $strXML .="</connectors>";

       $strXML .="<legend>";
	   $strXML .="<item label='In use' color='FF654F' />";
	   $strXML .="<item label='Repair' color='F6BD0F' />";
	   $strXML .="<item label='Idle' color='8BBA00' />";
       $strXML .="</legend>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt5()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 700; 
	   $data['width'] = 450; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='mm/dd/yyyy' caption='Project Gantt' subCaption='From 1st Feb 2007 - 31st Aug 2007'>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='04/01/2007' label='Q1' />";
       $strXML .="<category start='04/01/2007' end='07/01/2007' label='Q2' />";
       $strXML .="<category start='07/01/2007' end='09/01/2007' label='Q3' />";
       $strXML .="</categories>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='03/01/2007' label='Feb' />";
       $strXML .="<category start='03/01/2007' end='04/01/2007' label='Mar' />";
       $strXML .="<category start='04/01/2007' end='05/01/2007' label='Apr' />";
       $strXML .="<category start='05/01/2007' end='06/01/2007' label='May' />";
       $strXML .="<category start='06/01/2007' end='07/01/2007' label='Jun' />";
       $strXML .="<category start='07/01/2007' end='08/01/2007' label='Jul' />";
       $strXML .="<category start='08/01/2007' end='09/01/2007' label='Aug' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='right'>";
       $strXML .="<process label='Identify Customers' />";
       $strXML .="<process label='Survey 50 Customers' />";
       $strXML .="<process label='Interpret Requirements' />";
       $strXML .="<process label='Study Competition' />";
       $strXML .="<process label='Documentation of features' />";
       $strXML .="<process label='Brainstorm concepts' />";
       $strXML .="<process label='Design & Code' />";
       $strXML .="<process label='Testing / QA' />";
       $strXML .="<process label='Documentation of product' />";
       $strXML .="<process label='Global Release' />";
       $strXML .="</processes>";
       $strXML .="<tasks>";
       $strXML .="<task start='02/04/2007' end='02/10/2007' />";
       $strXML .="<task start='02/08/2007' end='02/19/2007' />";
       $strXML .="<task start='02/19/2007' end='03/02/2007' />";
       $strXML .="<task start='02/24/2007' end='03/02/2007' />";
       $strXML .="<task start='03/02/2007' end='03/21/2007' />";
       $strXML .="<task start='03/21/2007' end='04/06/2007' />";
       $strXML .="<task start='04/06/2007' end='07/21/2007' />";
       $strXML .="<task start='07/21/2007' end='08/19/2007' />";
       $strXML .="<task start='07/28/2007' end='08/24/2007' />";
       $strXML .="<task start='08/24/2007' end='08/27/2007' />"; 
       $strXML .="</tasks>";
       $strXML .="<trendlines>";
       $strXML .="<line start='08/14/2007' displayValue='Today' color='333333' thickness='2' dashed='1' />";
	   $strXML .="<line start='05/3/2007' end='05/10/2007' displayValue='Vacation' isTrendZone='1' alpha='20' color='FF5904'/>";

       $strXML .="</trendlines>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt6()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 400; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='mm/dd/yyyy' caption='Project Gantt' subCaption='From 1st Feb 2007 - 31st Aug 2007' showSlackAsFill='0' showPercentLabel='1'>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='04/01/2007' label='Q1' />";
       $strXML .="<category start='04/01/2007' end='07/01/2007' label='Q2' />";
       $strXML .="<category start='07/01/2007' end='09/01/2007' label='Q3' />";
       $strXML .="</categories>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='03/01/2007' label='Feb' />";
       $strXML .="<category start='03/01/2007' end='04/01/2007' label='Mar' />";
       $strXML .="<category start='04/01/2007' end='05/01/2007' label='Apr' />";
       $strXML .="<category start='05/01/2007' end='06/01/2007' label='May' />";
       $strXML .="<category start='06/01/2007' end='07/01/2007' label='Jun' />";
       $strXML .="<category start='07/01/2007' end='08/01/2007' label='Jul' />";
       $strXML .="<category start='08/01/2007' end='09/01/2007' label='Aug' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='right' headerText='What to do?' headerFontSize='18' headerVAlign='bottom' headerAlign='right'>";
       $strXML .="<process label='Research Phase' />";
       $strXML .="<process label='Identify Customers' />";
       $strXML .="<process label='Survey 50 Customers' />";
       $strXML .="<process label='Interpret Requirements' />";
       $strXML .="<process label='Study Competition' />";
       $strXML .="<process label='Production Phase' />";
       $strXML .="<process label='Documentation of features' />";
       $strXML .="<process label='Brainstorm concepts' />";
       $strXML .="<process label='Design & Code' />";
       $strXML .="<process label='Testing / QA' />";
       $strXML .="<process label='Documentation of product' />";
       $strXML .="<process label='Global Release' />";
       $strXML .="</processes>";
       $strXML .="<tasks >";
       $strXML .="<task start='02/04/2007' end='04/06/2007' showAsGroup='1' label='Research' showLabel='1'/>";
       $strXML .="<task start='02/04/2007' end='02/10/2007' />";
       $strXML .="<task start='02/08/2007' end='02/19/2007' />";
       $strXML .="<task start='02/19/2007' end='03/02/2007' />";
       $strXML .="<task start='02/24/2007' end='03/02/2007' />";
       $strXML .="<task start='03/02/2007' end='08/27/2007' showAsGroup='1' label='Production' showLabel='1'/>";
       $strXML .="<task start='03/02/2007' end='03/21/2007' />";
       $strXML .="<task start='03/21/2007' end='04/06/2007' />";
       $strXML .="<task start='04/06/2007' end='07/21/2007' />";
       $strXML .="<task start='07/21/2007' end='08/19/2007' />";
       $strXML .="<task start='07/28/2007' end='08/24/2007' />";
       $strXML .="<task start='08/24/2007' end='08/27/2007' />"; 
       $strXML .="</tasks>";
       $strXML .="</chart>";
	    
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt7()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 650; 
	   $data['width'] = 450; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='mm/dd/yyyy' caption='Project Gantt' subCaption='From 1st Feb 2007 - 31st Aug 2007' ganttPaneDuration='3' ganttPaneDurationUnit='m' palette='4'>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='04/01/2007' label='Q1' />";
       $strXML .="<category start='04/01/2007' end='07/01/2007' label='Q2' />";
       $strXML .="<category start='07/01/2007' end='09/01/2007' label='Q3' />";
       $strXML .="</categories>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='03/01/2007' label='Feb' />";
       $strXML .="<category start='03/01/2007' end='04/01/2007' label='Mar' />";
       $strXML .="<category start='04/01/2007' end='05/01/2007' label='Apr' />";
       $strXML .="<category start='05/01/2007' end='06/01/2007' label='May' />";
       $strXML .="<category start='06/01/2007' end='07/01/2007' label='Jun' />";
       $strXML .="<category start='07/01/2007' end='08/01/2007' label='Jul' />";
       $strXML .="<category start='08/01/2007' end='09/01/2007' label='Aug' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='left' headerText='Who?' headerFontSize='18' headerVAlign='bottom' headerAlign='left'>";
       $strXML .="<process label='Identify Customers' />";
       $strXML .="<process label='Survey 50 Customers' />";
       $strXML .="<process label='Interpret Requirements' />";
       $strXML .="<process label='Study Competition' />";
       $strXML .="<process label='Documentation of features' />";
       $strXML .="<process label='Brainstorm concepts' />";
       $strXML .="<process label='Design &amp; Code' />";
       $strXML .="<process label='Testing / QA' />";
       $strXML .="<process label='Documentation of product' />";
       $strXML .="<process label='Global Release' />";
       $strXML .="</processes>";
       $strXML .="<datatable headerVAlign='bottom'>";
       $strXML .="<datacolumn headerText='Who does?' headerFontSize='18' headerVAlign='bottom' headerAlign='right' align='left' fontSize='12' >";
       $strXML .="<text label='John' />";
       $strXML .="<text label='David' />";
       $strXML .="<text label='Mary' />";
       $strXML .="<text label='Andrew' />";
       $strXML .="<text label='Tiger' />";
       $strXML .="<text label='Sharon' />";
       $strXML .="<text label='Neil' />";
       $strXML .="<text label='Harry' />";
       $strXML .="<text label='Chris' />";
       $strXML .="<text label='Richard' />";
       $strXML .="</datacolumn>";
       $strXML .="</datatable>";
       $strXML .="<tasks>";
       $strXML .="<task start='02/04/2007' end='02/10/2007' />";
       $strXML .="<task start='02/08/2007' end='02/19/2007' />";
       $strXML .="<task start='02/19/2007' end='03/02/2007' />";
       $strXML .="<task start='02/24/2007' end='03/02/2007' />";
       $strXML .="<task start='03/02/2007' end='03/21/2007' />";
       $strXML .="<task start='03/21/2007' end='04/06/2007' />";
       $strXML .="<task start='04/06/2007' end='07/21/2007' />";
       $strXML .="<task start='07/21/2007' end='08/19/2007' />";
       $strXML .="<task start='07/28/2007' end='08/24/2007' />";
       $strXML .="<task start='08/24/2007' end='08/27/2007' />"; 
       $strXML .="</tasks>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt8()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 650; 
	   $data['width'] = 450; 
	   $strXML  = "";
	   
	   $strXML .="<chart palette='2' caption='Construction Timeline' dateFormat='dd/mm/yyyy' outputDateFormat='ddds mns' >";
       $strXML .="<categories>";
       $strXML .="<category start='1/5/2008' end='31/8/2008' label='Months' />";
       $strXML .="</categories>";
       $strXML .="<categories>";
       $strXML .="<category start='1/5/2008' end='31/5/2008' label='May' />";
       $strXML .="<category start='1/6/2008' end='30/6/2008' label='June' />";
       $strXML .="<category start='1/7/2008' end='31/7/2008' label='July' />";
       $strXML .="<category start='1/8/2008' end='31/8/2008' label='August' />";
       $strXML .="</categories>";
       $strXML .="<processes headerText='Task' headerFontSize='16' fontSize='12'>";
       $strXML .="<process label='Terrace' id='TRC' />";
       $strXML .="<process label='Inspection' id='INS' />";
       $strXML .="<process label='Wood Work' id='WDW' />";
       $strXML .="<process label='Interiors' id='INT' />";
       $strXML .="</processes>";
       $strXML .="<tasks showEndDate='1'>";
       $strXML .="<task processId='TRC' start='5/5/2008' end='2/6/2008' id='5-1' color='4567aa' height='25%' topPadding='20%' />";
       $strXML .="<task processId='TRC' start='10/5/2008' end='2/6/2008' id='5' color='EEEEEE' height='25%' topPadding='55%'/>";
       $strXML .="<task processId='INS' start='11/5/2008' end='12/6/2008' id='6-1' color='4567aa' height='25%' topPadding='20%' />";
       $strXML .="<task processId='INS' start='13/5/2008' end='19/6/2008' id='6' color='EEEEEE' height='25%' topPadding='55%'/>";
       $strXML .="<task processId='WDW' start='1/6/2008' end='12/7/2008' id='7-1' color='4567aa' height='25%' topPadding='20%' />";
       $strXML .="<task processId='WDW' start='2/6/2008' end='19/7/2008' id='7' color='EEEEEE' height='25%' topPadding='55%'/>";
       $strXML .="<task processId='INT' start='1/6/2008' end='12/8/2008' id='8-1' color='4567aa' height='25%' topPadding='20%' />";
       $strXML .="<task processId='INT' start='1/6/2008' end='19/8/2008' Id='8' color='EEEEEE' height='25%' topPadding='55%' /> ";
       $strXML .="</tasks>";
       $strXML .="<legend>";
       $strXML .="<item label='Planned' color='4567aa' />";
       $strXML .="<item label='Actual' color='999999' />";
       $strXML .="</legend>";
       $strXML .="<styles>";
       $strXML .="<definition>";
       $strXML .="<style type='font' name='legendFont' size='13' />";
       $strXML .="</definition>";
       $strXML .="<application>";
       $strXML .="<apply toObject='Legend' styles='legendFont' />";
       $strXML .="</application>";
       $strXML .="</styles>";
       $strXML .="</chart>";

	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt9()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 650; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart scrollColor='99CCCC' scrollPadding='3' scrollHeight='20' scrollBtnWidth='28' scrollBtnPadding='3' dateFormat='dd/mm/yyyy' caption='Employee Schedule' subCaption='From 15th June 2007 - 21st June 2007' ganttPaneDuration='57' ganttPaneDurationUnit='d' palette='2'>";
       $strXML .="<categories>";
       $strXML .="<category start='15/07/2007' end='22/07/2007' label='Week 3' />";
       $strXML .="</categories>";
       $strXML .="<categories>";
       $strXML .="<category start='15/07/2007' end='16/07/2007' label='Sun' />";
       $strXML .="<category start='16/07/2007' end='17/07/2007' label='Mon' />";
       $strXML .="<category start='17/07/2007' end='18/07/2007' label='Tue' />";
       $strXML .="<category start='18/07/2007' end='19/07/2007' label='Wed' />";
       $strXML .="<category start='19/07/2007' end='20/07/2007' label='Thu' />";
       $strXML .="<category start='20/07/2007' end='21/07/2007' label='Fri' />";
       $strXML .="<category start='21/07/2007' end='22/07/2007' label='Sat' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='left' headerText='Who?' headerFontSize='18' headerVAlign='bottom' headerAlign='left'>";
       $strXML .="<process label='John.S' id='EMP121'/>";
       $strXML .="<process label='David.G' id='EMP122'/>";
       $strXML .="<process label='Mary.P' id='EMP123'/>";
       $strXML .="<process label='Andrew.H' id='EMP124'/>";
       $strXML .="<process label='Neil.M' id='EMP125'/>";
       $strXML .="</processes>";
       $strXML .="<datatable headerVAlign='bottom'>";
       $strXML .="<datacolumn headerText='Team?' headerFontSize='18' headerVAlign='bottom' headerAlign='left' align='left' fontSize='12' >";
       $strXML .="<text label='Graphics' />";
       $strXML .="<text label='ASP.NET' />";
       $strXML .="<text label='PHP' />";
       $strXML .="<text label='Flash' />";
       $strXML .="<text label='Documentation' />";
       $strXML .="</datacolumn>";
       $strXML .="</datatable>";
       $strXML .="<tasks showLabels='1'>";
       $strXML .="<task processId='EMP121' id='TSK1311' start='16/07/2007' end='17/07/2007' label='Product A Logo'/>";
       $strXML .="<task processId='EMP121' id='TSK1325' start='18/07/2007' end='19/07/2007' label='Website design'/>";
       $strXML .="<task processId='EMP121' id='TSK1329' start='20/07/2007' end='21/07/2007' label='Brochure design'/>";
       $strXML .="<task processId='EMP122' id='TSK1393' start='16/07/2007' end='22/07/2007' label='C# Wrapper development'/>";
       $strXML .="<task processId='EMP123' id='TSK1398' start='18/07/2007' end='21/07/2007' label='PHP Blueprint application'/>";
       $strXML .="<task processId='EMP124' id='TSK1498' start='16/07/2007' end='17/07/2007' label='Pie Chart Bug Fix'/>";
       $strXML .="<task processId='EMP124' id='TSK1499' start='18/07/2007' end='22/07/2007' label='Flex Research'/>";
       $strXML .="<task processId='EMP125' id='TSK1512' start='16/07/2007' end='22/07/2007' label='FusionGadgets Documentation'/>";
       $strXML .="</tasks>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt10()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='dd/mm/yyyy' outputDateFormat='hh12:mn ampm' caption='Time Shifts' >";
       $strXML .="<categories>"; 
       $strXML .="<category start='00:00:00' end='23:59:59' label='Time' />";
       $strXML .="</categories>";
       $strXML .="<categories align='left'>";
       $strXML .="<category start='00:00:00' end='02:59:59' label='Midnight' />";
       $strXML .="<category start='03:00:00' end='05:59:59' label='3 am' />";
       $strXML .="<category start='06:00:00' end='08:59:59' label='6 am' />";
       $strXML .="<category start='09:00:00' end='11:59:59' label='9 am' />";
       $strXML .="<category start='12:00:00' end='14:59:59' label='12 noon' />";
       $strXML .="<category start='15:00:00' end='17:59:59' label='3 pm' />";
       $strXML .="<category start='18:00:00' end='20:59:59' label='6 pm' />";
       $strXML .="<category start='21:00:00' end='23:59:59' label='9 pm' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='left' headerText='Who?' headerFontSize='18' headerVAlign='bottom' headerAlign='left'>";
       $strXML .="<process label='John.S' id='EMP121'/>";
       $strXML .="<process label='David.G' id='EMP122'/>";
       $strXML .="<process label='Mary.P' id='EMP123'/>";
       $strXML .="<process label='Andrew.H' id='EMP124'/>";
       $strXML .="<process label='Neil.M' id='EMP125'/>";
       $strXML .="</processes>";
       $strXML .="<tasks showLabels='1'>";
       $strXML .="<task processId='EMP121' start='08:00:00' end='12:30:00' label='Morning Shift'/>";
       $strXML .="<task processId='EMP121' start='15:00:00' end='19:30:00' label='Evening Shift'/>";
       $strXML .="<task processId='EMP122' start='10:00:00' end='16:30:00' label='Half Day'/>";
       $strXML .="<task processId='EMP123' start='08:00:00' end='12:00:00' label='Morning Shift'/>";
       $strXML .="<task processId='EMP123' start='15:00:00' end='21:30:00' label='Evening Shift'/>";
       $strXML .="<task processId='EMP124' start='08:00:00' end='20:30:00' label='Full time support'/>";
       $strXML .="<task processId='EMP125' start='10:00:00' end='14:30:00' label='Half Day'/>";
       $strXML .="</tasks>";
       $strXML .="</chart>";

	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt11()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='mm/dd/yyyy' outputDateFormat='hh:mn' caption='Work Schedule' subCaption='For next 2 days'>";
       $strXML .="<categories>";
       $strXML .="<category start='7/15/2007 00:00:00' end='7/15/2007 23:59:59' label='Today' />";
       $strXML .="<category start='7/16/2007 00:00:00' end='7/16/2007 23:59:59' label='Tomorrow' />";
       $strXML .="</categories>";
       $strXML .="<categories align='right'>";
       $strXML .="<category start='7/15/2007 00:00:00' end='7/15/2007 05:59:59' label='6 am' />";
       $strXML .="<category start='7/15/2007 06:00:00' end='7/15/2007 11:59:59' label='12 pm' />";
       $strXML .="<category start='7/15/2007 12:00:00' end='7/15/2007 17:59:59' label='6 pm' />";
       $strXML .="<category start='7/15/2007 18:00:00' end='7/15/2007 23:59:59' label='Midnight' />";
       $strXML .="<category start='7/16/2007 00:00:00' end='7/16/2007 05:59:59' label='6 am' />";
       $strXML .="<category start='7/16/2007 06:00:00' end='7/16/2007 11:59:59' label='12 pm' />";
       $strXML .="<category start='7/16/2007 12:00:00' end='7/16/2007 17:59:59' label='6 pm' />";
       $strXML .="<category start='7/16/2007 18:00:00' end='7/16/2007 23:59:59' label='Midnight' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='left' headerText='Who?' headerFontSize='18' headerVAlign='bottom' headerAlign='left'>";
       $strXML .="<process label='John.S' id='EMP121'/>";
       $strXML .="<process label='David.G' id='EMP122'/>";
       $strXML .="<process label='Mary.P' id='EMP123'/>";
       $strXML .="<process label='Andrew.H' id='EMP124'/>";
       $strXML .="<process label='Neil.M' id='EMP125'/>";
       $strXML .="</processes>";
       $strXML .="<tasks showLabels='1' showStartDate='1'>";
       $strXML .="<task processId='EMP121' start='7/15/2007 08:00:00' end='7/15/2007 12:30:00' label='Logo A'/>";
       $strXML .="<task processId='EMP121' start='7/15/2007 17:00:00' end='7/15/2007 19:30:00' label='Logo B'/>";
       $strXML .="<task processId='EMP121' start='7/16/2007 09:00:00' end='7/16/2007 19:30:00' label='Website template'/>";
       $strXML .="<task processId='EMP122' start='7/15/2007 10:00:00' end='7/15/2007 20:30:00' label='PHP Blueprint'/>";
       $strXML .="<task processId='EMP122' start='7/16/2007 10:00:00' end='7/16/2007 20:30:00' label='PHP Blueprint'/>";
       $strXML .="<task processId='EMP123' start='7/15/2007 08:00:00' end='7/15/2007 12:00:00' label='Support'/>";
       $strXML .="<task processId='EMP123' start='7/16/2007 15:00:00' end='7/16/2007 21:30:00' label='Support'/>";
       $strXML .="<task processId='EMP124' start='7/15/2007 08:00:00' end='7/15/2007 20:30:00' label='Level 2 support'/>";
       $strXML .="<task processId='EMP124' start='7/16/2007 08:00:00' end='7/16/2007 20:30:00' label='Level 2 support'/>";
       $strXML .="<task processId='EMP125' start='7/15/2007 10:00:00' end='7/15/2007 14:30:00' label='Network Maintenance'/>";
       $strXML .="<task processId='EMP125' start='7/16/2007 12:00:00' end='7/16/2007 14:30:00' label='System OS Updates'/>";
       $strXML .="</tasks>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function Gantt12()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "Gantt.swf";
	   $data['height'] = 600; 
	   $data['width'] = 350; 
	   $strXML  = "";
	   
	   $strXML .="<chart dateFormat='mm/dd/yyyy' caption='Project Gantt' subCaption='From 1st Feb 2007 - 31st Aug 2007'>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='04/01/2007' label='Q1' />";
       $strXML .="<category start='04/01/2007' end='07/01/2007' label='Q2' />";
       $strXML .="<category start='07/01/2007' end='09/01/2007' label='Q3' />";
       $strXML .="</categories>";
       $strXML .="<categories>";
       $strXML .="<category start='02/01/2007' end='03/01/2007' label='Feb' />";
       $strXML .="<category start='03/01/2007' end='04/01/2007' label='Mar' />";
       $strXML .="<category start='04/01/2007' end='05/01/2007' label='Apr' />";
       $strXML .="<category start='05/01/2007' end='06/01/2007' label='May' />";
       $strXML .="<category start='06/01/2007' end='07/01/2007' label='Jun' />";
       $strXML .="<category start='07/01/2007' end='08/01/2007' label='Jul' />";
       $strXML .="<category start='08/01/2007' end='09/01/2007' label='Aug' />";
       $strXML .="</categories>";
       $strXML .="<processes fontSize='12' isBold='1' align='right'>";
       $strXML .="<process label='Identify Customers' />";
       $strXML .="<process label='Survey 50 Customers' />";
       $strXML .="<process label='Interpret Requirements' />";
       $strXML .="<process label='Study Competition' />";
       $strXML .="<process label='Documentation of features' />";
       $strXML .="<process label='Brainstorm concepts' />";
       $strXML .="<process label='Design & Code' />";
       $strXML .="<process label='Testing / QA' />";
       $strXML .="<process label='Documentation of product' />";
       $strXML .="<process label='Global Release' />";
       $strXML .="</processes>";
       $strXML .="<tasks>";
       $strXML .="<task start='02/04/2007' end='02/10/2007' />";
       $strXML .="<task start='02/08/2007' end='02/19/2007' />";
       $strXML .="<task start='02/19/2007' end='03/02/2007' />";
       $strXML .="<task start='02/24/2007' end='03/02/2007' />";
       $strXML .="<task start='03/02/2007' end='03/21/2007' />";
       $strXML .="<task start='03/21/2007' end='04/06/2007' />";
       $strXML .="<task start='04/06/2007' end='07/21/2007' />";
       $strXML .="<task start='07/21/2007' end='08/19/2007' />";
       $strXML .="<task start='07/28/2007' end='08/24/2007' />";
       $strXML .="<task start='08/24/2007' end='08/27/2007' />"; 
       $strXML .="</tasks>";
       $strXML .="<trendlines>";
       $strXML .="<line start='08/14/2007' displayValue='Today' color='333333' thickness='2' dashed='1' />";
	   $strXML .="<line start='05/3/2007' end='05/10/2007' displayValue='Vacation' isTrendZone='1' alpha='20' color='FF5904'/>";

       $strXML .="</trendlines>";
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function am_floating()
	{
	    $data = tags();
	    $data['tabs']	= tabs('charts'); 
		$server_path = tags('server_path'); 
	   	$data1 = array( 'John' , 'Joe' , 'Susan', 'Eaton' );
		$data2 = array( 11, 13, 18, 19);
		$start = array( 8, 10, 11, 15);
		// title of chart 
		$chart_title = ' Floating Chart ';
		// path to file of our chart_data.xml, 
		// that store the data of our chart
		$xml_file = $server_path['server_path']."/charts/amcolumn/floating/chart_data.xml";
		$data['chart_type']="floating";
		$data['object_type'] ="amcolumn.swf";
		$data['height'] = 520;
		$data['width'] = 400;
		// format data into xml data 
		$xml_data = '   <?xml version="1.0" encoding="UTF-8"?>'."\n";
		$xml_data.= '	<chart>'."\n";
		// generate data series
		$xml_data.= '		<series>'."\n";
				
		for($i=0; $i<=3; $i++){
			$xml_data.= '       <value xid="'.$data1[$i].'" bg_color="#000000" bg_alpha="20">'.$data1[$i].'</value>'."\n";			
		}		
		$xml_data.= '		</series>'."\n";
		// now, make the data 
		$xml_data.= '		<graphs>'."\n";		
		$xml_data.= '			<graph gid="0" title="Schedule" gradient_fill_colors="#33CCFF, #003366">'."\n"; 	
		for($i=0; $i<=3; $i++){
			$xml_data.='                    <value xid="'.$data1[$i].'" start="'.$start[$i].'" >'.$data2[$i].'</value>'."\n";
		}			
		$xml_data.= '			</graph>'."\n";
		$xml_data.= '		</graphs>'."\n";
		$xml_data.= '	</chart>'."\n";
		// save it
		file_put_contents($xml_file, $xml_data);
		
		// generate outputs
		$this->parser->parse('charts/amcharts', $data);
	}
	function am_col_and_line()
	{
	    $data = tags();
	    $data['tabs']	= tabs('charts'); 
		$server_path = tags('server_path'); 
	    $data1 = array(19.73,18.43,18.08,19.01,19.57,19.58,19.43,20.83,19.73,18.87,18.43,18.31,18.19,17.89,17.60,17.20,16.84,16.56,16.00,15.95,15.52,15.85,15.36,16.59,26.39,27.00,27.26,26.78,26.14,32.98,49.63,66.20,55.98,49.80,47.18,42.40,21.62,25.68,20.14,24.22,29.03,23.00,21.59,18.68,16.86,18.17,22.40,20.39,12.66,17.78,29.54,23.39,23.78,28.42,54.93,47.97,58.30);
		$data2 = array(2.51,2.53,2.53,2.68,2.78,2.77,2.79,3.09,3.01,2.90,2.88,2.89,2.90,2.89,2.88,2.86,2.88,2.92,2.94,3.09,3.18,3.39,3.39,3.89,6.87,7.67,8.19,8.57,9.00,12.64,21.59,31.77,28.52,26.19,25.88,24.09,12.51,15.40,12.58,15.86,20.03,16.54,15.99,14.25,13.19,14.62,18.46,17.23,10.87,15.56,26.72,21.84,22.51,27.54,38.93,46.47,58.30);
		// title of chart 
		$chart_title = 'Column and line charts';
		$data['chart_type']="col_and_line";
		$data['object_type'] ="amcolumn.swf";
		$data['height'] = 800;
		$data['width'] = 600;
		// path to file of our chart_data.xml, 
		// that store the data of our chart
		
		$xml_file =  $server_path['server_path']."/charts/amcolumn/col_and_line/chart_data.xml";
		// format data into xml data 
		$xml_data = '   <?xml version="1.0" encoding="UTF-8"?>'."\n";
		$xml_data.= '	<chart>'."\n";
		// generate data series
		$xml_data.= '		<series>'."\n";
		$j = 0;		
		for($i=1950; $i<=2006; $i++){
			$xml_data.= '		<value xid="'.$j.'">'.$i.'</value>'."\n";
			$j++;
		}		
		$xml_data.= '		</series>'."\n";
		// now, make the data 
		$xml_data.= '		<graphs>'."\n";		
		$xml_data.= '			<graph gid="0" type="line" color="#FFFFFF" width="0" title="Inflation adjusted"> '."\n"; 	 

		for($i=0; $i<=56; $i++){
			$xml_data.='                    <value xid="'.$i.'">'.$data1[$i].'</value>'."\n";
		}			
		$xml_data.= '			</graph>'."\n";
		$xml_data.= '			<graph gid="1" type="column" color="#000000" title="nominal"> '."\n"; 	
		for($i=0; $i<=56; $i++){
			$xml_data.='                    <value xid="'.$i.'">'.$data2[$i].'</value>'."\n";
		}			
		$xml_data.= '			</graph>'."\n";		
		$xml_data.= '		</graphs>'."\n";
		$xml_data.= '	</chart>'."\n";
		
		file_put_contents($xml_file, $xml_data);
		$this->parser->parse('charts/amcharts', $data);

	}
	function am_pie()
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts'); 
	   $server_path = tags('server_path');
	   // title of chart 
	   $chart_title = 'Column and line charts';
	   $data['chart_type']="pie";
       $data['height'] = 800;
	   $data['width'] = 600;
	   $data['object_type'] ="ampie.swf";
	   
	   // path to file of our chart_data.xml, 
	   // that store the data of our chart

	   $xml_file = $server_path['server_path']."/charts/amcolumn/pie/chart_data.xml";
	   $xml_data = ' <?xml version="1.0" encoding="UTF-8"?>'."\n";
	   $xml_data .= '<pie>'."\n";
	  
	   $xml_data .= '<slice title="Twice a day" pull_out="true">358</slice>'."\n";
	   $xml_data .= '<slice title="Once a day">258</slice>'."\n";
	   $xml_data .= '<slice title="Once a week">154</slice>'."\n";
	   $xml_data .= '<slice title="Never" url="http://www.interactivemaps.org" description="Click on the slice to find more information" alpha="50">114</slice>'."\n";
	   $xml_data .= '</pie>'."\n";
	   
	   //$data['xml_data'] = $xml_data;
	   file_put_contents($xml_file, $xml_data);
	   $this->parser->parse('charts/amcharts', $data); 
	}
	function Bar2D($state="")
	{
       
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "MSBar2D.swf";
	   $data['height'] = 700; 
	   $data['width'] = 575; 
	   $strXML  = "";
	   
	   $strXML .="<chart  palette='2' caption='Delay Planned Vs Actual' yaxisname='Delay (Days)' hovercapbg='FFFFFF' toolTipBorder='889E6D' divLineColor='999999' divLineAlpha='80' showShadow='0' canvasBgColor='FEFEFE' canvasBaseColor='FEFEFE' canvasBaseAlpha='50' divLineIsDashed='1' divLineDashLen='1' divLineDashGap='2' numberScaleValue='60,60,24,7' numberScaleUnit='min,hr,day,wk' formatNumber='1' formatNumberScale='1' chartRightMargin='30' useRoundEdges='1' legendBorderAlpha='0'>";
	 
	   // sites name
	   $data['stages']=$this->charts_model->get_rolledout_sites($state);

	   $length = 0;
	   $i=0;
	   foreach($data['stages'] as $row){ 
		  $start[$i] = $data['stages'][$i]['start'];
		  $end[$i] = $data['stages'][$i]['end'];
		  $planned_days[$i] = (strtotime($end[$i]) - strtotime($start[$i])) / (60 * 60 * 24);

		  $actual_start[$i] = $data['stages'][$i]['actual_start_date'];
		  $actual_end[$i] = $data['stages'][$i]['actual_end_date'];
		  $actual_days[$i] = (strtotime($actual_end[$i]) - strtotime($actual_start[$i])) / (60 * 60 * 24);
		  $name[$i] = $data['stages'][$i]['name'];
		  $length++;
		  $i++;
		} 
	   $strXML .="<categories>";
	   for($x = 0 ; $x < $length ; $x++){ 
	   $strXML .= "<category label='" . $name[$x] . "' />";
	   }
   
	   $strXML .="</categories>";
	   // planned dates
	   $strXML .="<dataset seriesname='Planned' color='8EAC41'>";
	   for($x = 0 ; $x < $length ; $x++){ 
	   
	   $strXML .= "<set value='" . $planned_days[$x] . "' />";
	   }
	   $strXML .="</dataset>";
       // actual dates
	   $strXML .="<dataset seriesname='Actual' color='607142' >";
	   for($x = 0 ; $x < $length ; $x++){ 
	   $strXML .= "<set value='" . $actual_days[$x] . "' />";
	   }
	   $strXML .="</dataset>";
	   
       $strXML .="</chart>";
	   
	   $data['xml'] = $strXML;	
	   $this->parser->parse('charts/index', $data);
	}
	function MSCol2D($project_id ="")
	{
	   $data = tags();
	   $data['tabs']	= tabs('charts');  
	   $data['chart_type']= "MSColumn2D.swf";
	   $data['height'] = 700; 
	   $data['width'] = 575; 
	   
	   $m = date('m');
	   $y = date('y');
		
	   $data['xml'] = $this->charts_model->get_mscol2D_xml($project_id, $m, $y);	
	   $this->parser->parse('charts/index', $data);
	}
	function PieChart( $values="" )
	{
	 $data = tags();
	 $data['tabs']	= tabs('charts');  
	 $data['chart_type']= "Pie3D.swf";
	 $data['height'] = 700; 
	 $data['width'] = 575; 
	 $values = array ('France'=> 17, 'India'=>12, 'Brazil'=>18, 'USA'=>8, 'Austrailia'=>10, 'Japan'=>16);            

	 $data['xml'] = $this->charts_model->get_piechart_xml($values);	
	 $this->parser->parse('charts/index', $data);
	}
	function GanttChart( $site_id="" , $status="")
	{
	  $data = tags();
	  $data['tabs']	= tabs('charts'); 
	  $data['chart_type']= "Gantt.swf";
	  $data['height'] = 1000; 
	  $data['width'] = 1000;  
	}
	
}


/* End of file charts.php */
/* Location| ./system/application/controllers/charts.php */
?>