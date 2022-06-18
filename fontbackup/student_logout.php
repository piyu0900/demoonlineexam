<?php
include_once("configure.php");
unset($_SESSION['student_id']);
unset($_SESSION['userid']);

session_destroy();

header('location:index.php');

?>