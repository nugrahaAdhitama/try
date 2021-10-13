<?php
// konek ke halaman functions.php
require '../functions/functions.php';

// menangkap id yang dikirim melalui url
$id = $_GET["id"];

// query data yang ditangkap oleh variabel id
$writer = query("SELECT * FROM penulis WHERE id = $id")[0];

// query data selain yang ditangkap oleh variabel id
$writers = query("SELECT * FROM penulis WHERE id != $id");

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

    <title><?= $writer["judul_karya"]; ?></title>
  </head>
  <body>
    <!-- Navbar -->
    <div id="navbar">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php#jumbotron">XII MIPA 1</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php#jumbotron">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#projects">Hasil Karya</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <svg style="border: none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 180"><path fill="#212529" fill-opacity="1" d="M0,96L40,85.3C80,75,160,53,240,42.7C320,32,400,32,480,37.3C560,43,640,53,720,85.3C800,117,880,171,960,165.3C1040,160,1120,96,1200,90.7C1280,85,1360,139,1400,165.3L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
    </div>
    <!-- Akhir Navbar -->

    <!-- Main Section -->
    <section id="main">
        <div class="container">
            <div class="row text-center mb-3">
                <h2><?= $writer["judul_karya"]; ?></h2>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="img-wrapper text-center">
                    <img src="img/thumbnail/Kejatuhan Sang Raja Resized.jpg" alt="Kejatuhan Sang Raja" class="img-fluid mb-1">
                    <p class="fs-6">Karya : <?= $writer["nama_lengkap"]; ?></p>
                </div>
            </div>
            <div class="row text-start justify-content-evenly align-items-center d-flex flex-row-reverse">
                <div class="col-md-8 text-md-start">
                    <!-- Article -->
                    <p class="mb-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla enim quae optio eveniet exercitationem. Dolores possimus veritatis, suscipit sit odit aspernatur non voluptates? Rem voluptates illum dolor porro mollitia, rerum consequuntur in tempora quasi laboriosam perferendis sunt earum tempore accusamus, exercitationem debitis excepturi libero, ea soluta a aliquid ut deserunt asperiores deleniti. Tenetur placeat, at perferendis deleniti dolor eos a asperiores nemo ea quisquam illo. Saepe consequuntur harum inventore temporibus, molestiae atque quod. Molestiae sed magnam, assumenda nobis minima quibusdam illum in alias aliquid voluptatibus laudantium consectetur iusto nam iste qui non mollitia voluptates aperiam cum. Ipsa iusto iure consectetur.</p>
                    <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi asperiores modi corporis accusantium corrupti amet, omnis molestiae. Ut cupiditate esse obcaecati distinctio officia similique consequuntur reiciendis perferendis animi tempora, tenetur laudantium libero amet eos nulla molestiae, quaerat quo inventore, quod a. Laboriosam impedit culpa minus eius sunt dolore neque repudiandae doloremque quaerat nisi, iure beatae. Repudiandae neque nesciunt repellat. Inventore vitae, laborum officia sint quae tempore similique nesciunt enim dignissimos, dolorum ab error laudantium ratione.</p>
                    <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae atque harum fugit veniam quia. Repellat ratione aliquid, qui tenetur odio animi molestiae! Laborum, repellendus illum.</p>
                    <!-- Akhir Article -->
                </div>
                <div class="col-md-4">
                    <!-- Card Profile -->
                    <div class="card text-start" style="width: 18rem;" data-aos="zoom-out">
                        <div class="card-body container bg-dark">
                          <div class="row mb-3">
                              <div class="col-md-12">
                                  <p class="bio-head text-light"><?= $writer["nama_lengkap"]; ?></p>
                                  <p class="card-text bio text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quisquam eligendi qui, cumque expedita dolore ullam aspernatur, ipsum voluptatibus ea suscipit maxime ut deserunt quod aliquam numquam nemo facere similique?</p>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="bio">
                                  <a href="https://www.instagram.com/<?= $writer["instagram"]; ?>" class="btn btn-primary rounded-circle text-center" target="_blank"><i class="fab fa-instagram bio"></i></a>
                              </div>
                          </div>
                        </div>
                      </div>
                    <!-- Akhir Card Profile -->
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Main Section -->

    <!-- Carousel -->
    <section id="projects">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Karya Lainnya</h2>
          </div>
        </div>
  
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-inner">
              <?php $i = 1; ?>
              <?php foreach($writers as $wrt) : ?>
              <?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                <div class="<?php echo $item_class; ?>">
                  <a href="<?= $wrt["nama_panggilan"]; ?>.php?id=<?= $wrt["id"]; ?>">
                    <img src="img/<?= $wrt["thumbnail_gambar"]; ?>" class="d-block img-fluid" alt="<?= $wrt["thumbnail_gambar"]; ?>">
                  </a>
                </div>
                <?php $i++; ?>
                <?php endforeach;?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#212529" fill-opacity="1" d="M0,160L48,154.7C96,149,192,139,288,128C384,117,480,107,576,106.7C672,107,768,117,864,112C960,107,1056,85,1152,90.7C1248,96,1344,128,1392,144L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    <!-- Akhir Carousel -->

    <!-- Footer -->
        <footer class="text-white text-center pb-5">
            <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a target="_blank" href="https://instagram.com/nugrahadhitama?utm_medium=copy_link" class="text-white fw-bold" style="text-decoration: none;">Nugraha Adhitama</a></p>
        </footer>
    <!-- Akhir Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

    <!-- Script AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- mengatur default AOS -->
    <script>
        AOS.init({
        duration: 1300,
        once: true,
    });
    </script>
  </body>
</html>