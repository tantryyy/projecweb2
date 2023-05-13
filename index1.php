<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan Produk</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Pemesanan Produk</h1>
	</header>

	<main>
		<section id="form-pemesanan">
			<h2>Form Pemesanan</h2>
			<form method="post">
				<label for="nama">Nama</label>
				<input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
				
				<label for="alamat">Alamat</label>
				<textarea id="alamat" name="alamat" required><?php echo $alamat; ?></textarea>
				
				<label for="produk">Produk</label>
				<select id="produk" name="produk" required>
					<option value="">Pilih produk</option>
					<option value="A" <?php if($produk == "A") echo "selected"; ?>>Produk A</option>
					<option value="B" <?php if($produk == "B") echo "selected"; ?>>Produk B</option>
					<option value="C" <?php if($produk == "C") echo "selected"; ?>>Produk C</option>
				</select>
				
				<label for="jumlah">Jumlah</label>
				<input type="number" id="
                <?php
    // inisialisasi variabel input
    $nama = "";
    $alamat = "";
    $produk = "";
    $jumlah = "";
    
    if(isset($_POST['submit'])){
        // simpan data dari input ke variabel
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $produk = $_POST['produk'];
        $jumlah = $_POST['jumlah'];
        
        // validasi input
        $error = "";
        if(empty($nama)){
            $error .= "Nama tidak boleh kosong. ";
        }
        if(empty($alamat)){
            $error .= "Alamat tidak boleh kosong. ";
        }
        if(empty($produk)){
            $error .= "Produk harus dipilih. ";
        }
        if(empty($jumlah) || $jumlah < 1){
            $error .= "Jumlah harus diisi dengan angka lebih dari 0. ";
        }
        
        // jika tidak ada error, tambahkan data ke database
        if(empty($error)){
            // koneksi ke database
            $conn = mysqli_connect("localhost", "username", "password", "database_name");
            if(!$conn){
                die("Koneksi gagal: " . mysqli_connect_error());
            }
            
            // query untuk menambahkan data pemesanan
            $query = "INSERT INTO pemesanan (nama, alamat, produk, jumlah) VALUES ('$nama', '$alamat', '$produk', $jumlah)";
            
            if(mysqli_query($conn, $query)){
                // tampilkan pesan sukses
                echo "<script>alert('Pemesanan berhasil ditambahkan.')</script>";
                
                // reset input
                $nama = "";
                $alamat = "";
                $produk = "";
                $jumlah = "";
            } else {
                // tampilkan pesan error
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            
            // tutup koneksi ke database
            mysqli_close($conn);
        }
    }
?>
