<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhamara Hotel - Kontak</title>
    <?php require('inc/links.php'); ?>
    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Kontak Kami</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Blanditiis sequi, illum hic et quisquam, <br>neque vero eos corporis laboriosam delectus
            consequatur rerum asperiores ad perspiciatis repellat vitae vel cumque! Et.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">

                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5>Alamat</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['alamat'] ?>
                        <h5 class="mt-4">Hubungi Kami</h5>
                        <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['pn1'] ?>
                        </a>

                        <h5>Email</h5>
                        <a href="mailto : <?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark">
                            <i class="bi bi-envelope-at-fill"> </i><?php echo $contact_r['email'] ?>
                        </a>

                        <h5 class="mt-4">Follow us</h5>
                        <?php
                        if ($contact_r['ig'] != '') {
                            echo <<<data
                                <a href="$contact_r[ig]" class="d-inline-block mb-3 text-dark fs-5 me-2">
                                    <i class="bi bi-instagram me-1"></i>
                                </a>
                            data;
                        }
                        ?>

                        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3 text-dark fs-5 me-2">
                            <i class="bi bi-facebook me-1"></i>
                        </a>

                        <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-3 text-dark fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i>
                        </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Send Message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Nama</label>
                            <input name="nama" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Subjek</label>
                            <input name="subjek" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Pesan</label>
                            <textarea name="pesan" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="kirim" class="btn text-white custom-bg mt-3">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php

    if (isset($_POST['kirim'])) {
        $frm_data = filteration($_POST);

        $q = "INSERT INTO `user_queries`(`nama`, `email`, `subjek`, `pesan`) VALUES (?,?,?,?)";
        $values = [$frm_data['nama'], $frm_data['email'], $frm_data['subjek'], $frm_data['pesan']];

        $res = insert($q, $values, 'ssss');
        if ($res == 1) {
            alert('success', 'Pesan Terkirim!');
        } else {
            alert('error', 'Server Down! Coba lagi nanti.');
        }
    }

    ?>

    <?php require('inc/footer.php'); ?>

</body>

</html>