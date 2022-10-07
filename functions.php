<?php
$conn = mysqli_connect("localhost", "root", "", "crud_php");


function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$umur = htmlspecialchars($data["umur"]);
	$tinggibadan = htmlspecialchars($data["tinggibadan"]);
	$beratbadan = htmlspecialchars($data["beratbadan"]);


	$query = "INSERT INTO pemain VALUES ('','$nama','$umur','$tinggibadan','$beratbadan')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


function ubah($data)
{
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$umur = htmlspecialchars($data["umur"]);
	$tinggibadan = htmlspecialchars($data["tinggibadan"]);
	$beratbadan = htmlspecialchars($data["beratbadan"]);

	//query insert data
	$query = "UPDATE pemain SET
				nama = '$nama',
				umur = '$umur',
				tinggibadan = '$tinggibadan',
				beratbadan = '$beratbadan'				
			WHERE id = $id					
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM pemain WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
	$query = "SELECT * FROM pemain WHERE 
		nama LIKE '%$keyword%' OR 
		umur LIKE '%$keyword%' OR
		tinggibadan LIKE '%$keyword%' OR
		beratbadan LIKE '%$keyword%'
		";
	return query($query);
}
