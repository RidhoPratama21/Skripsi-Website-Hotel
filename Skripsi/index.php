<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dhamara Hotel - Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <?php require('inc/links.php'); ?>

  <style>
    .ketersediaan-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    @media screen and (max-width: 575px) {
      .ketersediaan-form {
        margin-top: 25px;
        padding: 0 35px;
      }
    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <!-- homepage -->
  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/homepage/1.png" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="images/homepage/2.png" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="images/homepage/3.png" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="images/homepage/4.png" class="w-100 d-block">
        </div>
      </div>
    </div>
  </div>

  <!-- cek tersedia kamar -->
  <div class="container ketersediaan-form mt-5">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-4">Cek Ketersediaan Kamar</h5>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Check-in</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Check-out</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Dewasa</label>
              <select class="form-select shadow-none">
                <option selected>Pilihan</option>
                <option value="1">1 Orang</option>
                <option value="2">2 Orang</option>
                <option value="3">3 Orang</option>
              </select>
            </div>
            <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight: 500;">Anak</label>
              <select class="form-select shadow-none">
                <option selected>Pilihan</option>
                <option value="1">1 Orang</option>
                <option value="2">2 Orang</option>
                <option value="3">3 Orang</option>
              </select>
            </div>
            <div class="col-lg-1 mb-lg-3 mt-2">
              <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Our rooms -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>

  <!-- Deluxe -->
  <div class="container">
    <div class=" row d-flex justify-content-center align-items-center">
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px; margin: none;">
          <img src="images/rooms/deluxe.png" class="card-img-top">
          <div class="card-body">
            <h5>Deluxe Room</h5>
            <h6 class="mb-4">Rp 300.000 per malam</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Fasilitas</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Double Bed
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Wifi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                TV
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                AC
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                PS5
              </span>
            </div>
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Booking Now</a>
          </div>
        </div>
      </div>

      <!-- Superior -->
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
          <img src="images/rooms/kamar2.jpg" class="card-img-top">
          <div class="card-body">
            <h5>Superior Room</h5>
            <h6 class="mb-4">Rp 280.000 per malam</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Fasilitas</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Single Bed
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Wifi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                TV
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                AC
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                PS5
              </span>
            </div>
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Booking Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Our Facilities -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>

  <div class="container">
    <div class="row justify-content-evenly">
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/fitur/wifi.svg" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/fitur/ac.svg" width="80px">
        <h5 class="mt-3">AC</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/fitur/parkir.svg" width="80px">
        <h5 class="mt-3">Parkir</h5>
      </div>
    </div>
  </div>

  <!-- Testimoni -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimoni</h2>

  <div class="container mt-5">
    <div class="swiper swiper-testimoni">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/fitur/star.svg" width="30px">
            <h6 class="m-0 ms-2">Ridho</h6>
          </div>
          <p>
            Sangat Bagus!
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/fitur/star.svg" width="30px">
            <h6 class="m-0 ms-2">Ridho</h6>
          </div>
          <p>
            Mainnya Hebat!
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/fitur/star.svg" width="30px">
            <h6 class="m-0 ms-2">Ridho</h6>
          </div>
          <p>
            P!
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <!-- Maps -->

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Maps</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h5>Hubungi Kami</h5>
          <a href="tel:+<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
          </a>
          <br>
        </div>
        <div class="bg-white p-4 rounded mb-4">
          <h5>Follow us</h5>
          <?php
          if ($contact_r['ig'] != '') {
            echo <<<data
            <a href="$contact_r[ig]" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram me-1"></i> Instagram
              </span>
            </a>
            <br>
            data;
          }
          ?>
          <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook me-1"></i> Facebook
            </span>
          </a>
          <br>
          <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-twitter me-1"></i> Twitter
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php require('inc/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- untuk swipe 2 -->
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableONInteraction: false,
      }
    });

    var swiper = new Swiper(".swiper-testimoni", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },

    });
  </script>

</body>

</html>