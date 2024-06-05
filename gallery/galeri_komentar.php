<?php
$id = $_GET['id'];


$query = mysqli_query($koneksi, "SELECT*FROM foto WHERE FotoID=$id");
$data = mysqli_fetch_array($query);

?>


<div class="container-fluid px-4">
                        <h1 class="mt-4">Galeri Foto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Galeri Foto</li>
                        </ol>
                        <a href="?page=galeri" class="btn btn-danger">Kembali</a>
                        <form method="post" enctype="multipart/form-data">
                            <table class="table">
                                <tr>
                                    <td width="200">Judul</td>
                                    <td width="1">:</td>
                                    <td><?php echo $data['JudulFoto']; ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><?php echo $data['DeskripsiFoto']; ?></td>
                                </tr>
                                <tr>
                                    <td>Album</td>
                                    <td>:</td>
                                    <td>
                                        <select name="AlbumID" disabled class="form-select form-control">
                                            <?php
                                                $al = mysqli_query($koneksi, "SELECT*FROM album");
                                                while($album = mysqli_fetch_array($al)){
                                                    ?>
                                                    <option
                                                    
                                                    <?php
                                                        if($data['AlbumID'] == $album['AlbumID']) echo 'selected';
                                                    ?>
                                                    
                                                    value="<?php echo $album['AlbumID']; ?>"><?php echo $album['NamaAlbum']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Unggah</td>
                                    <td>:</td>
                                    <td><?php echo $data['TanggalUnggah']; ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi File</td>
                                    <td>:</td>
                                    <td>
                                        <a href="LokasiFile/<?php echo $data ['LokasiFile']; ?>" target="_blank">
                                            <img src="LokasiFile/<?php echo $data ['LokasiFile']; ?>" width="200" alt="LokasiFile">
                                        </a>
                                        
                                </td>
                                </tr>
                            </table>

                        </form>

                        <h1 class="mt-4">Komentar Foto</h1>
                        <?php
                        

                    
                    if(isset($_POST['komentarfoto'])) {
                        $komentarfoto   = $_POST['komentarfoto'];
                        $TanggalUnggah  = date("Y/m/d");
                        $UserID         = $_SESSION['user']['UserID'];

                        $query = mysqli_query($koneksi, "INSERT INTO komentarfoto(FotoID,UserID,IsiKomentar,TanggalKomentar) values('$id','$UserID','$komentarfoto','$TanggalUnggah')");

                        if($query > 0 ) {
                            echo '<script>alert("Tambah komentar berhasil");</script>';
                        }else{

                            echo '<script>alert("Tambah komentar gagal");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT*FROM komentarfoto left join user on user.UserID = komentarfoto.UserID where komentarfoto.FotoID=$id");
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-white"><?php echo $data['NamaLengkap'] . '('.$data['TanggalKomentar'].')'; ?></div>
                            <div class="card-body"><?php echo $data['IsiKomentar']; ?></div>
                        </div>
                        <?php
                    }
                    ?>

                    <form method="post">
                        <label>Masukan Komentar Baru</label>
                        <textarea name="komentarfoto" rows="5" class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form> 

                    </div>