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
    <title>Admin Panel - User Queries</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">USER QUERIES</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="?terlihat=all" class="btn btn-dark rounded-pill shadow-none btn-sm">
                                <i class="bi bi-check-all"></i> Mark all read</a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">
                                <i class="bi bi-trash"></i> Delete all</a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" style="width: 20%;">Subjek</th>
                                        <th scope="col" style="width: 30%;">Pesan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM `user_queries` ORDER BY `id` DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $terlihat = '';
                                        if ($row['terlihat'] != 1) {
                                            $terlihat = "<a href='?terlihat=$row[id]' class='btn btn-sm rounded-pill btn-primary'>Mark as Read</a> <br>";
                                        }
                                        $terlihat .= "<a href='?del=$row[id]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                                        echo <<<query
                                        <tr>
                                        <td>$i</td>
                                        <td>$row[nama]</td>
                                        <td>$row[email]</td>
                                        <td>$row[subjek]</td>
                                        <td class="message-cell">$row[pesan]</td>
                                        <td>$row[tanggal]</td>
                                        <td>$terlihat</td>
                                        </tr>
                                        query;
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>

</body>

</html>