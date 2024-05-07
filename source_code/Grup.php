<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Grup.controller.php");

$grup = new GrupController();

if (isset($_POST['add'])) {
    //memanggil add
    $grup->add($_POST);
} else if (isset($_GET['tambah'])) {
    $grup->tambah();
} else if (!empty($_GET['id_hapus'])) {
    //memanggil id dari table yang ingin di hapus
    $id = $_GET['id_hapus'];
    // memanggil fungsi pada controller untuk melakukan tugas untuk menghapus data dari id yang dibawa
    $grup->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil id dari table yang ingin di edit
    $id = $_GET['id_edit'];
    // memanggil fungsi pada controller untuk melakukan tugas untuk mengubah data dari id yang dibawa
    $grup->ubah($id);
} else if (isset($_POST['edit'])) {
    $grup->edit($_POST);
} else {
    $grup->index();
}
