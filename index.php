<?php
// koneksi ke halaman functions.php
require 'functions/functions.php';

$writers = query("SELECT * FROM penulis");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- import font -->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2e44d7c71b.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- My Css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Literasi XII MIPA 1</title>
  </head>
  <body>
    <!-- Navbar -->
    <div id="navbar">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#jumbotron">XII MIPA 1</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#jumbotron">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#projects">Hasil Karya</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Upload</a></li>
                  <li><a class="dropdown-item" href="login/index.html">Login</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <svg style="border: none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 180"><path fill="#212529" fill-opacity="1" d="M0,96L40,85.3C80,75,160,53,240,42.7C320,32,400,32,480,37.3C560,43,640,53,720,85.3C800,117,880,171,960,165.3C1040,160,1120,96,1200,90.7C1280,85,1360,139,1400,165.3L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
    </div>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center" id="jumbotron">
      <div class="container">
        <div class="row text-center justify-content-evenly align-items-center d-flex flex-row-reverse">
          <div class="col-md-6">
            <img src="img/3630159.png" alt="Jumbotron Picture" class="d-block mx-lg-auto img-fluid" data-aos="fade-left" data-aos-duration="1300" data-aos-delay="1500">
          </div>
          <div class="col-md-6">
            <h1 class="display-4 mt-3">LITERASI XII MIPA 1</h1>
            <p class="lead"></p>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- About -->
    <section id="about">
      <div class="container text-dark">
        <div class="row text-center mb-3">
          <div class="col-md mb-3">
            <h2>Tentang Kami</h2>
          </div>
        </div>

        <div class="row text-center justify-content-around fs-5">
          <div class="col-md-6 mb-3" data-aos="fade-right" data-aos-duration="2000">
            Kelas 12 MIPA 1 (2020-2022) SMAN 6 Jakarta. Kelas yang selalu ceria dibawah bimbingan Ibu Yuli Rahayuningsih. Kelas kami merupakan sebuah kesatuan yang solid, terdiri dari 36 siswa-siswi spesial dengan kelebihannya masing-masing.
          </div>

          <div class="col-md-6 mb-3" data-aos="fade-left" data-aos-duration="1500" data-aos-delay="500">
            Web ini kami jadikan sebagai sarana dalam menuangkan ide dan berkreasi. Kami harap kedepannya web ini dapat menjadi sumber literasi bagi para pembacanya.
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir About -->
   
    <!-- Hasil Karya -->
    <section id="projects">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Hasil Karya</h2>
          </div>
        </div>

        <div class="row justify-content-between text-center">
          <?php foreach($writers as $writer) : ?>
          <div class="col-md-3 mb-3">
            <div class="card">
              <a href="hasil karya/<?= $writer["nama_panggilan"]; ?>.php?id=<?= $writer["id"]; ?>"><img src="img/<?= $writer["thumbnail_gambar"]; ?>" class="card-img-top" alt="Projects 1"></a>
              <div class="card-body bg-dark">
                <p class="card-text text-light">
                  Karya: <?= $writer["nama_lengkap"]; ?>
                  <br>
                  <a href="hasil karya/<?= $writer["nama_panggilan"]; ?>.php?id=<?= $writer["id"]; ?>" class="text-light link-text">Read More</a>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#212529" fill-opacity="1" d="M0,160L48,154.7C96,149,192,139,288,128C384,117,480,107,576,106.7C672,107,768,117,864,112C960,107,1056,85,1152,90.7C1248,96,1344,128,1392,144L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section> 
    <!-- AKhir Hasil Karya -->

    <!-- Footer -->
    <footer class="text-white text-center pb-5">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a target="_blank" href="https://instagram.com/nugrahadhitama?utm_medium=copy_link" class="text-white fw-bold" style="text-decoration: none;">Nugraha Adhitama</a></p>
    </footer>
    <!-- Akhir Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Script GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
    <script>
      gsap.registerPlugin(TextPlugin);

      gsap.from('.navbar', {
        duration: 1.5, ease: 'bounce', y: '-100%', opacity: 0, ease: 'back'
      });

      gsap.from('.display-4', {
        duration: 1.5, x: "-100%", opacity: 0, ease: 'back', delay: 1.5
      });

      gsap.to('.lead', {
        duration: 7.5, delay: 3, text: "Selamat datang di website kami, disini banyak karya literasi yang telah kami buat. Selamat menikmati!"
      });
    </script>

    <!-- Script AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      // menangkap class card
      const card = document.querySelectorAll('.card');

      // mengatur AOS untuk class card
      card.forEach((card, i) =>{
        card.dataset.aos = 'zoom-in';
        card.dataset.aosDelay = i * 100;
        card.dataset.aosDuration = 1500;
      });

      // mengatur default AOS
      AOS.init({
        duration: 1300,
        once: true,
      });
    </script>

    <!-- My JavaScript -->
    <script src="js/app..js"></script>
  
  </body>
</html>