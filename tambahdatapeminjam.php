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
    <style>
    .from{
      display:flex;
      justify-content: center;
    }
</style>
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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Link
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex"> 
          <button type="button" class="btn btn-outline-primary">login</button>
          <button type="button" class="btn btn-outline-primary">logout</button>
          </form>
        </div>
      </div>
    </nav>
<h1 style="text-align:center;"> Tambah data peminjam</h1>
<div class="from">
    <form action="" method="post">
        <table stayle ="display:block">
        <tr>
                <td width="130">Id peminjam</td>
                <td><input type="text" name="id_peminjam"></td>
</tr>
            <tr>
                <td>Id komik</td>
                <td><input type="text" name="id_komik"></td>
</tr>
<tr>
    <td> Nama peminjam</td>
    <td><input type="text" name="nama_peminjam"></td>
</tr>
    <tr>
        <td>No telepon</td>
        <td><input type="text" name="no_tlpn"></td>
</tr>
<tr>
        <td>Tanggal_pinjam</td>
        <td><input type="text" name="tanggal_pinjam"></td>
</tr>
<tr>
        <td>Tanggal_pengembalian</td>
        <td><input type="text" name="tanggal_pengembalian"></td>
</tr>
<tr>
        <td>Jumlah_komik</td>
        <td><input type="text" name="jumlah_komik"></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="save" name="proses"></td>
</tr>
        </table>

</form>
  </div>
<a href ="peminjam.php">kembali</a>
    <?php
include "koneksikomik1.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksikomik1,"insert into peminjam set
    id_peminjam='$_POST[id_peminjam]',
    id_komik ='$_POST[id_komik]',
    nama_peminjam ='$_POST[nama_peminjam]',
    no_tlpn ='$_POST[no_tlpn]',
    tanggal_pinjam ='$_POST[tanggal_pinjam]',
    tanggal_pengembalian='$_POST[tanggal_pengembalian]',
    jumlah_komik='$_POST[jumlah_komik]'");

    echo "data komik telah tersimpan";
}
?>
