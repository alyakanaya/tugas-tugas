<?php
$id = $_GET['id'];
$UserID = $_SESSION['user']['UserID'];
$TanggalLike = date("Y/m/d");

$query = mysqli_query($koneksi, "INSERT INTO likefoto (FotoID,UserID,TanggalLike) values('$id','$UserID','$TanggalLike')");

if($query > 0 ) {
    echo '<script>alert("Like foto berhasil"); location.href="?page=galeri";</script>';
}else{

    echo '<script>alert("Like foto gagal");</script>';
}
