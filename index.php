<?php
// Konfigurasi Database
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "db_cv_ilham"; // Nama database
// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);
// Cek koneksi
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}
// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);

$sql1 = "SELECT no, pendidikan, tahun, nama_sekolah FROM education";
$result1 = $conn->query($sql1);

$sql2 = "SELECT  nama_project, keterangan, image, link_project FROM project";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Portfolio</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
rel="stylesheet">
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
  />
<link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand text-white" href="#">22030100101 | ILHAM FEBRIAN DZULKIFLI | TEKNIK INFORMATIKA 5D</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#home"><b>HOME</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#education"><b>EDUCATION</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#projects"><b>PROJECT</b></a></li>
        <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
        <li class="nav-item">
          <button class="btn hire-btn"><b>Hire me</b></button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" id="home">
<div class="container">
<div class="row align-items-center">
<!-- Hero Text -->
<?php while ($row = $result->fetch_assoc()): ?>
<div class="col-md-6 hero-content">
<h1><span>I’m</span> <br> <?= $row['nama'] ?></h1>
<!-- Tampilkan Deskripsi -->
<p class="my-3">
<?= $row['deskripsi'] ?>
</p>
<a href="#" class="btn btn-custom">Download CV</a>
</div>
<!-- Hero Image -->
<div class="col-md-6 text-center hero-image">
<img src="backend/assets/images/<?= $row['foto'] ?>" alt="Foto" width="100">
</div>
</div>
</div>
<?php endwhile; ?>
</section>

<section id="">
      
    </section>


    <section id="education" class="bg-light">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col text-black">
            <h2>EDUCATION</h2>
          </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pendidikan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Nama Sekolah</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result1->num_rows > 0): ?>
                    <?php while ($row1 = $result1->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row1['no'] ?></td>
                            <td><?= $row1['pendidikan'] ?></td>
                            <td><?= $row1['tahun'] ?></td>
                            <td><?= $row1['nama_sekolah'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data pendidikan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
      </div>
      
    </section>


    <section id="projects">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>PROJECT</h2>
      </div>
    </div>
    <div class="row">
      <?php if ($result2->num_rows > 0): ?>
        <?php while ($row2 = $result2->fetch_assoc()): ?>
          <div class="col-md-4 mb-4">
            <div class="card" style="width: 100%;">
              <img src="backend/assets/images/<?= $row2['image'] ?>" class="card-img-top" alt="<?= $row2['nama_project'] ?>">
              <div class="card-body text-black">
                <h5 class="card-title"><?= $row2['nama_project'] ?></h5>
                <p class="card-text"><?= $row2['keterangan'] ?></p>
              </div>
              <div class="card-body">
                <a href="<?= $row2['link_project'] ?>" class="card-link" target="_blank">Link</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col">
          <p>No projects available.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
  
</section>

<footer id="contact" class="text-white pb-5">
  <h2 class="text-center">Contact</h2>
  <p class="text-center">Email: ilhamdzul9@gmail.com</p>
  <h4 class="text-center"><b>Alamat</b></h4>
  <p class="text-center">Kadipaten, Tasikmalaya</p>
  <p class="text-center">Jawa Barat, Indonesia</p>
  
  <div class="text-center my-3">

    <a href="https://instagram.com/dzulfe_" target="_blank" class="text-white mx-2" style="font-size: 1.5rem;">
      <i class="bi bi-instagram"></i>
    </a>
  </div>
</footer>



</body>
</html>