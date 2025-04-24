<?php
include_once("connection.php");

$aktif_menu = "form_pendaftaran";

include_once("header.php");


function selectedPaketWisata($val1, $val2)
{
    $result = "";
    if ($val1 == $val2) {
        $result = "selected";
    }
    return $result;
}

if ($_GET) {
    $id_paket_wisata = $_GET['id_paket_wisata'];
} else {
    $id_paket_wisata = 1;
}
$sql_selected_paket = "SELECT * FROM paket_wisata WHERE id_paket_wisata = $id_paket_wisata";

$selected_paket = mysqli_query($conn, $sql_selected_paket);

while ($row = mysqli_fetch_array($selected_paket)) {
    $kode_paket_wisata = $row['id_paket_wisata'];
    $nama_paket = $row['nama_paket'];
    $harga_penginapan = $row['harga_penginapan'];
    $harga_transportasi = $row['harga_transportasi'];
    $harga_makan = $row['harga_servis_makan'];
}

?>
<div class="form-container">
    <h2>Form Pemesanan Paket Wisata</h2>
    <form action="proses_tambah.php" method="post">
        <label for="nama_paket">Nama Paket:</label>
        <select name="nama_paket" id="nama_paket">
            <?php

            $sql = "SELECT * FROM paket_wisata";

            $results = mysqli_query($conn, $sql);

            while ($data_paket = mysqli_fetch_array($results)) {
            ?>
                <option
                    value="<?php echo $data_paket['id_paket_wisata'] ?>"
                    <?php

                    echo selectedPaketWisata($data_paket['nama_paket'], $nama_paket);
                    ?>>
                    <?php echo $data_paket['nama_paket'] ?>
                </option>
            <?php
            }
            ?>
        </select>

        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" name="nama_pemesan" id="nama_pemesan" required>

        <label for="no_tlp">Nomor HP/Telp:</label>
        <input type="text" name="no_tlp" id="no_tlp" required>

        <label for="tgl_pesan">Tanggal Pesan:</label>
        <input type="date" name="tgl_pesan" id="tgl_pesan" required>

        <label for="jumlah_hari">Waktu Pelaksanaan Perjalanan:</label>
        <input type="number" name="jumlah_hari" id="jumlah_hari" value="1">

        <label for="">Pelayanan Paket Perjalanan:</label>

        <div class="layanan-container">
            <div class="item-layanan">
                <label for="layanan_penginapan">Penginapan <?php
                                                            echo " " . number_format($harga_penginapan, 0, ',', '.'); ?></label>
                <input type="checkbox" name="layanan_penginapan" id="layanan_penginapan" value="<?php echo $harga_penginapan; ?>" checked>
            </div>

            <div class="item-layanan">
                <label for="layanan_transportasi">Transportasi <?php
                                                                echo " " . number_format($harga_transportasi, 0, ',', '.'); ?></label>
                <input type="checkbox" name="layanan_transportasi" id="layanan_transportasi" value="<?php echo $harga_transportasi; ?>" checked>
            </div>

            <div class="item-layanan">
                <label for="layanan_makan">Servis/Makan <?php
                                                        echo " " . number_format($harga_makan, 0, ',', '.'); ?></label>
                <input type="checkbox" name="layanan_makan" id="layanan_makan" value="<?php echo $harga_makan; ?>" checked>
            </div>
        </div>

        <label for="">Makanan</label>

        <label for="jumlah_peserta">Jumlah Peserta:</label>
        <input type="number" name="jumlah_peserta" id="jumlah_peserta" value="1">

        <label for="harga_paket">Harga Paket Perjalanan:</label>
        <input type="text" name="harga_paket" id="harga_paket" required>

        <label for="jumlah_tagihan">Jumlah Tagihan:</label>
        <input type="text" name="jumlah_tagihan" id="jumlah_tagihan" required>

        <div class="btn-container">
            <input type="submit" value="Simpan">
            <button id="btn-hitung">Hitung</button>
            <button id="btn-reset">Reset</button>
        </div>
    </form>
</div>
<?php
include_once("footer.php");
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        function perhitungan() {
            var harga_penginapan = 0;
            var harga_transportasi = 0;
            var harga_makan = 0;

            if ($("#layanan_penginapan").is(':checked')) {
                harga_penginapan = $("#layanan_penginapan").val();
            }

            if ($("#layanan_transportasi").is(':checked')) {
                harga_transportasi = $("#layanan_transportasi").val();
            }

            if ($("#layanan_makan").is(':checked')) {
                harga_makan = $("#layanan_makan ").val();
            }

            jumlah_hari = $("#jumlah_hari").val();

            jumlah_peserta = $("#jumlah_peserta").val();

            if (jumlah_peserta < 1) {
                alert("Jumlah Peserta minimal 1");
                $("#jumlah_peserta").val("1");
                jumlah_peserta = $("#jumlah_peserta").val();
            }

            if (jumlah_hari < 1) {
                alert("Jumlah Hari minimal 1");
                $("#jumlah_hari").val("1");
                jumlah_peserta = $("#jumlah_hari").val();
            }

            if (parseInt(harga_transportasi) == 0) {
                alert("Wajib menyertakan Paket Transportasi");
                $('#layanan_transportasi').prop('checked', true);
                harga_transportasi = $("#layanan_transportasi").val();
            }

            var harga_paket = parseInt(harga_penginapan) + parseInt(harga_transportasi) + parseInt(harga_makan);

            var harga_paket_formated = harga_paket.toLocaleString('de-DE');

            var jumlah_tagihan = harga_paket * parseInt(jumlah_hari) * parseInt(jumlah_peserta);

            var jumlah_tagihan_formated = jumlah_tagihan.toLocaleString('de-DE');

            $("#harga_paket").val(harga_paket_formated);
            $("#jumlah_tagihan").val(jumlah_tagihan_formated);
        }

        $("#nama_paket").on('change', function() {
            //alert("test");
            var idPaket = $(this).val();

            if (idPaket) {
                window.location.href = 'form_pendaftaran.php?id_paket_wisata=' + idPaket;
            }
        });

        $("#btn-hitung").on('click', function() {
            event.preventDefault();
            perhitungan();
        });

        $("#jumlah_peserta").on('change', function() {
            perhitungan();
        });

        $("#jumlah_hari").on('change', function() {
            perhitungan();
        });

        $("#layanan_transportasi").on('change', function() {
            perhitungan();
        });

        $("#layanan_penginapan").on('change', function() {
            perhitungan();
        });

        $("#layanan_makan").on('change', function() {
            perhitungan();
        });

        $("#btn-reset").on('click', function() {
            event.preventDefault();
            $('#harga_paket').val("");
            $('#jumlah_tagihan').val("");
            $('#nama_pemesan').val("");
            $('#tgl_pesan').val("");
            $('#no_tlp').val("");
            $('#jumlah_hari').val("1");
            $('#jumlah_peserta').val("1");
            $('#layanan_penginapan').prop('checked', true);
            $('#layanan_transportasi').prop('checked', true);
            $('#layanan_makan').prop('checked', true);
        });
    });
</script>