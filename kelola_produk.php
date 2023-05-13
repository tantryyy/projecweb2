<!DOCTYPE html>
<html>
<head>
	<title>Kelola Produk</title>
</head>
<body>
	<h1>Kelola Produk</h1>

	<?php
		// Koneksi ke database
		$conn = mysqli_connect("localhost", "username", "password", "nama_database");

		// Query untuk mengambil semua data produk
		$sql = "SELECT * FROM produk";
		$result = mysqli_query($conn, $sql);

		// Cek apakah ada data produk
		if (mysqli_num_rows($result) > 0) {
			// Tampilkan tabel produk
			echo "<table>";
			echo "<tr><th>ID Produk</th><th>Nama Produk</th><th>Harga</th><th>Deskripsi</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["id_produk"]."</td><td>".$row["nama_produk"]."</td><td>".$row["harga"]."</td><td>".$row["deskripsi"]."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "Tidak ada data produk.";
		}

		// Tutup koneksi ke database
		mysqli_close($conn);
	?>

	<br>

	<form method="POST" action="tambah_produk.php">
		<h2>Tambah Produk</h2>
		<label>Nama Produk:</label><br>
		<input type="text" name="nama_produk"><br>
		<label>Harga:</label><br>
		<input type="number" name="harga"><br>
		<label>Deskripsi:</label><br>
		<textarea name="deskripsi"></textarea><br>
		<input type="submit" value="Tambah">
	</form>
</body>
</html>

