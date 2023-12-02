<?php
if(Auth::user()==null){
header('Location: login');exit;
}	
ini_set('memory_limit', '-1'); 
date_default_timezone_set("Africa/Cairo");
include_once("import/conn.php");
$client_id = Auth::user()->client_id;
$categorie_id = request()->get('categorie_id');
$clinid = Auth::user()->client_id;

$category_id = request()->get('categorie_id');
$sub_client = request()->get('categorie_id');
$branche_id = request()->get('categorie_id');
$get_unit_type = request()->get('get_unit_type');
$user_related = Auth::user()->related;
$user_location = Auth::user()->location;
$edit_by = Auth::user()->name_ar;
$edit_by_id = Auth::user()->id;																
$user_id_number = Auth::user()->id_number;																
$user_username = Auth::user()->username;																
$user_super_admin = Auth::user()->super_admin;	
/* $userrrid = Auth::user()->id; */
$userlocatioonnn = Auth::user()->location;	
$table_column_pdf='';														
$tabel_name1='';		

$tble_pdf_font_thead = "";
$tble_pdf_font_tbody = "";
$tble_pdf_widths ='';
												
$year = '';
$month = '';
$monthd = '01';
$location = '';
$branches = '';
$branche_name = '';
$related = '';
$ntq = '';

$search = '';
$countii = 0;
$table_order_column ='0';
$table_order_by ='asc';
////////////////qr_reports_users2
 $ser_usename_loction='';
 $ser_usename  ='';
$tolloff=8;
$totaloffsss=0; 
$totaloff=0;
$name='';
$ttend=0;
$nubtgy=0;
$tothour=0;
$elomokml=0;
$overtime='';
$overtimemm='';
$tothour2=0;
$tbefody=0;
$offtime=0;
$numberdymonth=0;
$overtime11='00:00';
$timesss2333='00:00';

$percentmmmm='';
$dyrkk=0;
$elapsed22='';
$eymnbtgy=0;


$p5resent=0;/// 5%
$redu=0;/// ساعة رضاعة
$off = 2;
///


//// ip adress
$local_ip = gethostbyname(trim(`hostname`));
$online_ip = Request::ip();
//


//ip url
$string_url = $_SERVER['HTTP_HOST'];
$string_url = str_replace("https://","",$string_url);
$string_url = str_replace("http://","",$string_url);
$string_url = explode("/", $string_url, 2);
$ip_url = $string_url[0];
//
$userloction_array=array();
$users_array=array();
$off_array =array();
$nnnnn_array =array();

$checkIn =  '';
if(isset($_GET['checkIn'])){  if(!empty($_GET['checkIn'])){ $checkIn= request()->get('checkIn'); }}
$from_date  =  '';
$end_date   =  '';
$checkIn1 =  '';
$checkout1  =  '';
$fromdteee =   date('d-m-Y');
if(isset($_GET['fromdteee'])){  if(!empty($_GET['fromdteee'])){ 

$fromdteee= request()->get('fromdteee');
$fromdteee2 = date('Y/m/d', strtotime($fromdteee));
$check_mounth = date('Y-m', strtotime($fromdteee));
$checkInttt = $fromdteee2;
$checkIn1= $checkInttt.' 00:00:00';
}}
$todtteeee = date('d-m-Y');
if(isset($_GET['todtteeee'])){  if(!empty($_GET['todtteeee'])){ 
$todtteeee= request()->get('todtteeee');
$todtteeee2 = date('Y/m/d', strtotime($todtteeee));
$checkout1ttt = $todtteeee2;
$checkout1= $checkout1ttt.' 23:59:59';
}}

////////////////
$check_mounth = '';
if(isset($_GET['check_mounth'])){  if(!empty($_GET['check_mounth'])){ 
	$check_mounth= request()->get('check_mounth');
	$start_month = $check_mounth.'-01';
	$end_month = $check_mounth.'-' . date('t', strtotime($start_month)); //get end date of month
	$start_month_convert = date('Y/m/d', strtotime($start_month)); //convert start_mont
	$end_month_convert = date('Y/m/d', strtotime($end_month)); //convert end_month

	$check_mounth_start= $start_month_convert.' 00:00:00';
	$check_mounth_end= $end_month_convert.' 23:59:59';	

	$months= date('m', strtotime($check_mounth_start));
	$totlmontdys=cal_days_in_month(CAL_GREGORIAN,$months ,2022);//عدد ايام الشهر
}}
///////////////////





if(isset($_GET['location'])){if(!empty($_GET['location'])){ $location = request()->get('location');}}
if(isset($_GET['related'])){if(!empty($_GET['related'])){ $related = request()->get('related');}}
if(isset($_GET['ntq'])){if(!empty($_GET['ntq'])){ $ntq = request()->get('ntq');}}	



$id_number0 = request()->get('search');
$arabic1 = array('0','1','2','3','4','5','6','7','8','9');
$engli1 = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
$str1 = str_replace($engli1, $arabic1, $id_number0);
$search = $str1;

	
	
if(isset($_GET['month'])){ if(!empty($_GET['month'])){$month = request()->get('month');
$monthd = request()->get('month'); }} 
if(isset($_GET['year'])){ if(!empty($_GET['year'])){$year = request()->get('year'); } }
$d=cal_days_in_month(CAL_GREGORIAN,$monthd ,2022);

////////////صلاحيات
$array_cfilter= Auth::user()->array_loction;
$brand_filter0=array_map(null, explode(',', $array_cfilter));
$userloction_filter = implode("','", $brand_filter0);


$userloction_var=explode(',',$userloction_filter);
$userloction_array = str_replace("'","",$userloction_var);
///////

////////////صلاحيات
$array_sidebar= Auth::user()->array_sidebar;
$brand_filter0=array_map(null, explode(',', $array_sidebar));
$user_sidebar = implode("','", $brand_filter0);
$user_sidebar=explode(',',$user_sidebar);
$userl_sidebar_array = str_replace("'","",$user_sidebar);
///////


////////////صلاحيات
$array_sidebar_sub= Auth::user()->array_sidebar_sub;
$brand_filter0=array_map(null, explode(',', $array_sidebar_sub));
$user_sidebar_sub = implode("','", $brand_filter0);
$user_sidebar_sub=explode(',',$user_sidebar_sub);
$userl_sidebar_sub_array = str_replace("'","",$user_sidebar_sub);
///////

 function cal_percentage($num_amount, $num_total) {
  $count1 = $num_amount / $num_total;
  $count2 = $count1 * 100;
  $count = number_format($count2, 0);
  return $count;
}


function explode_time($time) { //explode time and convert into seconds
        $time = explode(':', $time);
        $time = $time[0] * 3600 + $time[1] * 60;
        return $time;
}
function second_to_hhmm($time) { //convert seconds to hh:mm
        $hour = floor($time / 3600);
        $minute = strval(floor(($time % 3600) / 60));
        if ($minute == 0) {
            $minute = "00";
        } else if ($minute < 10) {
            $minute = '0'.$minute;
        }else{
			$minute = $minute;
		}
		
		if ($hour == 0) {
            $hour = "00";
        } else if ($hour < 10) {
            $hour = '0'.$hour;
        }else{
			$hour = $hour;
		}
        $time = $hour . ":" . $minute;
        return $time;
}



$months = array(
    "Jan" => "يناير",
    "Feb" => "فبراير",
    "Mar" => "مارس",
    "Apr" => "أبريل",
    "May" => "مايو",
    "Jun" => "يونيو",
    "Jul" => "يوليو",
    "Aug" => "أغسطس",
    "Sep" => "سبتمبر",
    "Oct" => "أكتوبر",
    "Nov" => "نوفمبر",
    "Dec" => "ديسمبر"
);


	
$dayys = array(
	"Saturday" => "السبت",
	"Sunday" => "الاحد",
	"Monday" => "الاثنين",
	"Tuesday" => "الثلاثاء",
	"Wednesday" => "الاربعاء",
	"Thursday" => "الخميس",
	"Friday" => "الجمعة"
);


/* include 'class_table.php'; */

$sql2 = "SELECT * FROM clients where id='$client_id'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
  while($r_client = $result2->fetch_assoc()) { 
	$clint_name =$r_client['name'];
	$clintnnn = str_replace(" ", "", $r_client['name']); }} ?>


<input type="hidden"  value="<?php echo $edit_by; ?>" id="edit_by_name"  name="edit_by_name"  >	
<input type="hidden"  value="<?php echo $edit_by_id; ?>" id="edit_by_id" name="edit_by_id"  >