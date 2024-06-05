<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM foto where FotoID=$id");

if($query > 0 ) {
    echo '<script>alert("Hapus data berhasil"); location.href="?page=galeri";</script>';
}else{

    echo '<script>alert("Hapus data gagal");</script>';
}
