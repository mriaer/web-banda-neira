<?php
if ($_POST) {
    include_once("connection.php");

    $id_daftar_pesanan = $_POST['id_daftar_pesanan'];
    $id_paket_wisata = $_POST['nama_paket'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $no_tlp = $_POST['no_tlp'];
    $tgl_pesan = $_POST['tgl_pesan'];
    $jumlah_hari = $_POST['jumlah_hari'];

    if (isset($_POST['layanan_penginapan'])) {
        $layanan_penginapan = "Y";
    } else {
        $layanan_penginapan = "N";
    }

    if (isset($_POST['layanan_transportasi'])) {
        $layanan_transportasi = "Y";
    } else {
        $layanan_transportasi = "N";
    }

    if (isset($_POST['layanan_makan'])) {
        $layanan_makan = "Y";
    } else {
        $layanan_makan = "N";
    }

    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket_str = $_POST['harga_paket'];

    $harga_paket = str_replace('.', '', $harga_paket_str);
    $harga_paket = (int)$harga_paket;

    $jumlah_tagihan_str = $_POST['jumlah_tagihan'];

    $jumlah_tagihan = str_replace('.', '', $jumlah_tagihan_str);
    $jumlah_tagihan = (int)$jumlah_tagihan;

    $sql = "UPDATE daftar_pesanan SET id_paket_wisata='$id_paket_wisata', nama_pemesan='$nama_pemesan', no_tlp='$no_tlp', tanggal_pemesanan='$tgl_pesan', jumlah_peserta='$jumlah_peserta', jumlah_hari='$jumlah_hari', akomodasi='$layanan_penginapan', transportasi='$layanan_transportasi', makanan='$layanan_makan', harga_paket='$harga_paket', total_tagihan='$jumlah_tagihan' WHERE id_daftar_pesanan = $id_daftar_pesanan";

    mysqli_query($conn, $sql);

    header("Location: list_pemesanan.php");
}
