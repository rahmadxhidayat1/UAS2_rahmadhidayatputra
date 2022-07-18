<?php
if (isset($_GET['action']) && ($_GET['action'] == "add")) {
    $judul = "Input your data";
} else if (isset($_GET['action']) && ($_GET['action'] == "edit")) {
    $judul1 = "Form Edit Data";
} else if (isset($_GET['action']) && ($_GET['action'] == "save")) {
    $nama = $_POST['nmkategori_ins'];
    mysqli_query($koneksidb, "INSERT INTO mst_categorycontainer (merk) VALUES ('$nama')");
    header("Location: home.php?modul=mod_kategoriproduk");
} else if (isset($_GET['action']) && ($_GET['action'] == "update")) {
    $id = $_POST['idkategori_edt'];
    $nama_up = $_POST['nmkategori_edt'];
    mysqli_query($koneksidb, "UPDATE mst_categorycontainer SET merk='$nama_up' WHERE idmerk='$id'");
    header("Location: home.php?modul=mod_kategoriproduk"); 
} else if (isset($_GET['action']) && ($_GET['action'] == "delete")) {
    $id = $_GET['id'];
    mysqli_query($koneksidb, "DELETE FROM mst_categorycontainer WHERE idmerk='$id'");
    header("Location: home.php?modul=mod_kategoriproduk");
}