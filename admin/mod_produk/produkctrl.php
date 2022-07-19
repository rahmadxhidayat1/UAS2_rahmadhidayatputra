<?php 
security_login();

if(!isset($_GET['action'])){
	$data_menu = mysqli_query($koneksidb,"select * from mst_userlogin");
	//untuk contoh generate kode		
}
else if(isset($_GET['action']) && $_GET['action'] == "add"){
	$nmmenu = "";
	$proses = "insert";
	$idmenu = 0 ;
}
else if(isset($_GET['action']) && $_GET['action'] == "edit"){
    $ids=$_GET['id'];
	$qry = mysqli_query($koneksidb,"select * from mst_container where idcontainer='$ids'");
	$dt = mysqli_fetch_array($qry);
	$upidcont = $dt['idcontainer'];
	$upnmcont = $dt['nmcontainer'];
	$upnmmerk = $dt['idmerk'];
    $upstock = $dt['stock'];
	$uptahun = $dt['tahun'];
    $upharga = $dt['idharga'];
    $updeskripsi = $dt['deskripsi'];
    $uppicture = $dt['picture'];
	$proses = "update";
}
else if(isset($_GET['action']) && $_GET['action'] == "save"){
	$idcont = $_POST['idcont'];
	$contname = $_POST['nm_cont'];
	$merkname = $_POST['nm_merk'];
    $stock = $_POST['stock'];
    $datetime = $_POST['datetime'];
    $price = $_POST['price'];
    $description = $_POST['desc'];
    $file = $_FILES['picture']; 
		$target_dir = "../assets/img/";
		$target_file =  $target_dir.basename($file['name']);
		$type_file =strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    $is_upload = 1;

    if($file['size'] > 2000000){
        $is_upload = 0;
        pesan("File lebih dari 2MB!!");		
    }

    if($type_file != "jpg" ){
        $is_upload = 0;
        pesan("hanya tipe file jpg yang diperbolehkan!!");	
    }
    $namafile = "";
	$proses = $_POST['proses'];
	if($proses == "insert" && $is_upload == 1){
        if(move_uploaded_file($file['tmp_name'], $target_file)){
            $namafile = $file['name'];
            mysqli_query($koneksidb,"INSERT INTO mst_container(nmcontainer,idmerk,stock,tahun,harga,deskripsi,picture) VALUES ('$contname', $merkname , $stock ,'$datetime', $price ,'$description','$namafile')")or die (mysqli_error($koneksidb));
            echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_produk">';
        }
        else if($is_upload == 0){
			pesan("FAILED");
        }
	}
	else if($proses == "update"){
		mysqli_query($koneksidb,"update mst_userlogin SET username='$username', nama_lengkap='$nama',password='$pass',is_active='$isactive' WHERE iduser = '$iduser' ")or die(mysqli_error($koneksidb));
		echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_userlogin">';
	}
	
}else if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $id=$_GET['id'];
    mysqli_query($koneksidb,"DELETE FROM mst_userlogin where iduser='$id'");
    echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_userlogin">';

}
function pesan($alert){	
    echo '<script language="javascript">';
    echo 'alert("'.$alert.'")';  //not showing an alert box.
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0; url=http:home.php?modul=mod_produk&action=add">';	
}
?>