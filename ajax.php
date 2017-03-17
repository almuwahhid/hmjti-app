<?php

    $con = mysql_connect('localhost', 'root', '');
    $db = mysql_select_db('onsenui');

    if ($_GET['aksi'] == "tambah") {

        $npk            = $_POST['npk'];
        $nama_lengkap   = $_POST['nama_lengkap'];
        $alamat         = $_POST['alamat'];

        $sql = mysql_query("INSERT INTO data_anggota
                SET npk = '$npk',
                    nama = '$nama_lengkap',
                    alamat = '$alamat'");

        if ($sql === TRUE) {
            echo 'sukses';
        }
        else {
            echo 'gagal';
        }
    }
    elseif ($_GET['aksi'] == "muatData") {

        $sql = mysql_query("SELECT * FROM data_anggota ORDER BY nama ASC");

        $datanya = array();
        while ($r = mysql_fetch_assoc($sql)) {
            $datanya[] = $r;
        }
        echo json_encode($datanya);
    }
    elseif ($_GET['aksi'] == 'hapusData') {

        $id_anggota = $_GET['id_anggota'];

        $sql = mysql_query("DELETE FROM data_anggota WHERE id_anggota='$id_anggota'");

        if ($sql === TRUE) {
            echo 'sukses';
        }
        else {
            echo 'gagal';
        }
    }
    elseif ($_GET['aksi'] == 'detailData') {

        $id_anggota = $_GET['id_anggota'];

        $sql = mysql_query("SELECT * FROM data_anggota WHERE id_anggota = '$id_anggota'");

        $datanya = array();
        while ($r = mysql_fetch_assoc($sql)) {
            $datanya[] = $r;
        }
        echo json_encode($datanya[0]);
    }
?>
