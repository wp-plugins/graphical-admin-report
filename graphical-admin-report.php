<?php

/*
Plugin Name: Graphical admin report
Plugin URI: http://www.gopiplus.com/work/2010/07/18/graphical-admin-report/
Description: This plug-in will display the graphical report for admin about post count, user registration, comments posted activity.
Version: 3.0
Author: Gopi.R
Author URI: http://www.gopiplus.com/work/2010/07/18/graphical-admin-report/
*/

$Greport_ColorCounter=0;
$Greport_arr_Colors[0] = "0099CC" ;
$Greport_arr_Colors[1] = "FF0000" ;
$Greport_arr_Colors[2] = "8BBA00";
$Greport_arr_Colors[3] = "F6BD0F";
$Greport_arr_Colors[4] = "A66EDD";
$Greport_arr_Colors[5] = "F984A1" ;
$Greport_arr_Colors[6] = "CCCC00" ;
$Greport_arr_Colors[7] = "999999" ;
$Greport_arr_Colors[8] = "1941A5" ;
$Greport_arr_Colors[9] = "AFD8F8";
$Greport_arr_Colors[10] = "006F00" ;
$Greport_arr_Colors[11] = "0099FF"; 
$Greport_arr_Colors[12] = "FF66CC" ;
$Greport_arr_Colors[13] = "669966" ;
$Greport_arr_Colors[14] = "7C7CB4" ;
$Greport_arr_Colors[15] = "FF9933" ;
$Greport_arr_Colors[16] = "9900FF" ;
$Greport_arr_Colors[17] = "99FFCC" ;
$Greport_arr_Colors[18] = "CCCCFF" ;
$Greport_arr_Colors[19] = "669900" ;

function getFCColor() 
{
	global $Greport_ColorCounter;
	global $Greport_arr_Colors;
	$Greport_ColorCounter++;
	return($Greport_arr_Colors[$Greport_ColorCounter % count($Greport_arr_Colors)]);
}

function Greport_deactivate() {

}
function Greport_activation() {

}
function Greport_admin_options() 
{
	global $wpdb;
	$siteurl = get_option('siteurl');
	$pluginurl = "/wp-content/plugins/graphical-admin-report";
	$fullpluginurl = $siteurl.$pluginurl;
	
	$mainurl = $siteurl."/wp-admin/options-general.php?page=graphical-admin-report/graphical-admin-report.php";
	
	$title = __('Graphical Report');
	?>
<SCRIPT LANGUAGE="Javascript" SRC="<?php echo $fullpluginurl; ?>/FusionCharts.js"></SCRIPT>
<?php
	include("graphical-admin-chart.php");
	?>

<div class="wrap">
  <h2><?php echo wp_specialchars( $title ); ?></h2>
</div>
<?php
	
	$f_month = @$_POST['f_month'];
	$f_day	= @$_POST['f_day'];
	$f_year	= @$_POST['f_year'];
	$t_month = @$_POST['t_month'];
	$t_day	= @$_POST['t_day'];
	$t_year	= @$_POST['t_year'];
	$report_type = @$_POST['report_type'];
	$record_type = @$_POST['record_type'];

	
	?>
<form name="greportfrm" id="greportfrm" method="post" action="<?php echo $mainurl; ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="452">Choose date range</td>
      <td width="111">Choose  type</td>
      <td width="156">Choose graph type</td>
      <td width="65">&nbsp;</td>
    </tr>
    <tr>
      <td><select name="f_month" id="f_month">
          <option value="">Month</option>
          <option <?php if($f_month=="1") { echo "selected=''"; } ?> value="1">Jan</option>
          <option <?php if($f_month=="2") { echo "selected=''"; } ?> value="2">Feb</option>
          <option <?php if($f_month=="3") { echo "selected=''"; } ?>  value="3">Mar</option>
          <option <?php if($f_month=="4") { echo "selected=''"; } ?> value="4">Apr</option>
          <option <?php if($f_month=="5") { echo "selected=''"; } ?> value="5">May</option>
          <option <?php if($f_month=="6") { echo "selected=''"; } ?> value="6">Jun</option>
          <option <?php if($f_month=="7") { echo "selected=''"; } ?> value="7">Jul</option>
          <option <?php if($f_month=="8") { echo "selected=''"; } ?> value="8">Aug</option>
          <option <?php if($f_month=="9") { echo "selected=''"; } ?> value="9">Sep</option>
          <option <?php if($f_month=="10") { echo "selected=''"; } ?> value="10">Oct</option>
          <option <?php if($f_month=="11") { echo "selected=''"; } ?> value="11">Nov</option>
          <option <?php if($f_month=="12") { echo "selected=''"; } ?> value="12">Dec</option>
        </select>
        <select name="f_day" id="f_day">
          <option value="" >Day</option>
          <?php
		  
        for($i=1;$i<=31;$i++)
        {
		echo "==";
        ?>
          <option <?php if($i==$f_day) { echo "selected=''"; } ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
          <?php
        }
        ?>
        </select>
        <select name="f_year" id="f_year">
          <option value="" >Year</option>
          <?php
        for($i=2005;$i<=2015;$i++)
        {
        ?>
          <option <?php if($i==$f_year) { echo "selected=''"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
        }
        ?>
        </select>
        -
        <select name="t_month" id="t_month">
          <option value="">Month</option>
          <option <?php if($t_month=="1") { echo "selected=''"; } ?> value="1">Jan</option>
          <option <?php if($t_month=="2") { echo "selected=''"; } ?> value="2">Feb</option>
          <option <?php if($t_month=="3") { echo "selected=''"; } ?> value="3">Mar</option>
          <option <?php if($t_month=="4") { echo "selected=''"; } ?> value="4">Apr</option>
          <option <?php if($t_month=="5") { echo "selected=''"; } ?> value="5">May</option>
          <option <?php if($t_month=="6") { echo "selected=''"; } ?> value="6">Jun</option>
          <option <?php if($t_month=="7") { echo "selected=''"; } ?> value="7">Jul</option>
          <option <?php if($t_month=="8") { echo "selected=''"; } ?> value="8">Aug</option>
          <option <?php if($t_month=="9") { echo "selected=''"; } ?> value="9">Sep</option>
          <option <?php if($t_month=="10") { echo "selected=''"; } ?> value="10">Oct</option>
          <option <?php if($t_month=="11") { echo "selected=''"; } ?> value="11">Nov</option>
          <option <?php if($t_month=="12") { echo "selected=''"; } ?> value="12">Dec</option>
        </select>
        <select name="t_day" id="t_day">
          <option value="" >Day</option>
          <?php
        for($i=1;$i<=31;$i++)
        {
        ?>
          <option <?php if($i==$t_day) { echo "selected=''"; } ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>
          <?php
        }
        ?>
        </select>
        <select name="t_year" id="t_year">
          <option value="" >Year</option>
          <?php
        for($i=2005;$i<=2015;$i++)
        {
        ?>
          <option <?php if($i==$t_year) { echo "selected=''"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
        }
        ?>
        </select>
      </td>
      <td><select name="report_type" id="report_type">
          <option <?php if($report_type=="Month") { echo "selected=''"; } ?> value="Month">Month</option>
          <option <?php if($report_type=="Day") { echo "selected=''"; } ?> value="Day">Day</option>
        </select></td>
      <td><select name="record_type" id="report_type">
          <option <?php if($record_type=="Posts report graph") { echo "selected=''"; } ?> value="Posts report graph">Posts report</option>
          <option <?php if($record_type=="User registration graph") { echo "selected=''"; } ?> value="User registration graph">User registration</option>
          <option <?php if($record_type=="Comments report graph") { echo "selected=''"; } ?> value="Comments report graph">Comments report</option>
        </select>
      </td>
      <td><input name="Greport_search" class="button-primary" id="Greport_search" type="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
<?php
	if($record_type == "User registration graph")
	{
		$table_string = "$wpdb->users";
		$date_string = "user_registered";
		$where_string = "where 1=1 ";
	}
	elseif($record_type == "Comments report graph")
	{
		$table_string = "$wpdb->comments";
		$date_string = "comment_date";
		$where_string = "where comment_type<>'pingback'";
	}
	else
	{
		$table_string = "$wpdb->posts";
		$date_string = "post_date";
		$where_string = "where post_type = 'post'";
		$record_type = "Posts report graph";
	}
	if($report_type == "")
	{
		$report_type = "Month";
	}
	if($f_month <> "" && $f_day <> "" && $f_year <> "" && $t_month <> "" && $t_day <> "" && $t_year <> "")
	{
		$Choosen_date_range = $f_month ."/". $f_day ."/". $f_year . " - " . $t_month ."/". $t_day ."/". $t_year ;
		$Choosen_date_range_graph = "(" . $f_month ."/". $f_day ."/". $f_year . "  -  " . $t_month ."/". $t_day ."/". $t_year . ")";
	}
	else
	{
		$Choosen_date_range = "Not selected (or) Not selected properly";
	}
	echo "<i><br>Choosen date range   : " . $Choosen_date_range;
	echo "<br>Choosen type   : " . $report_type ;
	echo "<br>Choosen graph type   : " . $record_type ;
	echo "<br><br></i>";
	$sSql =	"SELECT";
	if($report_type == "Day") {
	$sSql =	$sSql . " DAY($date_string) as d,"; 
	}
	$sSql =	$sSql . " MONTH($date_string) as m, YEAR($date_string) as y, COUNT(*) as tot";
	$sSql =	$sSql . " FROM $table_string $where_string";
	if($f_month <> "" && $f_day <> "" && $f_year <> "" && $t_month <> "" && $t_day <> "" && $t_year <> "") {
		$sSql =	$sSql . " and $date_string BETWEEN '$f_year-$f_month-$f_day' AND '$t_year-$t_month-$t_day'"; 
	}
	$sSql =	$sSql . " GROUP BY";
	if($report_type == "Day") {
	$sSql =	$sSql . " DAY($date_string), ";
	}
	$sSql =	$sSql . " MONTH($date_string), YEAR($date_string)";
	$sSql =	$sSql . " order by";
	$sSql =	$sSql . " YEAR($date_string) desc,MONTH($date_string) desc";
	if($report_type == "Day") {
	$sSql =	$sSql . " ,DAY($date_string) desc"; 
	}



	//------------------------------Monthly post Summary-----------------------------------------------------
	//$sSql =	"SELECT MONTH(post_date) as m, YEAR(post_date) as y, COUNT(*) as tot";
	//$sSql =	$sSql . " FROM $wpdb->posts where post_type = 'post'";
	//$sSql =	$sSql . " GROUP BY MONTH(post_date), YEAR(post_date) order by YEAR(post_date) desc,MONTH(post_date) desc limit 0,12";
	
	//echo "<br><br><br><br>" . $sSql;
	$data = $wpdb->get_results($sSql);
	$i = 0;
	$graph_ststus=0;
	$arrposts = array();
	$monthnames = array(1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
    foreach ( $data as $data ) 
	{ 
		$arrposts[$i][1] = $monthnames[$data->m];
		$arrposts[$i][2] = $data->tot;
		$arrposts[$i][3] = $data->y;
		if($report_type == "Day") {
			$arrposts[$i][4] = $data->d;
		}
		$i = $i+1; 
	} 
	if($i > 0) { $graph_ststus = 1; }
	$strXML = "<graph caption='$report_type - $Choosen_date_range_graph  $record_type' subcaption='' xAxisName='$report_type' yAxisMinValue='0' yAxisName='Total' decimalPrecision='0' formatNumberScale='0' numberPrefix=' ' showNames='1' showValues='0' showAlternateHGridColor='1' canvasBgColor='E1EEF4' canvasBaseColor='CCE1EC' hovercapbgColor='FFECAA'  hovercapborder='F47E00' baseFontColor='1A5873' lineColor='2EA0D1' divLineColor='8cbdd5' divLineAlpha='20' alternateHGridAlpha='5' rotateNames='1'>";
	foreach ($arrposts as $arSubData)
	{
		if($report_type == "Day") 
		{ 
			$strXML = $strXML . "<set color='". getFCColor() ."' name='" . $arSubData[4] . "th " . $arSubData[1] . " " . $arSubData[3] . "' value='" . $arSubData[2] ."' hoverText='" . $arSubData[4] . "th " . $arSubData[1] . " " . $arSubData[3] . "' />";
		}
		else
		{
			$strXML = $strXML . "<set color='". getFCColor() ."' name='" . $arSubData[1] . " " . $arSubData[3] . "' value='" . $arSubData[2] ."' hoverText='" . $arSubData[1] . "' />";
		}
	}
	$strXML = $strXML . "</graph>";
	if($graph_ststus==1)
	{
		echo renderChart("$fullpluginurl/FCF_Column3D.swf", "", $strXML, "wp_posts", 800, 450, false, false);
	}
	else
	{
		echo "<div align='center'>At present monthly post summary graph not available.</div>";
	}
	//---------------------------------------------------------------------------------------------------------


	//----------------------------------------------------------------------------------------------------------
	?>
	<h2><?php echo wp_specialchars( 'About plugin!' ); ?></h2>
	Plug-in created by <a target="_blank" href='http://www.gopiplus.com/work/'>Gopi</a>.<br>
	<a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/graphical-admin-report/'>Click here</a> to post suggestion or comments or feedback.<br>
	<a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/graphical-admin-report/'>Click here</a> to see live demo.<br>
	<a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/graphical-admin-report/'>Click here</a> to see more info.<br>
	<a target="_blank" href='http://www.gopiplus.com/work/plugin-list/'>Click here</a> to see my other plugins.<br>
<?php
	
}

function Greport_add_to_menu() 
{
	add_options_page('Graphical Report', 'Graphical Report', 'manage_options', __FILE__, 'Greport_admin_options' );
	
}

register_activation_hook(__FILE__, 'Greport_activation');
add_action('admin_menu', 'Greport_add_to_menu');
register_deactivation_hook( __FILE__, 'Greport_deactivate' );

?>