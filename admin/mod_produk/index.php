<?php
include_once("produkctrl.php");
if (!isset($_GET['action'])) {
?>
<a href="?modul=mod_produk&action=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
<div>
    <h1 class="d-flex justify-content-center">PENGATURAN PRODUK</h1>
</div>
	<table class="table table-striped">
		<tr>
            <thead class="table-dark">
			<th>nama container</th>
			<th>merk</th>
			<th>stock</th>
			<th>tahun</th>
			<th>deskripsi</th>
            <th>picture</th>
            <th>action</th>
            </thead>
		</tr>
		<?php
        $listcontainer=mysqli_query($koneksidb, "SELECT p.idcontainer, kp.merk, p.idcontainer , p.nmcontainer, p.stock, p.tahun ,p.deskripsi ,p.harga, p.picture FROM mst_categorycontainer kp INNER JOIN mst_container p ON 
        kp.idmerk = p.idmerk");
		while ($ase= mysqli_fetch_array($listcontainer)) {
		?>
        <tr>
            <td><?=$ase['nmcontainer']; ?></td>
            <td><?=$ase['merk']; ?></td>
            <td><?=$ase['stock']; ?></td>
            <td><?=$ase['tahun']; ?></td>
            <td><?=$ase['deskripsi']; ?></td>
            <td><img src="../assets/img/<?=$ase['picture']; ?>" width="200px"></td>
            <td> 
                <a href="?modul=mod_produk&action=edit&id=<?=$ase['idcontainer']; ?>" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i>edit</a>
                <a href="?modul=mod_userlogin&action=delete&id=<?=$ase['idcontainer']; ?>" class="btn btn-danger">
                        <i class="bi bi-trash"></i>delete</a>
            </td>
        </tr>
        <?php } ?>
	</table>
	<?php } else if (isset($_GET['action']) && ($_GET['action'] == "add" || $_GET['action'] == "edit")) {
        if($proses=="insert"){
    ?>
	<form action="?modul=mod_produk&action=save" enctype="multipart/form-data" id="formproduk" method="POST">
        <div class="row">
			<label class="col-md-3">Container Name</label>
			<div class="col-md-5">
            <input type="hidden" name="proses" value="<?= $proses; ?>">
            <input type="hidden" name="idcont" value="<?= $upidcont; ?>">
				<input type="text" name="nm_cont" id="nm_cont" class="form-control" >
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">Merk Name</label>
            <div class="col-md-5">
			<select name="nm_merk" id="nm_merk" value="" class="form-control">
                <option value="">--Pilih Barang--</option>
                    <?php 
                    $data_category = mysqli_query($koneksidb,"select * from mst_categorycontainer ");
                    foreach($data_category as $p){
                    echo '<option value="'.$p['idmerk'].' "data-namabrg="'.$p['merk'].'">
                    '.$p['merk'].'</option>';
                    }
                ?>
            </select>
            </div>
		</div>
        <div class="row">
			<label class="col-md-3">Stock</label>
			<div class="col-md-5">
				<input type="number" name="stock" id="stock" class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Tahun Lahir</label>
			<div class="col-md-5">
				<input type="date" name="datetime" id="datetime" class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Price</label>
			<div class="col-md-5">
				<input type="number" name="price" id="price" class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Description</label>
			<div class="col-md-5">
				<input type="text" name="desc" id="desc" class="form-control" >
			</div>
		</div>
        <div class="mb-3 row">
            <label for="img" class="col-md-3">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
        </div>
        <div class="row pt-3">
                <label class="col-md-3"></label>
                <div class="col-md-5">
                    <button type="button" name="btn_sim" id="btn_sim" class="btn btn-primary" data-bs-toggle="modal">Simpan</button>
                    <a href="home.php?modul=mod_produk"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
            </div>
	</form>
<?php }else{ ?>
    <form action="?modul=mod_produk&action=" id="formproduk" enctype="multipart/form-data" method="POST">
        <?php if($proses =="update"){?>
        <div class="row">
			<label class="col-md-3">nama container</label>
			<div class="col-md-5">
            <input type="hidden" name="proses" value="<?= $proses; ?>">
            <input type="hidden" name="idcont" value="<?= $upidcont; ?>">
				<input type="text" name="nm_cont" id="nm_cont" class="form-control" value="<?= $upnmcont?>" >
			</div>
		</div>
        <?php } ?>
        <!--  -->
        <div class="row">
			<label class="col-md-3">Merk Name</label>
            <div class="col-md-5">
			<select class="form-control " id="nm_merk" name="nm_merk">
					<option value="">--Pilih Kategori--</option>
					<?php
					while($dt = mysqli_fetch_array($listcategory)){
						if($upmerk == $dt['idmerk']){
							$selec = "selected='selected'";
						}
						else{
							$selec = "";
						}
						echo "<option value='$dt[idmerk]' $selec> --$dt[merk]--</option>";
					}
					?>
				</select>
            </div>
		</div>
        <!-- asda -->
        <div class="row">
			<label class="col-md-3">Stock</label>
			<div class="col-md-5">
				<input type="number" name="stock" id="stock" value="<?= $upstock?>"  class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Tahun Lahir</label>
			<div class="col-md-5">
				<input type="date" name="datetime" id="datetime" value="<?= $uptahun?>"  class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Price</label>
			<div class="col-md-5">
				<input type="number" name="price" id="price" value="<?= $upharga?>"  class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Description</label>
			<div class="col-md-5">
				<input type="text" name="desc" id="desc" value="<?= $updeskripsi?>"  class="form-control" >
			</div>
		</div>
        <div class="mb-3 row">
            <label for="img" class="col-md-3">Image</label>
            <div class="col-sm-5">
                <img src="../assets/img/<?=$uppicture; ?>" width="200px">
                <input type="file" class="form-control" id="picture" value="<?= $uppicture?>" name="picture">
            </div>
        </div>
        <div class="row pt-3">
                <label class="col-md-3"></label>
                <div class="col-md-5">
                    <button type="button" name="btn_sim" id="btn_sim" class="btn btn-primary" data-bs-toggle="modal">Simpan</button>
                    <a href="home.php?modul=mod_produk"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
            </div>
	</form>
<?php } ?>
<!--modal -->
<div class="modal fade" id="themodal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                apakah anda yakin ingin menyimpan?
            </div>
            <div class="modal-footer">
                <button type="button" name="btnbatal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="btnsimp" id="btnsimp" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
        </div>
<?php } ?>
