<?php
session_start();
include 'koneksi.php';

header('Content-Type: application/json');

// Pastikan admin sudah login
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'admin' || !isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'Akses ditolak. Anda harus login sebagai admin.']);
    exit();
}

// Ambil data yang dikirim dari AJAX
$admin_user_input = isset($_POST['admin_user']) ? $_POST['admin_user'] : '';
$admin_pass_input = isset($_POST['admin_pass']) ? $_POST['admin_pass'] : '';
$target_user = isset($_POST['target_user']) ? $_POST['target_user'] : '';

// Validasi input dasar
if (empty($admin_user_input) || empty($admin_pass_input) || empty($target_user)) {
    echo json_encode(['success' => false, 'message' => 'Semua field verifikasi harus diisi.']);
    exit();
}

// Periksa apakah username admin yang diinput sesuai dengan session yang aktif
if ($_SESSION['username'] !== $admin_user_input) {
    echo json_encode(['success' => false, 'message' => 'Verifikasi gagal: Username admin tidak sesuai dengan sesi yang aktif.']);
    exit();
}

// Verifikasi password admin yang diinput dengan database
$admin_user_sanitized = mysqli_real_escape_string($conn, $admin_user_input);
$query_admin = "SELECT password FROM login WHERE username = '$admin_user_sanitized'";
$result_admin = mysqli_query($conn, $query_admin);

if ($result_admin && mysqli_num_rows($result_admin) > 0) {
    $admin_data = mysqli_fetch_assoc($result_admin);
    // PERHATIAN: Ini mengasumsikan password di database adalah plain text.
    // Jika menggunakan hashing, gunakan password_verify()
    if ($admin_data['password'] === $admin_pass_input) {
        // Verifikasi BERHASIL, sekarang ambil password user target
        $target_user_sanitized = mysqli_real_escape_string($conn, $target_user);
        $query_target = "SELECT password FROM login WHERE username = '$target_user_sanitized'";
        $result_target = mysqli_query($conn, $query_target);

        if ($result_target && mysqli_num_rows($result_target) > 0) {
            $target_data = mysqli_fetch_assoc($result_target);
            echo json_encode(['success' => true, 'password' => $target_data['password']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'User target tidak ditemukan.']);
        }
    } else {
        // Password admin salah
        echo json_encode(['success' => false, 'message' => 'Verifikasi gagal: Password admin salah.']);
    }
} else {
    // Username admin tidak ditemukan di database (seharusnya tidak terjadi jika sudah login)
    echo json_encode(['success' => false, 'message' => 'Verifikasi gagal: Username admin tidak ditemukan.']);
}

exit();
?>