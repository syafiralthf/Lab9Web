<?php
include "header.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    case 'home':
        include "mod/pages/home.php";
        break;

    case 'about':
        include "mod/pages/about.php";
        break;

    case 'kontak':
        include "mod/pages/kontak.php";
        break;

    case 'barang':
        include "mod/barang/list.php";
        break;

    case 'barang-form':
        include "mod/barang/form.php";
        break;

    case 'barang-save':
        include "mod/barang/save.php";
        break;

    case 'barang-edit':
        include "mod/barang/edit.php";
        break;

    case 'barang-delete':
        include "mod/barang/delete.php";
        break;

    default:
        include "mod/pages/home.php"; 
}

include "footer.php";
?>