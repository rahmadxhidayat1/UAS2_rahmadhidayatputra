<?php
session_start();
require_once("../config/koneksidb.php");
require_once("../config/config.php");
security_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin </title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/temp.css">
	<!-- link bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- link icon bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<script src="https://cdn.tiny.cloud/1/ctai2l7ettpdz3uyphr0lz4x23v2z3otpascq7sk3miw64e3/tinymce/6/tinymce.min.js"
		referrerpolicy="origin"></script>
	<script>
	tinymce.init({
		selector: 'textarea#deskripsi',
		plugins: [
			'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
			'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
			'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
			'wordcount'
		],
		toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
			'alignleft aligncenter alignright alignjustify | ' +
			'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
	});
	</script>
	<style>
	body {
		padding-top: 60px;
	}
	</style>
</head>

<body>
	<!-- <nav class="navbar fixed-top bgnav navbar-light ">
		<div class="container-fluid">
			<a class="navbar-brand text-white">Navbar</a>
			<form class="d-flex">
				<input class="form-control me-2" type="text" readonly value="<?= $_SESSION['nama_admin']; ?>">
				<a href="logout.php" class="btn btn-warning text-white"> Logout</a>
			</form>
		</div>
	</nav> -->
<!-- sidenav

CONTENT -->
	<section class="mt-4">
		<div class="row">
			<div class="col-md-3">
				<!-- <div class="container"> -->
					<!-- <div class="list-group"> -->
					<div class="list-group sidebar">
						<div class="logo_content">
        					<div class="logo">
								<i class="bi bi-bank"></i>
								<div class="logo_name" ?><?php echo $_SESSION['nama_admin'];?></div>
							</div>
							<i class="bi bi-menu-button-wide" id="btn"></i>
						</div>
						<ul class="container">
						<?php
						include_once("menu.php");
						?>
						<!-- </a> -->
						<li><a href="logout.php"><i class="bi bi-exclamation-triangle-fill"></i><span class="links_name">Logout</span></a></li>
						</ul>
					</div>
					<!-- </div> -->
				<!-- </div> -->
			</div>
			<div class="col-lg-8">
				<div class="container">
					<br>
					<?php
					if (isset($_GET['modul'])) {
						include_once $_GET['modul'] . "/index.php";
					}
					else{
						include_once "welcome.php";
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<!-- Letakkan script JS disini -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/userlogin.js"></script>
	<script src="../assets/js/produk.js"></script>
	<script src="../assets/js/putra.js"></script>
    <!-- js sidebar -->
    <script>
		let btn = document.querySelector("#btn");
		let sidebar = document.querySelector(".sidebar");
		btn.onclick = function(){
			sidebar.classList.toggle("active");
		}
		btn.onclick = function(){
			sidebar.classList.toggle("active");
		}
	</script>
</body>

</html>