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
    <form method="POST">
        <table border="2" cellpadding="10" cellspacing="1">
            <tr bgcolor="yellow">
                <th rowspan="1">Pertanyaan</th>
                <th colspan="10" style="text-align:center">Jawaban</th>
            </tr>

            <?php
            $db = new mysqli("localhost", "root", "", "uts_survey");
            $result = $db->query("SELECT * FROM data_pertanyaan");

            if (!$result) {
                printf("Error: %s\n", mysqli_error($db));
                exit();
            }
            foreach ($result as $row) {
                ?>

                <tr>
                    <td><?php echo $row["PERTANYAAN"] ?></td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="JAWABAN[<?php echo $row['ID_SURVEY']; ?>]" value="Sangat Jelek"> Sangat Jelek
                        <input type="radio" name="JAWABAN[<?php echo $row['ID_SURVEY']; ?>]" value="Jelek"> Jelek
                        <input type="radio" name="JAWABAN[<?php echo $row['ID_SURVEY']; ?>]" value="Netral"> Netral
                        <input type="radio" name="JAWABAN[<?php echo $row['ID_SURVEY']; ?>]" value="Bagus"> Bagus
                        <input type="radio" name="JAWABAN[<?php echo $row['ID_SURVEY']; ?>]" value="Sangat Bagus"> Sangat Bagus
                        <input type="hidden" name="ID_PERTANYAAN[<?php echo $row['ID_SURVEY']; ?>]" value="<?php echo $row['ID_PERTANYAAN']; ?>">
                    </td>
                </tr>
            <?php } ?>

            <tr>
                <td colspan="3"><input type="submit" name="SUBMIT" value="SUBMIT"></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (isset($_POST['SUBMIT'])) {
    $jawaban_survey = $_POST['JAWABAN'];
    $id_pertanyaan = $_POST['ID_PERTANYAAN'];

    $db = new mysqli("localhost", "root", "", "uts_survey");

    foreach ($jawaban_survey as $key => $jawaban) {
        $id_pertanyaan_current = $id_pertanyaan[$key];
        $sql = "INSERT INTO data_jawaban (ID_SURVEY, ID_PERTANYAAN, JAWABAN) VALUES ('$key', '$id_pertanyaan_current', '$jawaban')";

        if ($db->query($sql) === TRUE) {
            exit(header("Location: " . $_SERVER['REQUEST_URI']));
        } else {
            echo "<p>Error: " . $sql . "<br>" . $db->error . "</p>";
        }
    }
}
?>

</html>

<?= $this->endSection('konten'); ?>
