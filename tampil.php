<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Center | Laporan Reservasi</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Laporan Reservasi</h1>
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Asal</th>
                <th>Fakultas</th>
                <th>Keperluan</th>
                <th>Ruang</th>
                <th>Tanggal</th>
                <th>Waktu mulai</th>
                <th>Waktu selesai</th>
                <th>Aksi</th> <!-- Add this column for the print button -->
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';

            $sql = "SELECT * FROM reservasi";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['asal'] . "</td>";
                    echo "<td>" . $row['fakultas'] . "</td>";
                    echo "<td>" . $row['keperluan'] . "</td>";
                    echo "<td>" . $row['ruang'] . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "<td>" . $row['waktu'] . "</td>";
                    echo "<td>" . $row['waktu_selesai'] . "</td>";
                    echo "<td><button class='btn btn-primary' onclick='printSingle(\"" . $row['nama'] . "\", \"" . $row['asal'] . "\", \"" . $row['fakultas'] . "\", \"" . $row['keperluan'] . "\", \"" . $row['ruang'] . "\", \"" . $row['tanggal'] . "\", \"" . $row['waktu'] . "\", \"" . $row['waktu_selesai'] . "\")'>Print</button></td>"; // Updated to match the new column
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="halamanReservasi.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2">Kembali</i>
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="printContent">
                    <!-- Reservation details will be populated here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printReservation()">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        function printSingle(nama, asal, fakultas, keperluan, ruang, tanggal, waktu, waktu_selesai) {
            var content = `
                <p><strong>Nama:</strong> ${nama}</p>
                <p><strong>Asal:</strong> ${asal}</p>
                <p><strong>Fakultas:</strong> ${fakultas}</p>
                <p><strong>Keperluan:</strong> ${keperluan}</p>
                <p><strong>ruang:</strong> ${ruang}</p>
                <p><strong>Tanggal:</strong> ${tanggal}</p>
                <p><strong>Waktu Mulai:</strong> ${waktu}</p>
                <p><strong>Waktu Selesai:</strong> ${waktu_selesai}</p>
            `;
            $('#printContent').html(content);
            $('#printModal').modal('show');
        }

        function printReservation() {
            var printContents = document.getElementById('printContent').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>