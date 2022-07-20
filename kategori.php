<div class="container pb-5">
				<div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8 pt-2">
			<div class="row">
                <!-- judul kategori -->
                <?php
				function fnumber($fharga){
					$harga = number_format($fharga,0,',','.');
					return $harga;	
				}			
                    // $idkey = $_GET['id'];
                ?>
                <h1 class="text text-center pb-3 pt-3 border border">OUR PRODUCT</h1>
                <hr>
                <!-- tampil produk -->
                <?php
                    // $idkey = $_GET['id'];
                    // pencarian
                    $qlist_produk = mysqli_query($koneksidb, "SELECT mp.nmcontainer, mp.harga, mp.picture, kp.merk, mp.idmerk
                        FROM mst_container mp INNER JOIN mst_categorycontainer kp ON kp.idmerk=mp.idmerk 
                        ORDER BY mp.idcontainer DESC LIMIT 10;");
						foreach($qlist_produk as $lp) : 
                ?>
				<div class="col-md-4 pb-4">
					<div class="card">
						<img src="assets/img/<?= $lp['picture'];?>" class="card-img-top" alt="..." />
						<div class="card-body text-center bgcardbody">
							<h5 class="card-title"><?= $lp['nmcontainer'];?></h5>
							<h6 class="harga"><?= "Rp ".fnumber($lp['harga']);?></h6>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item btndetail">
								<a href="?page=order" class="text-white">Order</a>
							</li>
						</ul>
					</div>
				</div>
                <?php 
                    endforeach;
                ?>
			</div>
		</div>
        <div class="col-md-2"></div>
	</div>
</div>