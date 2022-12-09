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
    
    <h1 align=  "center">Daftar komik</h1>
   
            <?php
          include "koneksikomik1.php";
          ?>
          <form action="" method="get">
            <input type="text" name="cari"placeholder="cari" style="margin-left: 150px; ">
            <input type="submit" value="cari"class="btn btn-outline-primary"  >
</form>
<?php
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
}
?>
   
  
   <!--tabel-->
   
   <table border="1" cellpadding="10" cellspacling="" align=center>

    <tr bgcolor="02c6c6">
        <th>No.</th>
        <th>id_komik</th>
        <th>judul_komik</th>
        <th>penulis_komik</th>
        <th>stok_komik</th>
        <th colspan="2" >aksi</th>
    </tr>
    
    <?php 
    
    if(isset($_GET['cari'])){
      $ambildata = mysqli_query($koneksikomik1,"select * from komik where 
      judul_komik like '%".$cari."%' or
       penulis_komik like '%".$cari."%' or
       stok_komik like '%".$cari."%' ");
    }
    else{
      $ambildata = mysqli_query($koneksikomik1,"select * from komik");
     }
     $no = 1;
     while($tampil = mysqli_fetch_array($ambildata)){
     ?>
     <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $tampil['id_komik'];?></td>
      <td><?php echo $tampil['judul_komik'];?></td>
      <td><?php echo $tampil['penulis_komik'];?></td>
      <td><?php echo $tampil['stok_komik'];?></td>
      <td><a href='?kode=$tampil[id_komik]'>hapus</a></td>
      <td><a href='komikubah.php?kode=<?= $tampil['id_komik']?>'> ubah </a></td>
      </tr>
   <?php }
    ?>

</table>

</body>
</html>
<?php
if(isset($_GET['kode'])){

 mysqli_query($koneksikomik1,"delete from komik where id_komik='$_GET[kode]'");
 echo "data telah terhapus";
 echo"<meta http-equev=refresh content=2;URL=komik.php'>"; 
}
?>
<center>
<a class="btn btn-outline-primary" href="tambahdatakomik1.php" role="button"style="margin-left: 150px;  " >Tambah data</a>

		<a class="btn btn-outline-primary" target="_blank" href="export_excel_komik.php">export to excel</a>
</center>
