<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","peminjaman_komik");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows =[];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[]= $row;
    }
    return $rows;
}
//"$2y$10$5C9SR8K1BpKn/5u3lMVvJOssrQ2J6D3CLaMiQYjVsOB1TMzBnl0ZG"
?>