<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

// V13
if (isset($_POST['add_fitur'])) {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `fitur`(`nama`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q, $values, 's');
    echo $res;
}

if (isset($_POST['get_fitur'])) {
    $res = selectAll('fitur');
    $i = 1;

    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
        <tr>
        <td>$i</td>
        <td>$row[nama]</td>
        <td>
            <button type="button" onclick="rem_fitur($row[id])" class="btn btn-danger btn-sm shadow none">
                <i class="bi bi-trash"></i>Delete
            </button>
        </td>
        </tr>
        data;
        $i++;
    }
}

if (isset($_POST['rem_fitur'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_fitur']];

    $q = "DELETE FROM `fitur` WHERE `id`=?";
    $res = delete($q, $values, 'i');
    echo $res;
}
// V13

if (isset($_POST['add_fasilitas'])) {
    $frm_data = filteration($_POST);

    $img_r = uploadSVGImage($_FILES['icon'], FITUR_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `fasilitas`(`icon`,`nama`, `deskripsi`) VALUES (?,?,?)";
        $values = [$img_r, $frm_data['name'], $frm_data['desk'],];
        $res = insert($q, $values, 'sss');
        echo $res;
    }
}
