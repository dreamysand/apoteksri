<?php
session_start();
include 'functions/sessions/unlogined.php';
include 'functions/sessions/checkadmin.php';
include 'functions/config/connection.php';
include 'functions/jslibrary/functions.php';

$type = (isset($_GET['type'])) ? $_GET['type'] : '';

switch ($type) {
    case 'obat':
        include 'functions/admin/obat/insert.php';
        include 'views/admin/obat/insert.php';
        break;
    case 'kategori':
        include 'functions/admin/obat/kategori/insert.php';
        include 'views/admin/obat/kategori/insert.php';
        break;
    case 'golongan':
        include 'functions/admin/obat/golongan/insert.php';
        include 'views/admin/obat/golongan/insert.php';
        break;
    case 'adminusers':
        include 'functions/admin/adminusers/insert.php';
        include 'views/admin/adminusers/insert.php';
        break;
    case 'recipe':
        include 'functions/admin/recipe/insert.php';
        include 'views/admin/recipe/insert.php';
        break;
    case 'transaksi':
        include 'functions/admin/transaksi/insert.php';
        include 'views/admin/transaksi/insert.php';
        break;
    default:
        // code...
        break;
}
?>