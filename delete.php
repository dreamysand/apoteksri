<?php
session_start();
include 'functions/sessions/unlogined.php';
include 'functions/config/connection.php';

$type = (isset($_GET['type'])) ? $_GET['type'] : '';

switch ($type) {
    case 'obat':
        include 'functions/admin/obat/delete.php';
        break;
    case 'kategori':
        include 'functions/admin/obat/kategori/delete.php';
        break;
    case 'golongan':
        include 'functions/admin/obat/golongan/delete.php';
        break;
    case 'adminusers':
        include 'functions/admin/adminusers/delete.php';
        break;
    case 'transaksi':
        include 'functions/admin/transaksi/delete.php';
        break;
    case 'recipe':
        include 'functions/admin/recipe/delete.php';
        break;
    default:
        // code...
        break;
}
?>
