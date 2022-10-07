<?php
require 'functions.php';

//cek session
session_start();

$pemain = query("SELECT * FROM pemain ORDER BY id DESC");

//tombol cari diclick
if (isset($_POST["cari"])) {
	$pemain = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tampil data</title>
</head>

<body>
	<h1>Daftar pemain</h1>
	<a href="tambah.php">[+] Tambah Data</a><br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="40" placeholder="Masukan keyword pencarian!" autofocus autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form><br>

	<table width="100%" border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Umur</th>
				<th>Tinggi Badan</th>
				<th>Berat Badan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<?php $no = 1; ?>
		<?php foreach ($pemain as $p) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $p["nama"]; ?></td>
				<td><?= $p["umur"]; ?></td>
				<td><?= $p["tinggibadan"]; ?></td>
				<td><?= $p["beratbadan"]; ?></td>
				<td>
					<a href="ubah.php?id=<?= $p["id"]; ?>">Edit</a>
					|<a href="hapus.php?id=<?= $p["id"]; ?>" onclick="return confirm('yakin ingin hapus data <?= $p["nama"]; ?>');">Hapus</a>
				</td>
			</tr>

		<?php
			$no++;
		endforeach; ?>
	</table>

</body>

</html>