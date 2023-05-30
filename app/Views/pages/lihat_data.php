<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>

<html>

<style type="text/css">
    .back {
        background-color: aliceblue;
        padding: 5px;
    }

    label {
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: rgb(17, 133, 133);
        font-style: italic;
        font-weight: bold;
    }

    .style1 {
        color: rgba(64, 64, 243, 0.795);
        font-style: oblique;
    }

    .style2 {
        color: rgba(27, 27, 21, 0.795);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>

<div>

    <h1 class="style2">Data Survey</h1>
    <table border="2" cellpadding="10" cellspacing="1">
        <tr bgcolor="yellow">
            <th rowspan="1">Judul Survey</th>
            <th rowspan="1">Tanggal Pembuatan</th>
            <th rowspan="1">Tipe Hiburan</th>
            <th rowspan="1">Deskripsi</th>
            <th rowspan="1">Pertanyaan</th>
            <th rowspan="1">Jawaban</th>
        </tr>

        <?php
        $db = new mysqli("localhost", "root", "", "uts_survey");
        $result = $db->query("SELECT ds.JUDUL_SURVEY, ds.TANGGAL_PEMBUATAN, ds.TIPE_HIBURAN, ds.DESKRIPSI, dp.PERTANYAAN, dj.JAWABAN FROM data_survey ds LEFT JOIN data_pertanyaan dp ON ds.ID_SURVEY = dp.ID_SURVEY LEFT JOIN data_jawaban dj ON dp.ID_SURVEY = dj.ID_SURVEY");

        if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        foreach ($result as $row) {
            //echo $row ["JUDUL_SURVEY"]."<br>";

        ?>

            <tr>
                <td><?php echo $row["JUDUL_SURVEY"]; ?></td>
                <td><?php echo $row["TANGGAL_PEMBUATAN"]; ?></td>
                <td><?php echo $row["TIPE_HIBURAN"]; ?><br></td>
                <td><?php echo $row["DESKRIPSI"] ?></td>
                <td><?php echo $row["PERTANYAAN"] ?></td>
                <td><?php echo $row["JAWABAN"] ?></td>
            </tr>

        <?php } ?>
</div>

</html>

<?= $this->endSection('konten'); ?>