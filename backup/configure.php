<?php
ob_start();
session_start(); 
/*============================================================================================*/
require_once("class/DbHandler.class.php");
require_once("class/ImageResize.class.php");
require_once("class/ProjectMethord.class.php");
require_once("class/GeneralFunction.class.php");
require_once("class/HTML.class.php");
/*============================================================================================*/
define("ADMIN_TITLE", "Welcome to the Petroleague Portal Administrative Panel");
define("SITE_NAME", "Petroleague Portal");
define("SITE_FROM", "Petroleague Portal");
define("COPYRIGHT_TEXT", "<strong>Petroleague Portal &copy; 2016-2017,</strong> All Rights Reserved.");
/*============================================================================================*/		


	define("DB_HOST", "localhost");
	define("DB_USER", "petroleague");
	define("DB_PASSWORD", "Petroleague@123");
	define("DB_NAME", "petroleague");
	define("SITE_URL", "http://petroleague.com/");	

/*************** End *******************/
define("SITE_ID",1);
define("MSG_INVALID_USER", "Invalid User Name or Password");
define("MSG_LOGIN_EXIST", "Login Id already exist.Please chose another.");
define("MSG_EMAIL_EXIST", "Email Id you provide already exist.Please choose another.");
define("MSG_ADD_SUCCESS", "Added Successfully.");
define("MSG_EDIT_SUCCESS", "Updated Successfully.");
define("MSG_DELETE_SUCCESS", "Deleted Successfully.");
define("MSG_ADD_FAIL", "Addition Fail.");
define("MSG_EDIT_FAIL", "Update Failed");
define("MSG_DELETE_FAIL", "Deletion Fail.");
define("MSG_REC_EXIST", "Record already exist.");
define("MSG_CATEGORY_EXIST", "Category Name already exist.Please chose another.");
define("MSG_OLD_PASSWORD_MISMATCH", "The Password you have Provided does not match with your Old Password.");
define("MSG_BLANK_PASSWORD", "Password can't be Blank.");
define("MSG_PASSWORD_MISMATCH", "Password Mismatch.");
define("MSG_PASSWORD_CHANGED", "Your Password has been successfully changed.");
define("MSG_PLEASE_CHECK", "Please check at least one checkbox.");
/*============================================================================================*/
define("DTABLE_ADMIN", "admin_admin");
define("DTABLE_SETTING", "admin_setting");
define("DTABLE_COMPANY", "admin_company");
define("DTABLE_STUDENT", "admin_student");
define("DTABLE_STRAM", "admin_category");
define("DTABLE_JOB", "admin_jobs");
define("DTABLE_STATE_LIST", "admin_state_list");
define("DTABLE_ADS", "admin_ads");
define("DTABLE_APPLY_JOB", "admin_job_apply");
/*============================================================================================*/
define("CATE_PIC_UPLOAD", "images/upload/category/");
define("CHANNEL_FRONTEND_PATH", "images/upload/clients/");
/*============================================================================================*/
$db = new DbHandler();
$gf = new GeneralFunction($db, array('memberInformation.php','memberHistory.php','memberOrderDetails.php'), array('index.php','adminOperations.php'));
$image = new SimpleImage();
$pm = new PM($db);
$html = new HTML($db);
/*============================================================================================*/
// Generate or Resume Session ID ----------
if(!$_SESSION['sess_id']){
$sess_id = session_id();
}else{
$sess_id = $_SESSION['sess_id'];
}
$_SESSION['sess_id'] = $sess_id;
// ----------------------------------------
?>