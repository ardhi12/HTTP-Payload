<?php
//konfigurasi koneksi ke mysql
$servername = "localhost";
$username = "user_iot";   // ganti dengan username dan password sesuai dengan user pada phpmyadmin
$password = "ardhi12";
$dbname = "iot_intensity";

//memulai koneksi
$conn = new mysqli($servername, $username,$password, $dbname); 

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (isset($_GET['inten'])) {  						// jika terdapat parameter "inten"
	$val = $_GET['inten'];							// tampung nilai inten ke dalam variabel $val
	$sql = "UPDATE intensity SET inten='$val';"; 	// Query mysql (mengupdate data field inten)
	if ($conn->query($sql) === TRUE) {				// jika query berhasil dieksekusi
	    echo "success";
	} else {
	    echo "error";
	}
}


$conn->close(); //tutup koneksi
?>