<?php

//cek session
session_start();

require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


	//cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
		<script>alert('data berhasil ditambahkan');
		document.location.href = 'index.php';
		</script>";
	} else {
		echo "
		<script>alert('data gagal ditambahkan');
		document.location.href = 'index.php';
		</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data</title>
</head>

<body>
	<h1>Tambah Data Mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<table>

			<tr>
				<td>
					Nama
				</td>
				<td>: <input type="text" name="nama" required="required"></td>
			</tr>

			<tr>
				<td>
					umur
				</td>
				<td>: <input type="text" name="umur" required="required"></td>
			</tr>

			<tr>
				<td>Tinggi Badan</td>
				<td>: <input type="text" name="tinggibadan" required="required"></td>
			</tr>

			<tr>
				<td>Berat Badan</td>
				<td>: <input type="text" name="beratbadan" required="required"></td>
			</tr>

			<tr>
				<td><button type="submit" name="submit">Simpan</button></td>
			</tr>
		</table>
	</form>

</body>

</html>