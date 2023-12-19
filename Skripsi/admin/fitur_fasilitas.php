<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if (isset($_GET['terlihat'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['terlihat'] == 'all') {
        $q = "UPDATE `user_queries` SET `terlihat`=?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Mark all as Read!');
        } else {
            alert('error', 'Operation Failed!');
        }
    } else {
        $q = "UPDATE `user_queries` SET `terlihat`=? WHERE `id`=?";
        $values = [1, $frm_data['terlihat']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Mark as Read!');
        } else {
            alert('error', 'Operation Failed!');
        }
    }
}

if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM `user_queries`";
        if (mysqli_query($con, $q)) {
            alert('success', 'All Data Deleted!');
        } else {
            alert('error', 'Operation Failed!');
        }
    } else {
        $q = "DELETE FROM `user_queries` WHERE `id`=?";
        $values = [$frm_data['del']];
        if (delete($q, $values, 'i')) {
            alert('success', 'Data Deleted!');
        } else {
            alert('error', 'Operation Failed!');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Fitur & Fasilitas</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">FITUR & FASILITAS</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-tittle m-0">Fitur</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#fitur-s">
                                <i class="bi bi-plus-square"> </i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="fitur-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-tittle m-0">Fasilitas</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#fasilitas-s">
                                <i class="bi bi-plus-square"> </i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">No</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="fasilitas-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Fitur modal-->
    <div class="modal fade" id="fitur-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="fitur_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Fitur</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" name="fitur_name" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Fasilitas modal -->
    <div class="modal fade" id="fasilitas-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="fasilitas_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Fasilitas</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="fasilitas_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="file" name="fasilitas_icon" accept=".svg" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="fasilitas_deskripsi" class="form-control shadow-none" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>

    <script>
        let fitur_s_form = document.getElementById('fitur_s_form');
        let fasilitas_s_form = document.getElementById('fasilitas_s_form');

        fitur_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_fitur();
        });

        function add_fitur() {
            let data = new FormData();
            data.append('name', fitur_s_form.elements['fitur_name'].value);
            data.append('add_fitur', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/fitur_fasilitas.php", true);

            xhr.onload = function() {
                var myModal = document.getElementById('fitur-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) {
                    alert('success', 'Fitur baru ditambahkan!');
                    fitur_s_form.elements['fitur_name'].value = '';
                    get_fitur();
                } else {
                    alert('error', 'Server Down!');
                }
            }

            xhr.send(data);
        }

        function get_fitur() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/fitur_fasilitas.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('fitur-data').innerHTML = this.responseText;
            }

            xhr.send('get_fitur');

        }

        function rem_fitur(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/fitur_fasilitas.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'Fitur Removed!');
                    get_fitur;
                } else if (this.responseText == 'room_added') {
                    alert('error', 'Fitur is added in room!');
                } else {
                    alert('error', 'Server Down!');
                }
            }

            xhr.send('rem_fitur=' + val);
        }

        fasilitas_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_fasilitas();
        });

        function add_fasilitas() {
            let data = new FormData();
            data.append('name', fasilitas_s_form.elements['fasilitas_name'].value);
            data.append('icon', fasilitas_s_form.elements['fasilitas_icon'].files[0]);
            data.append('desk', fasilitas_s_form.elements['fasilitas_desk'].value);
            data.append('add_fasilitas', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/fitur_fasilitas.php", true);

            xhr.onload = function() {
                var myModal = document.getElementById('fasilitas-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 'inv_img') {
                    alert('error', 'Only SVG images are allowed!');
                } else if (this.responseText == 'inv_size') {
                    alert('error', 'Image should be less than 1MB!');
                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Image upload failed. Server Down!');
                } else {
                    alert('success', 'Fasilitas baru ditambahkan!');
                    fasilitas_s_form.reset();
                    // get_members;
                }
            }

            xhr.send(data);
        }

        window.onload = function() {
            get_fitur();
        }
    </script>

</body>

</html>