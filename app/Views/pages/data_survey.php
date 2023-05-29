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

<head>
    <title>Formulir Pendaftaran Siswa - Aldi Putra Widyansyah</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body style="background-image: url(https://t3.ftcdn.net/jpg/03/55/60/70/360_F_355607062_zYMS8jaz4SfoykpWz5oViRVKL32IabTP.jpg);">
    <script language="javascript">
        function tampil() {
            alert(document.getElementById("JUDUL_SURVEY").value);
        }
    </script>
    <form method="post" enctype="multipart/form-data">
        <div>
            <fieldset class="back">
                <legend>
                    <h1 class="style1">Buat Survey</h1>
                </legend>
                <table>
                    <tr>
                        <td><label>Judul Survey</label></td>
                        <td>:</td>
                        <td><input type="text" name="JUDUL_SURVEY" id="JUDUL_SURVEY"></td>
                    </tr>

                    <tr>
                        <td><label>Tanggal Pembuatan</label></td>
                        <td>:</td>
                        <td>
                            <input type="date" name="TANGGAL_PEMBUATAN">
                        </td>
                    </tr>

                    <tr>
                        <td><label>Tipe Hiburan</label></td>
                        <td>:</td>
                        <td><select name="TIPE_HIBURAN">
                                <option value="anime">Anime</option>
                                <option value="komik">Komik</option>
                                <option value="movie">Film/Movie</option>
                                <option value="sinetron">Sinetron</option>
                                <option value="stand up">Stand Up</option>
                                <option value="vlog">Vlog</option>
                                <option value="mukbang">Mukbang</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label style="vertical-align: top;">Deskripsi</label></td>
                        <td>:</td>
                        <td><textarea name="DESKRIPSI" id="PERTANYAAN" cols="50" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td><label style="vertical-align: top;">Pertanyaan</label></td>
                        <td>:</td>
                        <td><textarea name="PERTANYAAN" id="PERTANYAAN" cols="50" rows="1"></textarea></td>
                    </tr>

                    <tr>
                        <td><label>Jawaban</label></td>
                        <td>:</td>
                        <td><input type="radio" name="JAWABAN" value="Sangat Jelek"> Sangat Jelek
                            <input type="radio" name="JAWABAN" value="Jelek"> Jelek
                            <input type="radio" name="JAWABAN" value="Netral"> Netral
                            <input type="radio" name="JAWABAN" value="Bagus"> Bagus
                            <input type="radio" name="JAWABAN" value="Sangat Bagus"> Sangat Bagus
                        </td>
                    </tr>

                    <tr>
                        <td><input type="submit" name="SUBMIT" value="SUBMIT"></td>
                    </tr>


                </table>
            </fieldset>
        </div>
    </form>
</body>
</table>
<?php
$db = new mysqli("localhost", "root", "", "codeigniter4");

if (isset($_POST['SUBMIT'])) {

    $nama_survey = $_POST['JUDUL_SURVEY'];
    $tanggal_pembuatan = $_POST['TANGGAL_PEMBUATAN'];
    $tipe_hiburan = $_POST['TIPE_HIBURAN'];
    $deskripsi_survey = $_POST['DESKRIPSI'];
    $pertanyaan_survey = $_POST['PERTANYAAN'];
    $jawaban_survey = $_POST['JAWABAN'];

    $sql = "INSERT INTO data_survey (JUDUL_SURVEY, TANGGAL_PEMBUATAN, TIPE_HIBURAN, DESKRIPSI, PERTANYAAN, JAWABAN)
        VALUES ('$nama_survey', '$tanggal_pembuatan', '$tipe_hiburan', '$deskripsi_survey', '$pertanyaan_survey', '$jawaban_survey')";


    if ($db->query($sql) === TRUE) {
        echo "Data telah tersimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}


$result = $db->query("SELECT * FROM data_survey");




if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
?>

</html>

<?= $this->endSection('konten'); ?>