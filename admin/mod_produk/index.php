<?php
include_once("produkctrl.php");
if (!isset($_GET['action'])) {
?>
<a href="?modul=mod_produk&action=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
	<table class="table table-striped table-primary table-bordered border-info">
		<tr>
			<th>idcontainer</th>
			<th>nama container</th>
			<th>merk</th>
			<th>stock</th>
			<th>tahun</th>
			<th>ukuran</th>
            <th>picture</th>
            <th>action</th>
		</tr>
		<?php
        $listcontainer=mysqli_query($koneksidb, "SELECT kp.merk, p.idcontainer , p.nmcontainer, p.stock, p.tahun ,p.ukuran ,p.harga, p.picture FROM mst_categorycontainer kp INNER JOIN mst_container p ON 
        kp.idmerk = p.idmerk");
		while ($ase= mysqli_fetch_array($listcontainer)) {
		?>
        <tr>
            <td><?=$ase['idcontainer']; ?></td>
            <td><?=$ase['nmcontainer']; ?></td>
            <td><?=$ase['merk']; ?></td>
            <td><?=$ase['stock']; ?></td>
            <td><?=$ase['tahun']; ?></td>
            <td><?=$ase['ukuran']; ?></td>
            <th><?=$ase['picture']; ?></th>
            <td> 
                <a href="?modul=mod_userlogin&action=edit&id=<?=$list['iduser']; ?>" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i>edit</a>
                <a href="?modul=mod_userlogin&action=delete&id=<?=$list['iduser']; ?>" class="btn btn-danger">
                        <i class="bi bi-trash"></i>delete</a>
            </td>
        </tr>
        <?php } ?>
	</table>
	<?php } else if (isset($_GET['action']) && ($_GET['action'] == "add" || $_GET['action'] == "edit")) {
        if($proses=="insert"){
    ?>
	<form action="?modul=mod_userlogin&action=save" id="formuser" method="POST">
        <div class="row">
			<label class="col-md-3">username</label>
			<div class="col-md-5">
            <input type="hidden" name="proses" value="<?= $proses; ?>">
            <input type="hidden" name="iduser" value="<?= $upiduser; ?>">
				<input type="text" name="user" id="user" class="form-control" >
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">Nama Lengkap</label>
			<div class="col-md-5">
				<input type="text" name="nama" id="nama" class="form-control" >
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">Password</label>
			<div class="col-md-5">
				<input type="password" name="pass" id="pass" class="form-control" >
			</div>
		</div>
        <div class="row">
			<label class="col-md-3">Confirm Password</label>
			<div class="col-md-5">
				<input type="password" name="passkonfirm" id="passkonfirm" class="form-control" >
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">Is Active</label>
			<div class="col-md-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isactive" id="isactive" value="1">
                    <label class="form-check-label">
                        Aktif
                    </label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isactive" id="isactive" value="0" >
                    <label class="form-check-label" >
                        Not Active
                    </label>
                    </div>
                </div>
		</div>
        <div class="row pt-3">
                <label class="col-md-3"></label>
                <div class="col-md-5">
                    <button type="button" id="btnsubmit" class="btn btn-primary" data-bs-toggle="modal">Simpan</button>
                    <a href="home.php?modul=mod_userlogin"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
            </div>
	</form>
<?php }else{ ?>
    <form action="?modul=mod_userlogin&action=save" id="formuser" method="POST">
        <?php if($proses=="update"){ ?>
        <div class="row">
			<label class="col-md-3">username</label>
			<div class="col-md-5">
            <input type="hidden" name="proses" value="<?= $proses; ?>">
            <input type="hidden" name="iduser" value="<?= $upiduser; ?>">
				<input type="text" name="user" id="user" class="form-control" value="<?= $upuser?>" readonly>
			</div>
		</div>
        <?php } ?>
		<div class="row">
			<label class="col-md-3">nama  lengkap</label>
			<div class="col-md-5">
				<input type="text" name="nama" id="nama" class="form-control" value="<?= $upnama?>">
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">password</label>
			<div class="col-md-5">
				<input type="password" name="pass" id="pass" class="form-control" value="<?= $uppass?>">
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">confirm password</label>
			<div class="col-md-5">
				<input type="password" name="passkonfirm" id="passkonfirm" class="form-control" value="<?= $uppass?>">
			</div>
		</div>
		<div class="row">
			<label class="col-md-3">is active</label>
			<div class="col-md-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isactive" id="isactive" value="1" <?=($dt['is_active'] == 1)?"checked" : "";?>>
                    <label class="form-check-label">
                        aktif
                    </label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isactive" id="isactive" value="0" <?=($dt['is_active'] == 0)?"checked" : "";?>>
                    <label class="form-check-label" >
                        tidak aktif
                    </label>
                    </div>
                </div>
		</div>
        <div class="row pt-3">
                <label class="col-md-3"></label>
                <div class="col-md-5">
                    <button type="button" name="btnsubmit" id="btnsubmit" class="btn btn-primary">Simpan</button>
                    <a href="home.php?modul=mod_userlogin"><button type="button" class="btn btn-warning">Kembali</button></a>
                </div>
            </div>
	</form>
<?php } ?>
<!--modal -->
<div class="modal fade" id="btnkonfirm" tabindex="-1">
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
                <button type="button" name="btnsimpan" id="btnsimpan" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
        </div>
<?php } ?>
