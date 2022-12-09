<!DOCTYPE html>
<html>
<head>
	<title>Export Data </title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data komik.xls");
	?>
 
	<center>
		<h1>Export Data  </h1>
	</center>
 
	<table border="1" cellpadding="10" cellspacling="" align=center>

    <tr bgcolor="02c6c6">
        <th>No.</th>
        <th>id_komik</th>
        <th>judul_komik</th>
        <th>penulis_komik</th>
        <th>stok_komik</th>
        
    </tr>
    
		<?php 
		// koneksi database
		$koneksikomik1 = mysqli_connect("localhost","root","","peminjaman_komik");
 
		// menampilkan data pegawai
		$ambildata = mysqli_query($koneksikomik1,"select * from komik");
		$no = 1;
		while($tampil = mysqli_fetch_array($ambildata)){
		?>
		<tr>
        <td><?php echo $no++;?></td>
      <td><?php echo $tampil['id_komik'];?></td>
      <td><?php echo $tampil['judul_komik'];?></td>
      <td><?php echo $tampil['penulis_komik'];?></td>
      <td><?php echo $tampil['stok_komik'];?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>




