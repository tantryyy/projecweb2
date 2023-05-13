<?php
	// Koneksi ke database
	$conn = mysqli_connect("localhost", "username", "password", "nama_database");

	// Ambil data dari form
	$nama_produk = $_POST["nama_produk"];
	$harga = $_POST["harga"];
	$deskripsi = $_POST["deskripsi"];

	// Query untuk menambahkan produk baru
	$sql = "INSERT INTO produk (nama_produk, harga, deskripsi) VALUES ('$nama_produk', '$harga', '$deskripsi')";
	if (mysqli_query($conn, $sql)) {
		echo "Produk berhasil ditambahkan.";
	} else {
		echo "Error: ".$sql."<br>".mysqli_error($conn);
	}

	// Tutup koneksi ke database
	mysqli_close($conn);
?>




