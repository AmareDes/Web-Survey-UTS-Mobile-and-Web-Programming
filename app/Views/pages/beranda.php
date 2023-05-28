<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="text">
            <h2>Web Survey</h2>
            <p>SURVEY BERBAGAI HIBURAN (JANGAN DIPERCAYA KARENA NGARANG)</p>

            <br>
            <img src="https://cor-cdn-static.bibliocommons.com/list_jacket_covers/live/1406410977.png" alt="fotoanime">
            <br>

            <?php
            echo "<p>Sekarang tanggal: " . date("d M Y") . "</p>";
            ?>

        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>