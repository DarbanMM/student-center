<?php
// Koneksi ke database
include 'koneksi.php';

// Mengambil filter tanggal dari form (jika ada)
$filter_tanggal = isset($_POST['filter_tanggal']) ? $_POST['filter_tanggal'] : '';

// Query untuk mengambil data dari tabel reservasi
$sql = "SELECT * FROM reservasi";
if ($filter_tanggal) {
    $sql .= " WHERE tanggal = '$filter_tanggal'";
}
$sql .= " ORDER BY tanggal DESC, waktu ASC";

// Eksekusi query
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

  <title> Student Center | Home</title>

     <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .reservasi-text {
      font-size: 25px;
      font-weight: 700;
      color: #37517E;
    }
    .light{
      font-weight:400;
      color: #62AF00;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href=""><img src="assets/img/logoSC.png" class="img-fluid animated"></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#team">Denah</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Student Center UIN Sunan Kalijaga Yogyakarta</h1>
        </div>
        <div class="col-lg-8 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/SC.png" class="img-fluid animated zoom" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Tentang Kami Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

      <div class="section-title">
            <h2>Tentang Kami</h2>
      </div>
          <div class="row content">
            <div class="col-lg-12">
              <p>
                <br>
                Selamat datang di Student Center Universitas Islam Negeri (UIN) Sunan Kalijaga Yogyakarta<br>
                <br>
                Student Center di UIN Sunan Kalijaga Yogyakarta merupakan gedung multifungsi yang berfungsi sebagai pusat kegiatan, koordinasi, dan kolaborasi mahasiswa. Diresmikan oleh Rektor Prof. Dr. Amin Abdullah pada tanggal 6 Desember 2005, gedung tiga lantai ini menyediakan ruang administrasi dan fasilitas pendukung bagi berbagai organisasi mahasiswa (ormawa).<br>
                <br>
                Sebagai bagian dari komitmen UIN Sunan Kalijaga dalam mencetak generasi yang berkarakter dan berwawasan global, Student Center menyediakan berbagai fasilitas, seperti:<br>
                <br>
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Ruang pertemuan dan seminar</li>
                <li><i class="ri-check-double-line"></i> Aula serbaguna untuk kegiatan seni, budaya, dan olahraga</li>
                <li><i class="ri-check-double-line"></i> Ruang kerja bersama (coworking space) untuk diskusi dan pengembangan ide</li>
                <li><i class="ri-check-double-line"></i> Layanan konsultasi dan bimbingan kemahasiswaan</li>
              </ul>
            </div>
          </div>

      </div>
    </section><!-- End Tentang Kami Section -->


    <!-- ======= Apa yang kami tawarkan Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Apa yang kami tawarkan?</h2>
      </div>

          <div class="row justify-content-center">
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-home-alt"></i></div>
                <h4><a>Co-Working Space</a></h4>
                <p>Ruang kerja bersama yang dirancang untuk mahasiswa agar dapat belajar, berdiskusi, dan bekerja secara kolaboratif. Dilengkapi dengan Wi-Fi, meja kerja nyaman, dan AC untuk meningkatkan produktivitas.</p>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bxs-universal-access"></i></div>
                <h4><a>Ruang UKM</a></h4>
                <p>Ruang bagi berbagai Unit Kegiatan Mahasiswa (UKM) untuk beraktivitas. Dilengkapi dengan fasilitas seperti lemari penyimpanan dan meja. </p>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-people-fill"></i></div>
                <h4><a>Ruang Organisasi</a></h4>
                <p>Tempat bagi organisasi mahasiswa untuk merancang program kerja, mengadakan rapat, dan menyimpan dokumen organisasi.</p>
              </div>
            </div>
          </div>
      </div>
    </section><!-- End Apa yang kami tawarkan Section -->

    <!-- ======= Layanan Aduan Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

      <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
              <h3>Layanan Aduan</h3>
              <p>Layanan Aduan ini untuk mempermudah mahasiswa menyampaikan keluhan, saran, atau masukan terkait fasilitas dan layanan di Student Center UIN Sunan Kalijaga. Dengan layanan ini, kami berkomitmen untuk terus meningkatkan kualitas layanan dan menciptakan lingkungan yang nyaman bagi seluruh mahasiswa.</p>
            </div>
          </div>

      </div>
    </section><!-- End Layanan Aduan Section -->

<!-- ======= Denah Section ======= -->
<section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Denah Student Center</h2>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-10 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="pic"><img src="assets/img/denah/lantai1.png" class="img-fluid" alt=""></div>
            </div>
            <div class="col-lg-10 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="pic"><img src="assets/img/denah/lantai2.png" class="img-fluid" alt=""></div>
            </div>
            <div class="col-lg-10 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="pic"><img src="assets/img/denah/lantai3.png" class="img-fluid" alt=""></div>
            </div>
          </div>
      </div>
</section><!-- End Denah Section -->

<!-- ======= Tabel Reservasi ======= -->
<section id="reservasi" class="reservasi">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Data Reservasi</h2>
        </div>

    <!-- Form untuk filter berdasarkan tanggal -->
    <form method="POST" action="">
        <label for="filter_tanggal">Filter Tanggal:</label>
        <input type="date" id="filter_tanggal" name="filter_tanggal" value="<?php echo $filter_tanggal; ?>">
        <button type="submit">Terapkan</button>
    </form>

    <!-- Tabel untuk menampilkan data reservasi -->
    <table border="0" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Asal</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Ruang</th>
                <th>Fakultas</th>
                <th>Keperluan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['nama']) . "</td>
                        <td>" . htmlspecialchars($row['asal']) . "</td>
                        <td>" . htmlspecialchars($row['tanggal']) . "</td>
                        <td>" . htmlspecialchars($row['waktu']) . "</td>
                        <td>" . htmlspecialchars($row['waktu_selesai']) . "</td>
                        <td>" . htmlspecialchars($row['ruang']) . "</td>
                        <td>" . htmlspecialchars($row['fakultas']) . "</td>
                        <td>" . htmlspecialchars($row['keperluan']) . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>Tidak ada data yang ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
      </div>
    </section><!-- End Tabel Reservasi -->

<!-- ======= Footer ======= -->
  
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

    <p class="reservasi-text">Student<span class="bold">Center</span></p>
      <div class="col-lg-3 col-md-6 footer-contact">
        <p>
          Jl. Timoho No.64, Papringan,<br>
          Caturtunggal, Kec. Depok,<br>
          Kota Yogyakarta, Daerah Istimewa Yogyakarta 55221<br><br>
          <strong>Phone:</strong> +62-274-512474<br>
          <strong>Email:</strong> student.center@uin-suka.ac.id<br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="login.php">Reservasi</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Layanan</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#team">Denah</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Social Networks</h4>
        <p>Anda bisa menjangkau kami dalam memperoleh informasi terkait pelayanan kami di :</p>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>Akrimna, Darban, Yusrina M</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
      Designed by <strong> Akrimna Fahma, Darban Maha Mursyidi, dan Yusrina Mastura </strong>
      </div>
</div>
</footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 15643656;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/15643656/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->

</body>

</html>