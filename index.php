<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.css">
</head>

<body style="background-color:#FFE4E1">
    <?php
    include_once("navbar.php");
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-10 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>Order Tracker</b>
                        <a href="form_tambah.php" class="float-end btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i>Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include("koneksi.php");

                                #2. menulikan query menampilkan data
                                $qry = "SELECT * FROM pesanan";
                                #3. menjalankan query
                                $tampil = mysqli_query($koneksi, $qry);

                                #4. looping hasil query
                                $nomor = 1;
                                foreach ($tampil as $data) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $data['nama_pelanggan'] ?></td>
                                        <td><?= $data['produk'] ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                </svg></button>
                                            <a href="formedit.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg></a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $data['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg></button>

                                            <!-- Modal Detail-->
                                            <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Detail <?= $data['nama_pelanggan'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Nama Pelanggan :</td>
                                                                        <th scope="row"><?= $data['nama_pelanggan'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Produk :</td>
                                                                        <th scope="row"><?= $data['produk'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jumlah :</td>
                                                                        <th scope="row"><?= $data['jumlah'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Pesanan</td>
                                                                        <th scope="row"><?= $data['tanggal_pesan'] ?></th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus-->
                                            <div class="modal fade" id="modalhapus<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin Data Dengan Nama <?= $data['nama_pelanggan'] ?> Ingin Dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="proseshapus.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="../js/all.js"></script>
</body>

</html>