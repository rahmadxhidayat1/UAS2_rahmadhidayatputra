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
    $idkey=$_GET['id'];
	$listcategory = mysqli_query($koneksidb,"select * from mst_categorycontainer");
    $datacon= mysqli_query($koneksidb, "SELECT p.idcontainer,p.idmerk, kp.merk, p.idcontainer , p.nmcontainer, p.stock, p.tahun ,p.deskripsi ,p.harga, p.picture 
    FROM mst_container p INNER JOIN mst_categorycontainer kp
    ON kp.idmerk = p.idmerk WHERE idcontainer = $idkey");
	$dt = mysqli_fetch_array($datacon);
	$upidcont = $dt['idcontainer'];
	$upnmcont = $dt['nmcontainer'];
	$upnmmerk = $dt['merk'];
    $upmerk = $dt['idmerk'];
    $upstock = $dt['stock'];
	$uptahun = $dt['tahun'];
    $upharga = $dt['harga'];
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
        if(move_uploaded_file($file['tmp_name'], $target_file)){
            $namafile = $file['name'];
		mysqli_query($koneksidb,"update mst_container SET nmcontainer='$contname', idmerk= $merkname, stock= $stock,tahun='$datetime', harga=$price, deskripsi='$description', picture='$namafile' WHERE idcontainer = '$idcont' ")or die(mysqli_error($koneksidb));
		echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_produk">';
        }
        else if($is_upload == 0){
			pesan("FAILED");
        }
	}
	
}else if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $id=$_GET['id'];
    mysqli_query($koneksidb,"DELETE FROM mst_container where idcontainer='$id'");
    echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_produk">';

}
function pesan($alert){	
    echo '<script language="javascript">';
    echo 'alert("'.$alert.'")';  //not showing an alert box.
    echo '</script>';
    echo '<meta http-equiv="refresh">';	
}
?>