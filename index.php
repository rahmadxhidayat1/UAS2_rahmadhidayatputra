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
    <link rel="stylesheet" type="text/css" href="assets/css/opening.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>
<body>
    <header>
        <video id="bg-video" autoplay muted loop>
            <source src="assets/video/opening.mp4" type="video/mp4">
        </video>
        <div class="pt-2 vid_info">
            <h1 class="heading">hi everyone</h1>
            <h2>WELCOME TO MY COMPANY</h2>
            <br>
            <div class="containers content">
                <div class="kolom">
                    <div class="atas">
                        <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
                    </div>
                    <div class="tengah">
                        <h2 class="resmi">CUSTOMER</h2>
                    </div>
                    <div class="bawah">
                        <p class="normal m-2 fs-4">For buy and rent container in TRI GUNA ABADI 
                        </p>
                    </div>
                </div>
                <div class="kolom">
                    <div class="atas">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><img src="assets/img/logo.png" alt=""></a>
                    </div>
                    <div class="tengah">
                        <h2 class="resmi">ADMIN</h2>
                    </div>
                    <div class="bawah">
                        <p class="normal m-2 fs-4">For setting and Controlling database in website
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form class="bg-light p-5" action="ceklogin.php" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-4">
							<label for="username" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="logusername" />
						</div>
						<div class="mb-4">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" class="form-control" id="logpassword" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnbatal" class="btn btn-secondary"
							data-bs-dismiss="modal">Batal</button>
						<button type="submit" name="btnlogin" id="btnkeluar" class="btn btn-primary">Login</button>
					</div>
					<div class="row mb-3">
						<div class="col-md-5 text-end">
							<a href="?page=lupapassword" class="btn btn-primary">Lupa Password?</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    <!-- JS -->
    
</body>
</html>