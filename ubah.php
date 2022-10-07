<?php

//cek session
session_start();

require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data pemain berdasarkan id
$p = query("SELECT * FROM pemain WHERE id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	//cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
		<script>alert('data berhasil diubah');
		document.location.href = 'index.php';
		</script>";
	} else {
		echo "
		<script>alert('data gagal diubah');
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
	<title>Ubah Data</title>
</head>

<body>
	<h1>Ubah Data pemain</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><input type="hidden" name="id" value="<?= $p["id"]; ?>" required="required"></td>
			</tr>

			<tr>
				<td>
					Nama
				</td>
				<td>: <input type="text" name="nama" value="<?= $p["nama"]; ?>" required="required"></td>
			</tr>

			<tr>
				<td>
					Umur
				</td>
				<td>: <input type="text" name="umur" value="<?= $p["umur"] ?>" required="required"></td>
			</tr>

			<tr>
				<td>Tinggi Badan</td>
				<td>: <input type="text" name="tinggibadan" value="<?= $p["tinggibadan"]; ?>" required="required"></td>
			</tr>

			<tr>
				<td>Berat Badan</td>
				<td>: <input type="text" name="beratbadan" value="<?= $p["beratbadan"]; ?>" required="required"></td>
			</tr>

			<tr>
				<td><button type="submit" name="submit">Ubah</button></td>
			</tr>
		</table>
	</form>

</body>

</html>