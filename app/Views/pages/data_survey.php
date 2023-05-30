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
        function addQuestion() {
            var questionDiv = document.createElement("div");

            var questionLabel = document.createElement("label");
            questionLabel.innerHTML = "Pertanyaan";
            var questionInput = document.createElement("textarea");
            questionInput.setAttribute("name", "PERTANYAAN[]");
            questionInput.setAttribute("cols", "50");
            questionInput.setAttribute("rows", "1");

            questionDiv.appendChild(questionLabel);
            questionDiv.appendChild(document.createElement("br"));
            questionDiv.appendChild(questionInput);
            questionDiv.appendChild(document.createElement("br"));

            var removeButton = document.createElement("button");
            removeButton.innerHTML = "Hapus Pertanyaan";
            removeButton.setAttribute("type", "button");
            removeButton.setAttribute("onclick", "removeQuestion(this)");

            questionDiv.appendChild(removeButton);

            document.getElementById("questionsContainer").appendChild(questionDiv);
        }

        function removeQuestion(button) {
            var questionDiv = button.parentNode;
            questionDiv.parentNode.removeChild(questionDiv);
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
                        <td><textarea name="DESKRIPSI" cols="50" rows="5"></textarea></td>
                    </tr>

                    <tr>
                        <td><label style="vertical-align: top;">Pertanyaan</label></td>
                        <td>:</td>
                        <td id="questionsContainer">
                            <textarea name="PERTANYAAN[]" cols="50" rows="1"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td><button type="button" onclick="addQuestion()">Tambah Pertanyaan</button></td>
                        <td><input type="submit" name="SUBMIT" value="SUBMIT"></td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </form>
</body>

</html>


<?php
$db = new mysqli("localhost", "root", "", "uts_survey");

if (isset($_POST['SUBMIT'])) {

    $nama_survey = $_POST['JUDUL_SURVEY'];
    $tanggal_pembuatan = $_POST['TANGGAL_PEMBUATAN'];
    $tipe_hiburan = $_POST['TIPE_HIBURAN'];
    $deskripsi_survey = $_POST['DESKRIPSI'];
    $pertanyaan_survey = $_POST['PERTANYAAN'];

    // Loop through the questions and answers arrays to insert each question and answer
    foreach ($pertanyaan_survey as $key => $pertanyaan) {


        $sql = "INSERT INTO data_survey (JUDUL_SURVEY, TANGGAL_PEMBUATAN, TIPE_HIBURAN, DESKRIPSI)
            VALUES ('$nama_survey', '$tanggal_pembuatan', '$tipe_hiburan', '$deskripsi_survey')";

        if ($db->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $db->error;
        } else {
            $lastSurveyID = $db->insert_id; // Get the ID of the last inserted survey

            // Insert each question into data_pertanyaan table
            foreach ($pertanyaan_survey as $key => $pertanyaan) {
                $sql = "INSERT INTO data_pertanyaan (ID_SURVEY, PERTANYAAN)
                        VALUES ('$lastSurveyID', '$pertanyaan')";

                if ($db->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $db->error;
                }
            }

            echo "Data telah tersimpan";
            exit(header("Location: " . $_SERVER['REQUEST_URI']));
        }
    }

    echo "Data telah tersimpan";
    exit(header("Location: " . $_SERVER['REQUEST_URI']));
}


$result = $db->query("SELECT * FROM data_survey");

if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
?>

</html>


<?= $this->endSection('konten'); ?>