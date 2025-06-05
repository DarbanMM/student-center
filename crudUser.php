<?php
    session_start(); // WAJIB: Mulai session di baris paling atas untuk menangani notifikasi
    include "koneksi.php"; // Menggunakan include dari kode lama Anda
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>CRUD User</title>
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <link href="assets/img/logoSCShort.png" rel="icon"> <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet"> </head>
    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark sidebar-sticky">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="crud.php" class="nav-link align-middle px-0">
                                <i class="bi bi-house fs-4"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="crudUser.php" class="nav-link px-0 align-middle">
                                <i class="bi bi-people fs-4"></i> <span class="ms-1 d-none d-sm-inline">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="crudReservasi.php" class="nav-link px-0 align-middle">
                                <i class="bi bi-calendar-check fs-4"></i> <span class="ms-1 d-none d-sm-inline">Reservasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logoutAdmin.php" class="nav-link px-0 align-middle"> 
                                <i class="bi bi-box-arrow-right fs-4"></i> <span class="ms-1 d-none d-sm-inline">LogOut</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
                <div class="col py-3">
                    <?php
                        if (isset($_SESSION['csv_import_message'])) {
                            $message_type = isset($_SESSION['csv_import_message_type']) && $_SESSION['csv_import_message_type'] == 'error' ? 'alert-danger' : 
                                            (isset($_SESSION['csv_import_message_type']) && $_SESSION['csv_import_message_type'] == 'warning' ? 'alert-warning' : 'alert-success');
                            echo '<div class="alert ' . $message_type . ' alert-dismissible fade show" role="alert">' .
                                 htmlspecialchars($_SESSION['csv_import_message']) .
                                 '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
                                 '</div>';
                            unset($_SESSION['csv_import_message']);
                            unset($_SESSION['csv_import_message_type']);
                        }
                    ?>

                    <div class="mb-4 p-3 border rounded">
                        <h5 class="mb-3">Impor Pengguna dari CSV</h5>
                        <form action="importCsvUser.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-5">
                                    <label for="csv_file" class="visually-hidden">Pilih file CSV</label>
                                    <input class="form-control form-control-sm" type="file" id="csv_file" name="csv_file" accept=".csv" required>
                                </div>
                                <div class="col-md-auto">
                                    <button type="submit" name="import_csv" class="btn btn-success btn-sm">Impor CSV</button>
                                </div>
                            </div>
                            <div class="form-text mt-2">Format CSV: username,password,nama,level (Baris pertama akan dianggap sebagai header dan dilewati)</div>
                        </form>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Daftar Pengguna</h3>
                        <div>
                            <a href="CetakUser.php" class="btn btn-secondary btn-sm me-2">Cetak</a>
                            <a href="tambahForm.php" class="btn btn-primary btn-sm">Tambah Pengguna Manual</a>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th> <th>Username</th>
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // include "koneksi.php"; // Sudah di-include di atas

                                $sql = "SELECT * FROM login";
                                $result = $conn->query($sql);

                                if (!$result) {
                                    die("Invalid query: " . $conn->error);
                                }

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>" . $row["id"] . "</td>
                                            <td>" . htmlspecialchars($row["username"]) . "</td>
                                            <td>********</td> <td>" . htmlspecialchars($row["nama"]) . "</td>
                                            <td>" . htmlspecialchars($row["level"]) . "</td>
                                            <td style='width: 80px;'><a href='editForm.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning w-100'><i class='bi bi-pencil'></i> Edit</a></td>
                                            <td style='width: 80px;'><a href='hapusUser.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger w-100' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pengguna ini: " . htmlspecialchars($row["username"]) . "?\")'><i class='bi bi-trash'></i> Hapus</a></td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>Tidak ada data pengguna.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>

        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <script src="assets/js/main.js"></script>
    </body>
</html>