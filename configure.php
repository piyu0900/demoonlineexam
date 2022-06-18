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
define("ADMIN_TITLE", "Welcome to the Insightsias Administrative Panel");
define("SITE_NAME", "Admin Panel");
define("SITE_FROM", "Admin Panel");
define("COPYRIGHT_TEXT", "<strong>Insightsias &copy; 2016-2017,</strong> All Rights Reserved.");
/*============================================================================================*/		


	define("DB_HOST", "localhost");
	define("DB_USER", "onlineexam321");
	define("DB_PASSWORD", "97tFr4;Zs-}G");
	define("DB_NAME", "onlineexam321");
	define("SITE_URL", "http://pinkwebsolutionz.com/dev/onlineexam/");	

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
define("DTABLE_THEME_PANEL", "admin_theme_panel");
define("DTABLE_TESTI", "admin_testi");
define("DTABLE_FAQ", "admin_faq");
define("DTABLE_ORDER", "admin_order");
define("DTABLE_USER", "admin_user");
define("DTABLE_EXAM", "admin_exam");
define("DTABLE_TEST", "admin_test");
define("DTABLE_ADMIN_QUESANSW", "admin_question_answer");
define("DTABLE_ADMIN_QUESANSW2", "admin_question_answer2");
define("DTABLE_ADMIN_QUESANS", "admin_ques_ans");





/*============================================================================================*/
define("TESTI_ADMIN_IMAGE_PATH", "../images/testi/");
define("TESTI_FRONTEND_IMAGE_PATH", "images/testi/");
define("ADV_ADMIN_IMAGE_PATH", "../images/advantage/");
define("ADV_FRONTEND_IMAGE_PATH", "images/advantage/");
define("USER_ADMIN_IMAGE_PATH", "../img/user/");
define("USER_FRONTEND_IMAGE_PATH", "img/user/");
define("USER_ADMIN_ANSWIMAGE_PATH", "../images/answimage/");
define("USER_FRONTEND_ANSWIMAGE_PATH", "images/answimage/");





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