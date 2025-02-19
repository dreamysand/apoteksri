<?php
// include 'functions/sessions/unlogined.php';
session_start();
include 'functions/config/connection.php';
if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin') {
	include 'views/admin/dashboard.php';
} else if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'user') {
	include 'views/user/home.php';
} else {
	include 'views/landing.php';
}
?>