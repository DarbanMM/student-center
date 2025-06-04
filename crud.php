<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Center Admin | Editorial</title>
    <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
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
                            <a href="logout.php" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline">LogOut</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <!-- Content -->
            <div class="col py-3">
                <div class="container">
                    <div class="row">
                        <!-- Welcome Message -->
                        <div class="col">
                            <h2>Selamat Datang di Student Center Admin</h2>
                            <p>Anda dapat mengelola reservasi Co-Working Space dan informasi pengguna dengan mudah melalui menu di sebelah kiri.</p>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Cards -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="assets/img/SC.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
