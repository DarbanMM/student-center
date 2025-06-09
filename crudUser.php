<?php
    session_start(); // WAJIB: Mulai session di baris paling atas untuk menangani notifikasi
    include "koneksi.php"; // Menggunakan include dari kode lama Anda

    // --- PENAMBAHAN LOGIKA PENCARIAN ---
    // Mengambil kata kunci pencarian dari URL (via GET)
    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

    // Membangun query SQL dasar
    $sql = "SELECT * FROM login";

    // Jika ada kata kunci pencarian, tambahkan kondisi WHERE
    if (!empty($search_query)) {
        // Amankan input pencarian untuk mencegah SQL Injection
        $sanitized_query = mysqli_real_escape_string($conn, $search_query);
        // Tambahkan klausa WHERE untuk mencari di beberapa kolom
        $sql .= " WHERE username LIKE '%$sanitized_query%' OR nama LIKE '%$sanitized_query%' OR level LIKE '%$sanitized_query%'";
    }

    $sql .= " ORDER BY nama ASC"; // Mengurutkan hasil berdasarkan nama

    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
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

        <style>
            .table-actions {
                width: 250px;
            }
        </style>
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
                                    <button type="submit" name="import_csv" class="btn btn-success btn-sm">Import CSV</button>
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

                    <div class="mb-3">
                        <form action="crudUser.php" method="GET" class="d-flex">
                            <input type="text" name="search_query" class="form-control me-2" placeholder="Cari Username, Nama, atau Level..." value="<?php echo htmlspecialchars($search_query); ?>">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
                            <?php if (!empty($search_query)): ?>
                                <a href="crudUser.php" class="btn btn-outline-secondary ms-2">Reset</a>
                            <?php endif; ?>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th class="table-actions">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["level"]) . "</td>";
                                            echo "<td>";
                                            echo "<button type='button' class='btn btn-info btn-sm me-1 view-password-btn' data-bs-toggle='modal' data-bs-target='#viewPasswordModal' data-username='" . htmlspecialchars($row['username']) . "'>Lihat Password</button>";
                                            echo "<a href='editForm.php?username=".urlencode($row['username'])."' class='btn btn-sm btn-warning me-1'><i class='bi bi-pencil'></i> Edit</a>";
                                            echo "<a href='hapusUser.php?username=".urlencode($row['username'])."' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin hapus pengguna " . htmlspecialchars($row["username"]) . "?\")'><i class='bi bi-trash'></i> Hapus</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center'>Tidak ada data pengguna yang cocok.</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="viewPasswordModal" tabindex="-1" aria-labelledby="viewPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewPasswordModalLabel">Verifikasi Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="verificationError" class="alert alert-danger" style="display: none;"></div>

                        <div id="passwordDisplay" style="display: none;">
                            <p>Password untuk user <strong id="targetUsernameDisplay"></strong> adalah:</p>
                            <h4 class="text-center bg-light p-2 rounded"><strong id="revealedPassword"></strong></h4>
                        </div>

                        <form id="verificationForm">
                            <p>Masukkan username & password Anda (admin yang sedang login) untuk melanjutkan.</p>
                            <input type="hidden" id="targetUsername" name="target_user">
                            <div class="mb-3">
                                <label for="adminUsername" class="form-label">Username Admin</label>
                                <input type="text" class="form-control" id="adminUsername" name="admin_user" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminPassword" class="form-label">Password Admin</label>
                                <input type="password" class="form-control" id="adminPassword" name="admin_pass" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="submitVerification">Verifikasi</button>
                    </div>
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const viewPasswordModal = document.getElementById('viewPasswordModal');
                const verificationForm = document.getElementById('verificationForm');
                const passwordDisplay = document.getElementById('passwordDisplay');
                const verificationError = document.getElementById('verificationError');

                // Event listener saat modal akan ditampilkan
                viewPasswordModal.addEventListener('show.bs.modal', function (event) {
                    // Reset modal ke kondisi awal setiap kali dibuka
                    verificationForm.style.display = 'block';
                    passwordDisplay.style.display = 'none';
                    verificationError.style.display = 'none';
                    verificationForm.reset();
                    
                    // Ambil username target dari tombol yang diklik
                    const button = event.relatedTarget;
                    const targetUsername = button.getAttribute('data-username');
                    
                    // Set username target ke hidden input di dalam form modal
                    const targetUsernameInput = document.getElementById('targetUsername');
                    targetUsernameInput.value = targetUsername;
                });

                // Event listener untuk tombol verifikasi di dalam modal
                document.getElementById('submitVerification').addEventListener('click', function () {
                    const formData = new FormData(verificationForm);
                    
                    fetch('verifyAndViewPassword.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Jika verifikasi sukses
                            document.getElementById('targetUsernameDisplay').textContent = formData.get('target_user');
                            document.getElementById('revealedPassword').textContent = data.password;
                            
                            // Sembunyikan form verifikasi dan tampilkan password
                            verificationForm.style.display = 'none';
                            passwordDisplay.style.display = 'block';
                            verificationError.style.display = 'none';
                        } else {
                            // Jika verifikasi gagal, tampilkan pesan error
                            verificationError.textContent = data.message;
                            verificationError.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        verificationError.textContent = 'Terjadi kesalahan pada koneksi.';
                        verificationError.style.display = 'block';
                    });
                });
            });
        </script>
    </body>
</html>