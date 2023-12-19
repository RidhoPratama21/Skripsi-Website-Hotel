    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">Dhamara Hotel</h3>
                <p align="justify">
                    Dhamara Hotel adalah hotel di lokasi yang baik, tepatnya berada di Padang Utara.
                    Dari Stasiun Padang, hotel ini hanya berjarak sekitar 4,34 km.
                    Selain letaknya yang strategis, Dhamara Hotel juga merupakan hotel dekat Stasiun Lubuk Alung berjarak sekitar 26,66 km dan Rumah Makan Lamun Ombak berjarak sekitar 0,34 km.
                </p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
                <a href="kamar.php" class="d-inline-block mb-2 text-dark text-decoration-none">Kamar</a><br>
                <a href="fasilitas.php" class="d-inline-block mb-2 text-dark text-decoration-none">Fasilitas</a><br>
                <a href="kontak.php" class="d-inline-block mb-2 text-dark text-decoration-none">Kontak Kami</a><br>
                <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">Tentang</a>
            </div>
            <div class="col-lg-4 p-4">
                <h5>Follow us</h5>
                <?php
                if ($contact_r['ig'] != '') {
                    echo <<<data
                        <a href="$contact_r[ig]" class="d-inline-block text-dark text-decoration-none mb-2">
                            <i class="bi bi-instagram me-1"></i> Instagram 
                        </a><br>
                    data;
                }
                ?>
                <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-facebook me-1"></i> Facebook </a>
                <br>
                <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-twitter me-1"></i> Twitter </a>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">Designed By M Ridho Pratama</h6>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function setActive() {
            let navbar = document.getElementById('nav-bar');
            let a_tags = navbar.getElementsByTagName('a');

            for (i = 0; i < a_tags.length; i++) {
                let file = a_tags[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if (document.location.href.indexOf(file_name) >= 0) {
                    a_tags[i].classList.add('active');
                }
            }
        }
        setActive();
    </script>