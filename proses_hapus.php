<?php
include_once("connection.php");

if ($_GET) {
    $id_daftar_pesanan = $_GET['id_daftar_pesanan'];

    $sql = "DELETE FROM daftar_pesanan WHERE id_daftar_pesanan = $id_daftar_pesanan";

    mysqli_query($conn, $sql);

    header("location: list_pemesanan.php");
}
