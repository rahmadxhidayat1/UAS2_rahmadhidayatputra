<?php 
	require_once("config/koneksidb.php");
	require_once("config/config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
<?php
	function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,2,',', '.');
	return $hasil_rupiah;
     }
	?>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
		<div class="container pe-5 ps-5">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fontnav text-white">
				<li class="nav-item">
					<a href="customer.php" class="nav-link">HOME</a>
				</li>
				<li class="nav-item">
					<a href="?page=halamanProduk" class="nav-link">PRODUCT</a>
				</li>
				<li class="nav-item">
					<a href="customer.php" class="nav-link"><i class="bi bi-cart-plus"></i> ORDER</a>
				</li>
			</ul>
			<div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fontnav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?page=daftarmember">Daftar Member</a>
					</li>	
				</ul>
			</div>
		</div>
	</nav>
    <section id="header">
		<div class="container ps-0">
			<img src="assets/img/banner.jpg" class="banner" />
			<div class="judulbanner">
			</div>
			<div class="col-md-8 pt-2">
				<div class="row">
					<?php
                    $qlistcon = mysqli_query($koneksidb, "SELECT a.idproduk,a.nmproduk, a.harga, a.gambar ,SUM(b.qty) as totallaku
					FROM mst_produk a INNER JOIN tst_penjualan b ON b.idproduk=a.idproduk GROUP BY a.nmproduk ORDER BY sum(b.qty) DESC LIMIT 6 ");
					if(isset($_GET['cari'])){
						$qlistcon= mysqli_query($koneksidb, "SELECT a.nmproduk, a.harga, a.gambar 
						FROM mst_produk a INNER JOIN tst_penjualan b ON b.idproduk=a.idproduk WHERE a.nmproduk like '%".$_GET['cari']."%'");
					}
                    foreach($qlistcon as $lp) :
                ?>
					<div class="col-md-4 pb-4">
						<div class="card">
							<img src="assets/img/<?= $lp['gambar'];?>" class="card-img-top" alt="..." />
							<div class="card-body text-center bgcardbody">
								<h5 class="card-title"><?= $lp['nmproduk'];?></h5>
								<h6 class="harga"><?= rupiah($lp['harga']); ?></h6>

							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item btndetail">
									<a href="?page=detailproduk&id=<?= $lp['idproduk'];?>" target="_blank"
										class="btn text-white">Detail</a>
								</li>
							</ul>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>