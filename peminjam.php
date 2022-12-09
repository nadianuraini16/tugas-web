<?php
session_start();
if( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
  <body>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>peminjaman komik</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
    <!--navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #02c6c6;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="komik.php">komik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="peminjam.php">peminjam</a>
            </li>
            
         
        </div>
      </div>
    </nav>
   <h1 align=  "center">Daftar peminjaman komik</h1>
  
   <?php
          include "koneksikomik1.php";
          ?>
          <form action="" method="get">
            <input type="text" name="cari"placeholder="cari" style="margin-left: 90px; ">
            <input type="submit" value="cari"  >
</form>
            <?php
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
}
?>
   
   <!--awal table-->
   <table border="1" cellpadding="7" cellspacling="10" align=center>
    <tr bgcolor="02c6c6">
        <th>no.</th>
        <th>id_peminjam</th>
        <th>id_komik</th>   
        <th>nama_peminjam</th>
        <th>no_tlpn</th>
        <th>tanggal_pinjam</th>
        <th>tanggal_pengembalian</th>
        <th>jumlah_komik</th>
        <th colspan="2">aksi</th>
        
  </tr>
  <?php 
    
    if(isset($_GET['cari'])){
      $ambildata = mysqli_query($koneksikomik1,"select * from peminjam where 
       id_peminjam like '%".$cari."%' or
       id_komik like '%".$cari."%' or
        nama_peminjam like '%".$cari."%' or
        no_tlpn like '%".$cari."%' or
        tanggal_pinjam like '%".$cari."%' or
        tanggal_pengembalian like '%".$cari."%' or
        jumlah_komik like '%".$cari."%' ");
    }
    else{
      $ambildata = mysqli_query($koneksikomik1,"select * from peminjam");
     }
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
      <td><a href='?kode=$tampil[id_peminjam]'>hapus</a></td>
      <td><a href='peminjamubah.php?kode=<?=$tampil['id_peminjam']?>'>ubah</a></td>
      </tr>
      <?php } ?>
</table>

<?php
if(isset($_GET['kode'])){

 mysqli_query($koneksikomik1,"delete from peminjam where id_peminjam='$_GET[kode]'");
 echo "data telah terhapus";
 echo"<meta http-equev=refresh content=2;URL=peminjam.php'>"; 
}
?>
<center>
<a class="btn btn-outline-primary" href="tambahdatapeminjam.php" role="button"style="margin-left: 90px; ">Tambah data</a>
<a class="btn btn-outline-primary" target="_blank" href="export_excel_peminjam.php">export to excel</a>
</center>
</body>
</html>