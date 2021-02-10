<?php 
 require "koneksidb.php";

 //Mengambil data dari tabel_sensor
 $query = "SELECT * FROM tabel_sensor";
 $data = mysqli_query($koneksi, $query);

 

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data Sensor</title>
 </head>
 <body>
 	<h3>DATA SENSOR SUHU & KELEMBABAN</h3>
 	<table border = 1>
 		<tr>
 			<td>No</td>
 			<td>Waktu</td>
 			<td>Suhu</td>
 			<td>Kelembaban</td>
 		</tr>
   <?php 
      $no = 1;
      //Menampilkan data dari tabel_sensor
 	  foreach ($data as $key) {
    ?>
	 		<tr>
	 		   <td><?php echo $no; ?></td>
	 		   <td><?php echo $key["waktu"]; ?></td>
	 		   <td><?php echo $key["suhu"]; ?></td>
	 		   <td><?php echo $key["kelembaban"]; ?></td>
	 		</tr>
 	<?php 
       $no++;
     }
    ?>
 	</table>
 </body>
 </html>