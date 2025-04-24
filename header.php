<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Banda Neira</title>
</head>

<body>
    <?php
    function renderAktifMenu($val1, $val2)
    {
        $result = "";
        if ($val1 == $val2) {
            $result = "active-menu";
        }
        return $result;
    }
    ?>
    <div class="main-container">
        <div class="img-header">
            <div class="brand-container">
                <h1>Wisata Banda Neira</h1>
                <h2>Jangan mati sebelum ke Banda Neira</h2>
                <img src="assets/images/logo-banda-neira.png" alt="Logo Banda Neira">
            </div>

            <img src="assets/images/benteng-belgica.png" alt="Benteng Belgica">
            <img src="assets/images/pulau-pisang.png" alt="Pulau Pisang">
            <img src="assets/images/rumah-budaya-banda-neira.png" alt="Rumah Budaya Banda Neira">
            <img src="assets/images/rumah-pengasingan-bung-hatta.png" alt="Rumah Pengasingan Bung Hatta">
            <img src="assets/images/benteng-nassau.png" alt="Benteng Nassau">
            <img src="assets/images/pulau-nailaka.png" alt="Pulau Nailaka">
            <img src="assets/images/pulau-rozengain.png" alt="Pulau Rozengain">
            <img src="assets/images/gunung-api-banda.png" alt="Gunung Api Banda">
            <img src="assets/images/istana-mini-banda-neira.png" alt="Istana Mini Banda Neira">
            <img src="assets/images/lava-flow.png" alt="Lava Flow">
        </div>

        <div class="menu-header">
            <a class="<?php echo renderAktifMenu($aktif_menu, "beranda"); ?>" href="index.php">Beranda</a>
            <a class="<?php echo renderAktifMenu($aktif_menu, "form_pendaftaran"); ?>" href="form_pendaftaran.php">Daftar Paket Wisata</a>
            <a class="<?php echo renderAktifMenu($aktif_menu, "list_pendaftaran"); ?>" href="list_pemesanan.php">Modifikasi Pesanan</a>
        </div>