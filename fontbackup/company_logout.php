 <?php
include_once("configure.php");
unset($_SESSION['userid']);

session_destroy();

header('location:index.php');

?>