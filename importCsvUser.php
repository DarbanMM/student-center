<?php
session_start();
include 'koneksi.php';

if (isset($_POST['import_csv'])) {
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['csv_file']['tmp_name'];
        $file_name = $_FILES['csv_file']['name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($file_extension == 'csv') {
            if (($handle = fopen($file_tmp_path, "r")) !== FALSE) {
                $imported_count = 0;
                $skipped_count = 0;
                $skipped_usernames = [];
                $error_count = 0;
                $error_details = [];
                $row_number = 0;

                // Lewati baris header
                fgetcsv($handle); 

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $row_number++;
                    
                    if (count($data) == 4) {
                        $username = mysqli_real_escape_string($conn, $data[0]);
                        $password = mysqli_real_escape_string($conn, $data[1]);
                        $nama = mysqli_real_escape_string($conn, $data[2]);
                        $level = mysqli_real_escape_string($conn, $data[3]);

                        if (!empty($username) && !empty($password) && !empty($nama) && !empty($level)) {
                            // Cek apakah username sudah ada
                            $check_sql = "SELECT username FROM login WHERE username = '$username'";
                            $check_result = mysqli_query($conn, $check_sql);

                            if (mysqli_num_rows($check_result) > 0) {
                                // Jika username sudah ada, lewati dan catat
                                $skipped_count++;
                                $skipped_usernames[] = $username;
                                continue; // Lanjut ke baris berikutnya
                            }

                            // Jika tidak duplikat, lakukan INSERT
                            $insert_sql = "INSERT INTO login(username, password, nama, level) VALUES('$username', '$password', '$nama', '$level')";
                            if (mysqli_query($conn, $insert_sql)) {
                                $imported_count++;
                            } else {
                                $error_count++;
                                $error_details[] = "Baris data ke-$row_number: Gagal insert - " . mysqli_error($conn);
                            }
                        } else {
                            $error_count++;
                            $error_details[] = "Baris data ke-$row_number: Data tidak lengkap.";
                        }
                    } else {
                        $error_count++;
                        $error_details[] = "Baris data ke-$row_number: Jumlah kolom tidak sesuai.";
                    }
                }
                fclose($handle);

                // Buat pesan notifikasi yang komprehensif
                $message = "$imported_count pengguna berhasil diimpor. ";
                if ($skipped_count > 0) {
                    $message .= "$skipped_count pengguna dilewati karena duplikat (username sudah ada): " . htmlspecialchars(implode(', ', $skipped_usernames)) . ". ";
                }
                if ($error_count > 0) {
                    $message .= "$error_count baris data lainnya gagal diproses.";
                }
                
                $_SESSION['csv_import_message'] = $message;
                $_SESSION['csv_import_message_type'] = ($error_count > 0 || $skipped_count > 0) ? 'warning' : 'success';

            } else {
                $_SESSION['csv_import_message'] = "Gagal membuka file CSV.";
                $_SESSION['csv_import_message_type'] = 'error';
            }
        } else {
            $_SESSION['csv_import_message'] = "Format file tidak valid. Harap unggah file .csv";
            $_SESSION['csv_import_message_type'] = 'error';
        }
    } else {
        $_SESSION['csv_import_message'] = "Terjadi kesalahan saat mengunggah file.";
        $_SESSION['csv_import_message_type'] = 'error';
    }
}

header("Location: crudUser.php");
exit();
?>