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
	header("Content-Disposition: attachment; filename=Data peminjam.xls");
	?>
 
	<center>
		<h1>Export Data  </h1>
	</center>
 
	<table border="1" cellpadding="10" cellspacling="" align=center>

    <tr bgcolor="02c6c6">
    <th>no.</th>
        <th>id_peminjam</th>
        <th>id_komik</th>   
        <th>nama_peminjam</th>
        <th>no_tlpn</th>
        <th>tanggal_pinjam</th>
        <th>tanggal_pengembalian</th>
        <th>jumlah_komik</th>
        
    </tr>
    
		<?php 
		// koneksi database
		$koneksikomik1 = mysqli_connect("localhost","root","","peminjaman_komik");
 
		// menampilkan data pegawai
		$ambildata = mysqli_query($koneksikomik1,"select * from peminjam");
		$no = 1;
		while($tampil = mysqli_fetch_array($ambildata)){
		?>
		<tr>
        <td><?php echo $no++;?></td>
      <td><?php echo $tampil['id_peminjam']?></td>
      <td><?php echo $tampil['id_komik']?></td>
      <td><?php echo $tampil['nama_peminjam']?></td>
      <td><?php echo $tampil['no_tlpn']?></td>
      <td><?php echo $tampil['tanggal_pinjam']?></td>
      <td><?php echo $tampil['tanggal_pengembalian']?></td>
      <td><?php echo $tampil['jumlah_komik']?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>




