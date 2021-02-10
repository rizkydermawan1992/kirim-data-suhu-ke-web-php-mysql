<?php 

require "koneksidb.php";

//Menangkap data dari mikrokontroller
$suhu = $_GET["suhu"];
$kelembaban = $_GET["kelembaban"];

//Insert data ke dalam tabel_sensor
$query = "INSERT INTO tabel_sensor(suhu, kelembaban) VALUES ('$suhu', '$kelembaban')";
mysqli_query($koneksi, $query);


 ?>