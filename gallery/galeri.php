
<div class="container-fluid">
                        <h1 class="mt-4">Galeri Foto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Galeri Foto</li>
                        </ol>
                        <a href="?page=galeri_tambah" class="btn btn-primary">+ Tambah Galeri</a>
                        <br></br>
                        <table class="table table-bordered">
                            <tr>
                                <th>Lokasi file</th>
                                <th>Judul foto</th>
                                <th>Album</th>
                                <th>Deskripsi foto</th>
                                <th>Tanggal unggah</th>
                                <th>Total Like</th>
                                <th>Aksi</th>
                            </tr>
                            <?php

                            $query = mysqli_query($koneksi, " SELECT foto.*, album.NamaAlbum FROM foto left join album on album.AlbumID = foto.AlbumID");
                            while($data = mysqli_fetch_array($query)) {
                                ?>
                            <tr>
                                <td>
                                    <a href="LokasiFile/<?php echo $data ['LokasiFile']; ?>" target="_blank">
                                    <img src="LokasiFile/<?php echo $data ['LokasiFile']; ?>" width="200" alt="LokasiFile">
                                    </a>
                                </td>
                                <td><?php echo $data['JudulFoto']; ?></td>
                                <td><?php echo $data['NamaAlbum']; ?></td>
                                <td><?php echo $data['DeskripsiFoto']; ?></td>
                                <td><?php echo $data['TanggalUnggah']; ?></td>
                                <td><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM likefoto WHERE FotoID=" . $data['FotoID'])); ?></td>
                                <td>
                                    <?php
                                    if(mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM likefoto WHERE FotoID=" . $data['FotoID'] . " AND UserID=" . $_SESSION['user']['UserID'])) < 1){
                                    ?>
                                    <a href="?page=galeri_like&&id=<?php echo $data['FotoID']; ?>" class="btn btn-warning">Like</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="?page=galeri_komentar&&id=<?php echo $data['FotoID']; ?>" class="btn btn-warning">Komentar</a>
                                    <a href="?page=galeri_ubah&&id=<?php echo $data['FotoID']; ?>" class="btn btn-primary">Ubah</a>
                                    <a href="?page=galeri_hapus&&id=<?php echo $data['FotoID']; ?>" class="btn btn-danger">Hapus</a>
                                    
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                        </table>

                    </div>