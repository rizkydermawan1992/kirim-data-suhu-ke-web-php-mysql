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
    <center>
       	<h3>DATA SENSOR SUHU & KELEMBABAN</h3>
       	<table border = "1" cellspacing="0" cellpadding="7">
       		<tr style="text-align: center">
       			<th>No</th>
       			<th>Waktu</th>
       			<th>Suhu</th>
       			<th>Kelembaban</th>
       		</tr>
         <?php 
            $no = 1;
            //Menampilkan data dari tabel_sensor
       	  foreach ($data as $key) {
          ?>
      	 		<tr style="text-align: center">
      	 		   <td><?php echo $no; ?></td>
      	 		   <td><?php echo $key["waktu"]; ?></td>
      	 		   <td><?php echo $key["suhu"]; ?> &deg;C</td>
      	 		   <td><?php echo $key["kelembaban"]; ?>%</td>
      	 		</tr>
       	<?php 
             $no++;
           }
          ?>
       	</table>
    </center>
 </body>
 </html>