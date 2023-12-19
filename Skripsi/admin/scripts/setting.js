
let general_data, contacts_data;

let general_s_form = document.getElementById('general_s_form');
let nama_website_inp = document.getElementById('nama_website_inp');
let tentang_kami_inp = document.getElementById('tentang_kami_inp');

let contacts_s_form = document.getElementById('contacts_s_form');

// V9
let team_s_form = document.getElementById('team_s_form');
let member_name_inp = document.getElementById('member_name_inp');
let member_picture_inp = document.getElementById('member_picture_inp');
// V9

function get_general() {
    let nama_website = document.getElementById('nama_website');
    let tentang_kami = document.getElementById('tentang_kami');

    let shutdown_toggle = document.getElementById('shutdown-toggle');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        general_data = JSON.parse(this.responseText);

        nama_website.innerText = general_data.nama_website;
        tentang_kami.innerText = general_data.tentang_kami;

        nama_website_inp.value = general_data.nama_website;
        tentang_kami_inp.value = general_data.tentang_kami;

        if (general_data.shutdown == 0) {
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
        } else {
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
        }
    }

    xhr.send('get_general');
}

general_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    upd_general(nama_website_inp.value, tentang_kami_inp.value);
})

function upd_general(nama_website_val, tentang_kami_val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('general-s'));
        myModal.hide();

        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_general();
        } else {
            alert('error', 'No Changes made!');
        }
    }

    xhr.send('nama_website=' + nama_website_val + '&tentang_kami=' + tentang_kami_val + '&upd_general');
}


function upd_shutdown(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.responseText == 1 && general_data.shutdown == 0) {
            alert('error', 'Site Has Been Shutdown!');
        } else {
            alert('success', 'Shutdown Mode Off!');
        }
        get_general();
    }

    xhr.send('upd_shutdown=' + val);
}

function get_contacts() {
    let contacts_p_id = ['alamat', 'gmap', 'pn1', 'email', 'ig', 'fb', 'tw'];
    let iframe = document.getElementById('iframe');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);

        for (i = 0; i < contacts_p_id.length; i++) {
            document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
        }
        iframe.src = contacts_data[8];
        contacts_inp(contacts_data);
    }

    xhr.send('get_contacts');
}

// V9
team_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_member();
});

function add_member()
{
    let data = new FormData();
    data.append('name', member_name_inp.value);
    data.append('picture', member_picture_inp.files[0]);
    data.append('add_member', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);

    xhr.onload = function() {
        var myModal = document.getElementById('team-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img'){
            alert('error', 'Only JPG and PNG images are allowed!');
        }
        else if (this.responseText == 'inv_size'){
            alert('error', 'Image should be less than 2MB!');
        }
        else if (this.responseText == 'upd_failed'){
            alert('error', 'Image upload failed. Server Down!');
        }
        else{
            alert('success', 'New member added!');
            member_name_inp.value='';
            member_picture_inp.value='';
            get_members;
        }
    }

    xhr.send(data);
}

function get_members()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('team-data').innerHTML = this.responseText;
    }

    xhr.send('get_members');

}

function rem_member(val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if(this.responseText==1){
            alert('success','Member Removed!');
            get_members;
        }
        else {
            alert('error', 'Server Down!');
        }
    }

    xhr.send('rem_member='+val);
}
// V9

function contacts_inp(data) {
    let contacts_inp_id = ['alamat_inp', 'gmap_inp', 'pn1_inp', 'email_inp', 'ig_inp', 'fb_inp', 'tw_inp', 'iframe_inp'];

    for (i = 0; i < contacts_inp_id.length; i++) {
        document.getElementById(contacts_inp_id[i]).value = data[i + 1];
    }
}

contacts_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    upd_contacts();
})

function upd_contacts() {
    let index = ['alamat', 'gmap', 'pn1', 'email', 'ig', 'fb', 'tw', 'iframe'];
    let contacts_inp = ['alamat_inp', 'gmap_inp', 'pn1_inp', 'email_inp', 'ig_inp', 'fb_inp', 'tw_inp', 'iframe_inp'];

    let data_str = "";

    for (i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + document.getElementById(contacts_inp[i]).value + '&';
    }
    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var myModal = document.getElementById('contacts-s')
        var modal = bootstrap.Modal.getInstance(myModal)
        modal.hide();
        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_contacts();
        } else {
            alert('error', 'No Changes made!');
        }
    }

    xhr.send(data_str);
}

window.onload = function() {
    get_general();
    get_contacts();
    get_members();
}