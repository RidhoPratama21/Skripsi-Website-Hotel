<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `setting` WHERE `id`=?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `setting` SET `nama_website`=?, `tentang_kami`=? WHERE `id`=?";
    $values = [$frm_data['nama_website'], $frm_data['tentang_kami'], 1];
    $res = update($q, $values, 'ssi');
    echo $res;
}

if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0;
    $q = "UPDATE `setting` SET `shutdown`=? WHERE `id`=?";
    $values = [$frm_data, 1];
    $res = update($q, $values, 'ii');
    echo $res;
}

if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `kontak_detail` WHERE `id`=?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['upd_contacts'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `kontak_detail` SET `alamat`=?, `gmap`=?, `pn1`=?, `email`=?, `ig`=?, `fb`=?, `tw`=?, `iframe`=? WHERE `id`=?";
    $values = [$frm_data['alamat'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['email'], $frm_data['ig'], $frm_data['fb'], $frm_data['tw'], $frm_data['iframe'], 1];
    $res = update($q, $values, 'ssssssssi');
    echo $res;
}

// V9
if (isset($_POST['add_member'])) {
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `team_details`(`name`, `picture`) VALUES (?,?)";
        $values = [$frm_data['name'], $img_r];
        $res = insert($q, $values, 'ss');
        echo $res;
    }
}

if (isset($_POST['get_members'])) {
    $res = selectAll('team_details');
    while ($row = mysqli_fetch_assoc($res)) {
        $path = ABOUT_IMG_PATH;
        echo <<<data
            <div class="col-md-2 mb-3">
                <div class="card bg-dark text-white">
                <img src="$path$row[picture]" class="card-img">
                    <div class="card-img-overlay text-end">
                        <button type="button" onclick="rem_member($row[id])" class="btn btn-danger btn-sm shadow none">
                            <i class="bi bi-trash"></i>Delete
                        </button>
                    </div>
                    <p class="card-text text-center px-3 py-2">$row[name]</p>
                </div>
            </div>
        data;
    }
}

if (isset($_POST['rem_member'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_member']];

    $pre_q = "SELECT * FROM `team_details` WHERE `id` =?";
    $res = select($pre_q, $values, 'i');
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['picture'], ABOUT_FOLDER)) {
        $q = "DELETE FROM `team_details` WHERE `id`=?";
        $res = delete($q, $values, 'i');
        echo $res;
    } else {
        echo 0;
    }
}
// V9