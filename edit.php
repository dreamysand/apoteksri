<?php
session_start();
include 'functions/sessions/unlogined.php';
include 'functions/sessions/checkadmin.php';
include 'functions/config/connection.php';
include 'functions/jslibrary/functions.php';

$type = (isset($_GET['type'])) ? $_GET['type'] : '';

switch ($type) {
    case 'obat':
        include 'functions/admin/obat/edit.php';
        include 'views/admin/obat/edit.php';
        break;
    case 'kategori':
        include 'functions/admin/obat/kategori/edit.php';
        include 'views/admin/obat/kategori/edit.php';
        break;
    case 'golongan':
        include 'functions/admin/obat/golongan/edit.php';
        include 'views/admin/obat/golongan/edit.php';
        break;
    case 'adminusers':
        include 'functions/admin/adminusers/edit.php';
        include 'views/admin/adminusers/edit.php';
        break;
    case 'profile':
        include 'functions/profile/edit.php';
        include 'views/profile/edit.php';
        break;
    default:
        // code...
        break;
}
?>
