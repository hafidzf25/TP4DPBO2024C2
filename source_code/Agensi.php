<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Agensi.controller.php");

$agensi = new AgensiController();

if (isset($_POST['add'])) {
    //memanggil add
    $agensi->add($_POST);
} else if (isset($_GET['tambah'])) {
    $agensi->tambah();
} else if (!empty($_GET['id_hapus'])) {
    //memanggil id dari table yang ingin di hapus
    $id = $_GET['id_hapus'];
    // memanggil fungsi pada controller untuk melakukan tugas untuk menghapus data dari id yang dibawa
    $agensi->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil id dari table yang ingin di edit
    $id = $_GET['id_edit'];
    // memanggil fungsi pada controller untuk melakukan tugas untuk mengubah data dari id yang dibawa
    $agensi->ubah($id);
} else if (isset($_POST['edit'])) {
    $agensi->edit($_POST);
} else {
    $agensi->index();
}
