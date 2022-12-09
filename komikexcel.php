<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data komik.xls");
?>
<h3>DATA KOMIK</h3>
<table border="1" cellpadding="10" cellspacling="0" align=center>

    <tr bgcolor="02c6c6">
        <th>No.</th>
        <th>id_komik</th>
        <th>judul_komik</th>
        <th>penulis_komik</th>
        <th>stok_komik</th>
        <th colspan="2">aksi</th>
    </tr>