# HTTP-Payload
Project Pemantauan Intensitas Cahaya berbasis Intenet of Things

Langkah persiapan :
1. pindahkan folder "digitalent" ke folder C://xampp/htdocs
2. Aktifkan Apache dan MySQL pada XAMPP
3. Buka phpmyadmin melalui browser
4. Pilih menu import, lalu klik tombol choose file
5. pilih file "intensity.sql" yang berada di dalam folder "database", lalu klik go
6. buka file "add.php" dan "show.php", lalu ubah username dan passwordnya sesuai dengan user di phpmyadmin
7. buka file "http-payload.ino", lalu ubah SSID,Password,dan IP Address pada variabel "Link". Kemudian upload ke ESP32

Langkah penggunaan :
1. Buka serial monitor, pastikan "data berhasil dikirim"
2. Buka browser, lalu akses "http://<ip_address>/digitalent/show.php"
3. Nilai intensitas cahaya dan kondisi ruangan akan update secara otomatis
