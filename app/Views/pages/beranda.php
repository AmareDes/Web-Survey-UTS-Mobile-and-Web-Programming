<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="text">
            <h2>Biodata Aldi Putra Widyansyah</h2>
            <p>UNIVERSITAS ISLAM NEGERI SUNAN AMPEL SURABAYA</p>

            <br>
            <img src="https://media.licdn.com/dms/image/C4E03AQHf3yFnx4pR_w/profile-displayphoto-shrink_200_200/0/1637392568071?e=1686182400&v=beta&t=kuY7qAAlLAGOkc0N_6YnTMcfBJd_isOmoWbZWyimECM" alt="fotoku">
            <br>

            <?php

            $nama = "Aldi Putra Widyansyah";
            $umur = 20;
            $pekerjaan = "Mahasiswa";
            $alamat = "Tebel Barat RT 01 RW 01";


            echo "<p>Nama: " . $nama . "</p>";
            echo "<p>Umur: " . $umur . "</p>";
            echo "<p>Pekerjaan: " . $pekerjaan . "</p>";
            echo "<p>Alamat: " . $alamat . "</p>";

            ?>

            <?php
            echo "<p>Sekarang tanggal: " . date("d M Y") . "</p>";
            ?>

        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>