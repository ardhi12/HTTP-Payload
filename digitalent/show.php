<?php
//konfigurasi koneksi ke mysql
$servername = "localhost";
$username = "user_iot";  // ganti dengan username dan password sesuai dengan user pada phpmyadmin
$password = "ardhi12";
$dbname = "iot_intensity";

//memulai koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM intensity";				// Query mysql (membaca tabel intensity)
$result = $conn->query($sql);					// hasil eksekusi query
if ($result->num_rows > 0) {    				// jika hasil eksekusi query > 0 (artinya : terdapat record yang dipilih)
    while($row = $result->fetch_assoc()) {		
    	$nilai_sensor = $row['inten'];			// ambil row/baris "inten" dari tabel intensity	

    	// algoritma kondisi ruangan
    	if ($nilai_sensor <= 500) {				
    		$kondisi = "gelap";
    	}elseif ($nilai_sensor > 500 && $nilai_sensor <=1000) {
    		$kondisi = "redup";
    	}else{
    		$kondisi = "terang";
    	}
?>

<!-- Membuat halaman web -->
<!DOCTYPE html>
<html>
<head>
	<title>Kendali LED</title>
	<meta http-equiv="refresh" content="3">    <!-- halaman web akan refresh otomatis setiap 3 detik -->
</head>
<body style="background: #00BFFF;">
	<center>
		<h1>Selamat Datang!</h1>
		<h2>Sistem Pemantauan Intensitas Cahaya</h>
		<h2>berbasis Internet of Things</h>
		<br>
		<br>
		<br>
		<br>
		<span>Intensitas Cahaya :</span>
		<br>
		<span style="font-size: 50px;"><b><?php echo $nilai_sensor ?><b></span>  <!-- tampilkan data intent -->
		<br>
		<br>
		<span>Kondisi Ruangan :</span>
		<br>
		<span style="font-size: 50px;"><b><?php echo $kondisi ?><b></span>       <!-- tampilkan kondisi ruangan -->
	</center>
</body>
</html> 
<?php 
    }	
} else {
    echo "0 result";   //jika tidak ada record, maka tampilkan "0 result" 
}
$conn->close();
?>



