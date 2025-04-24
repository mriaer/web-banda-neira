<?php
if ($_POST) {
    include_once("connection.php");

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

    $sql = "INSERT INTO daftar_pesanan(id_paket_wisata, nama_pemesan, no_tlp, tanggal_pemesanan, jumlah_peserta, jumlah_hari, akomodasi, transportasi, makanan, harga_paket, total_tagihan) VALUES('$id_paket_wisata', '$nama_pemesan', '$no_tlp', '$tgl_pesan', '$jumlah_peserta', '$jumlah_hari', '$layanan_penginapan', '$layanan_transportasi', '$layanan_makan', '$harga_paket', '$jumlah_tagihan')";

    mysqli_query($conn, $sql);

    header("Location: list_pemesanan.php");
}
