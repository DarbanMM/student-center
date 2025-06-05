<?php
session_start();
include 'koneksi.php'; // Pastikan file koneksi.php Anda benar

if (isset($_POST['import_csv'])) {
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['csv_file']['tmp_name'];
        $file_name = $_FILES['csv_file']['name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($file_extension == 'csv') {
            if (($handle = fopen($file_tmp_path, "r")) !== FALSE) {
                $imported_count = 0;
                $error_count = 0;
                $error_details = [];
                $row_number = 0; // Inisialisasi nomor baris

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $row_number++; // Naikkan nomor baris untuk setiap baris yang dibaca

                    // Lewati baris pertama (header)
                    if ($row_number == 1) {
                        continue; // Lanjut ke iterasi berikutnya (baris data)
                    }

                    // Asumsi format CSV setelah header: username, password, nama, level
                    if (count($data) == 4) {
                        $username = mysqli_real_escape_string($conn, $data[0]);
                        $password = mysqli_real_escape_string($conn, $data[1]); // PERHATIAN: Idealnya password di-hash
                        $nama = mysqli_real_escape_string($conn, $data[2]);
                        $level = mysqli_real_escape_string($conn, $data[3]);

                        if (!empty($username) && !empty($password) && !empty($nama) && !empty($level)) {
                            $sql = "INSERT INTO login(username, password, nama, level) VALUES('$username', '$password', '$nama', '$level')";
                            if (mysqli_query($conn, $sql)) {
                                $imported_count++;
                            } else {
                                $error_count++;
                                $error_details[] = "Baris $row_number (data): Gagal insert - " . mysqli_error($conn);
                            }
                        } else {
                            $error_count++;
                            $error_details[] = "Baris $row_number (data): Data tidak lengkap.";
                        }
                    } else {
                        $error_count++;
                        $error_details[] = "Baris $row_number (data): Jumlah kolom tidak sesuai (harap 4 kolom).";
                    }
                }
                fclose($handle);

                // Logika untuk pesan feedback (sama seperti sebelumnya)
                if ($imported_count > 0 && $error_count == 0) {
                    $_SESSION['csv_import_message'] = "$imported_count pengguna berhasil diimpor.";
                    $_SESSION['csv_import_message_type'] = 'success';
                } elseif ($imported_count > 0 && $error_count > 0) {
                    $_SESSION['csv_import_message'] = "$imported_count pengguna berhasil diimpor, namun $error_count baris data gagal. Detail: " . implode("; ", $error_details);
                    $_SESSION['csv_import_message_type'] = 'warning';
                } elseif ($error_count > 0) {
                    $_SESSION['csv_import_message'] = "Gagal mengimpor pengguna. $error_count baris data bermasalah. Detail: " . implode("; ", $error_details);
                    $_SESSION['csv_import_message_type'] = 'error';
                } elseif ($imported_count == 0 && $row_number <=1 ) { // Jika hanya ada header atau file kosong
                     $_SESSION['csv_import_message'] = "Tidak ada data pengguna yang ditemukan di file CSV (setelah melewati header).";
                     $_SESSION['csv_import_message_type'] = 'info';
                } else {
                     $_SESSION['csv_import_message'] = "Tidak ada data pengguna yang berhasil diimpor.";
                     $_SESSION['csv_import_message_type'] = 'info';
                }

            } else {
                $_SESSION['csv_import_message'] = "Gagal membuka file CSV.";
                $_SESSION['csv_import_message_type'] = 'error';
            }
        } else {
            $_SESSION['csv_import_message'] = "Format file tidak valid. Harap unggah file .csv";
            $_SESSION['csv_import_message_type'] = 'error';
        }
    } else {
        $_SESSION['csv_import_message'] = "Terjadi kesalahan saat mengunggah file atau tidak ada file yang diunggah. Error code: " . (isset($_FILES['csv_file']['error']) ? $_FILES['csv_file']['error'] : 'N/A');
        $_SESSION['csv_import_message_type'] = 'error';
    }
} else {
    $_SESSION['csv_import_message'] = "Aksi tidak valid.";
    $_SESSION['csv_import_message_type'] = 'error';
}

header("Location: crudUser.php");
exit();
?>