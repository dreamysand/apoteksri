<?php
session_start();
include 'functions/config/connection.php';
// include 'functions/sessions/checkadmin.php';

$type = (isset($_GET['type'])) ? $_GET['type'] : '' ;
switch ($type) {
	case 'obat':
		if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin') {
			include 'functions/admin/obat/views.php';
			include 'functions/admin/obat/pagination.php';
			include 'functions/admin/obat/delete.php';
			include 'views/admin/obat/index.php';
		} elseif (!isset($_SESSION['roles']) || $_SESSION['roles'] == 'user') {
			include 'functions/user/obat/show_obat.php';
			include 'functions/user/obat/payment.php';
			include 'views/user/obat/product.php';
		}
		break;
	case 'kategori':
		include 'functions/admin/obat/kategori/views.php';
		include 'functions/admin/obat/kategori/pagination.php';
		include 'functions/admin/obat/kategori/delete.php';
		include 'views/admin/obat/kategori/index.php';
		break;
	case 'golongan':
		include 'functions/admin/obat/golongan/views.php';
		include 'functions/admin/obat/golongan/pagination.php';
		include 'functions/admin/obat/golongan/delete.php';
		include 'views/admin/obat/golongan/index.php';
		break;
	case 'adminusers':
		include 'functions/admin/adminusers/views.php';
		include 'functions/admin/adminusers/pagination.php';
		include 'views/admin/adminusers/index.php';
		break;
	case 'transaksi':
		if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin') {
			include 'functions/admin/transaksi/views.php';
			// include 'functions/admin/transaksi/printpdf.php';
			include 'functions/admin/transaksi/cashier.php';
			include 'views/admin/transaksi/index.php';
			include 'functions/admin/transaksi/acceptdenied.php';
		} elseif (isset($_SESSION['roles']) && $_SESSION['roles'] == 'user') {
			include 'functions/user/transaksi/views.php';
			include 'functions/user/transaksi/printpdf.php';
			include 'views/user/transaksi/index.php';
		}
		break;
	case 'recipe':
		if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin') {
			include 'functions/admin/recipe/views.php';
			include 'functions/admin/recipe/printpdf.php';
			include 'views/admin/recipe/index.php';
			include 'functions/admin/recipe/acceptdenied.php';
		} elseif (isset($_SESSION['roles']) && $_SESSION['roles'] == 'user') {
			include 'functions/user/recipe/views.php';
			include 'functions/user/recipe/printpdf.php';
			include 'functions/user/recipe/uploadpdf.php';
			include 'functions/user/recipe/payment.php';
			include 'views/user/recipe/index.php';
		}
		break;
	case 'laporan':
		include 'functions/admin/laporan/views.php';
		include 'functions/admin/laporan/printpdf.php';
		include 'views/admin/laporan/index.php';
		break;
	default:
		// code...
		break;
}
?>