<?php
$qry_menu = mysqli_query($koneksidb, "SELECT * FROM mst_menu");
//foreach ($qry_menu as $l) :
while ($row = mysqli_fetch_array($qry_menu)) {
?>
<li>
	<a href="?modul=<?= $row['link']; ?>" class="links1">
	<?= $row['icon']; ?></i><span class="links_name"><?= $row["nmmenu"]; ?></span>
	</a>
</li>
<?php
}
//endforeach;
?>