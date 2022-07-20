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
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
		<div class="container pe-5 ps-5">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fontnav text-white">
				<li class="nav-item">
					<a href="index.php" class="nav-link">HOME</a>
				</li>
				<li class="nav-item">
					<a href="?page=kategori" class="nav-link">PRODUCT</a>
				</li>
				<!-- <li class="nav-item">
					<a href="customer.php" class="nav-link"><i class="bi bi-cart-plus"></i>ORDER</a>
				</li> -->
			</ul>
			<div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fontnav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?page=daftarmember"></a>
					</li>	
				</ul>
			</div>
		</div>
	</nav>
    <section id="header">
		<div class="container ps-0">
			<img src="assets/img/banner.jpg" class="banner" />
			<div class="container pb-5">
			<?php 
			if(isset($_GET['page'])){
				include_once("".$_GET['page'].".php");
			}
		 ?>
			</div>
		</div>
	</section>
	<script src="assets/js/order.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>