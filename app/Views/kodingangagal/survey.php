<?= $this->extend('layout/template'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Survey</h1>
            <br>

            
            <!-- <h2>Buat Survei Baru</h2>
            <?php if (session()->has('success')) : ?>
                <div><?= session()->get('success') ?></div>
            <?php endif; ?>
            <form method="POST" action="/survey/store">
                <label for="title">Judul:</label><br>
                <input type="text" name="title" id="title" required><br><br>
                <label for="description">Deskripsi:</label><br>
                <textarea name="description" id="description" required></textarea><br><br>
                <label for="date">Tanggal Dibuat:</label><br>
                <input type="date" name="date" id="date" required><br><br>

                
                <h3>Pertanyaan</h3> -->
                <div id="pertanyaan-container">
                    <div class="pertanyaan">
                        <label for="pertanyaan">Pertanyaan:</label><br>
                        <input type="text" name="pertanyaan[]" required><br><br>
                        <label for="tipe_pertanyaan">Tipe Pertanyaan:</label><br>
                        <select name="tipe_pertanyaan[]" onchange="showOptions(this)" required>
                            <option value="">Pilih Tipe Pertanyaan</option>
                            <option value="skala_likert">Skala Likert</option>
                            <option value="jawaban_pendek">Jawaban Pendek</option>
                            
                        </select><br><br>
                        <div class="options"></div>
                        <input type="hidden" name="id_pertanyaan[]" value="">
                        <button type="button" onclick="removeQuestion(this)">Hapus</button>
                        <br><br>
                    </div>
                </div>

                <div id="post-container">
                    <div class="post">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $db = new mysqli("localhost", "root", "", "registrasi");

                            $judul = $_POST['title'];
                            $deskripsi = $_POST['description'];
                            $tanggal = $_POST['date'];

                            $sql = "INSERT INTO tabel_survey (judul_survey, deskripsi, tanggal_dibuat) VALUES ('$judul', '$deskripsi', '$tanggal')";

                            if ($db->query($sql) === TRUE) {
                                $survey_id = $db->insert_id;
                                echo "Data telah tersimpan";

                                if (isset($_POST['pertanyaan'])) {
                                    $pertanyaan = $_POST['pertanyaan'];
                                    $tipe_pertanyaan = $_POST['tipe_pertanyaan'];
                                    $jawaban_pendek = $_POST['jawaban_pendek'];
                                    $skala_likert = $_POST['skala_likert'];

                                    for ($i = 0; $i < count($pertanyaan); $i++) {
                                        $pertanyaan_value = $pertanyaan[$i];
                                        $tipe_pertanyaan_value = $tipe_pertanyaan[$i];
                                        $jawaban_pendek_value = isset($jawaban_pendek[$i]) ? $jawaban_pendek[$i] : "";
                                        $skala_likert_value = isset($skala_likert[$i]) ? $skala_likert[$i] : "";

                                        $sql_pertanyaan = "INSERT INTO tabel_pertanyaan (id_survey, pertanyaan, tipe_pertanyaan, jawaban_pendek, skala_likert) VALUES ($survey_id, '$pertanyaan_value', '$tipe_pertanyaan_value', '$jawaban_pendek_value', '$skala_likert_value')";

                                        if ($db->query($sql_pertanyaan) !== TRUE) {
                                            echo "Error: " . $sql_pertanyaan . "<br>" . $db->error;
                                        }
                                    }
                                }
                            } else {
                                echo "Error: " . $sql . "<br>" . $db->error;
                            }
                        }
                        ?>
                    </div>
                </div>
                <button type="button" onclick="addQuestion()">Tambah Pertanyaan</button>
                <br><br>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    function addQuestion() {
        var container = document.getElementById('pertanyaan-container');
        var pertanyaanDiv = document.createElement('div');
        pertanyaanDiv.className = 'pertanyaan';
        pertanyaanDiv.innerHTML = `
            <label for="pertanyaan">Pertanyaan:</label><br>
            <input type="text" name="pertanyaan[]" required><br><br>
            <label for="tipe_pertanyaan">Tipe Pertanyaan:</label><br>
            <select name="tipe_pertanyaan[]" onchange="showOptions(this)" required>
                <option value="">Pilih Tipe Pertanyaan</option>
                <option value="skala_likert">Skala Likert</option>
                <option value="jawaban_pendek">Jawaban Pendek</option>
                <!-- Tambahkan tipe pertanyaan lainnya jika diperlukan -->
            </select><br><br>
            <div class="options"></div>
            <input type="hidden" name="id_pertanyaan[]" value="">
            <button type="button" onclick="removeQuestion(this)">Hapus</button>
            <br><br>
        `;
        container.appendChild(pertanyaanDiv);
    }

    function showOptions(selectElement) {
        var optionsDiv = selectElement.parentNode.querySelector('.options');
        optionsDiv.innerHTML = '';

        if (selectElement.value === 'jawaban_pendek') {
            var jawabanInput = document.createElement('input');
            jawabanInput.type = 'text';
            jawabanInput.name = 'jawaban_pendek[]';
            jawabanInput.placeholder = 'Jawaban Pendek';
            optionsDiv.appendChild(jawabanInput);
        } else if (selectElement.value === 'skala_likert') {
            var likertScaleDiv = document.createElement('div');
            likertScaleDiv.className = 'likert-scale';
            likertScaleDiv.innerHTML = `
                <label for="likert">Skala Likert:</label><br>
                <label><input type="radio" name="skala_likert[]" value="Sangat Tidak Setuju">Sangat Tidak Setuju</label>
                <label><input type="radio" name="skala_likert[]" value="Tidak Setuju">Tidak Setuju</label>
                <label><input type="radio" name="skala_likert[]" value="Netral">Netral</label>
                <label><input type="radio" name="skala_likert[]" value="Setuju">Setuju</label>
                <label><input type="radio" name="skala_likert[]" value="Sangat Setuju">Sangat Setuju</label>
            `;
            optionsDiv.appendChild(likertScaleDiv);
        }
    }

    function removeQuestion(buttonElement) {
        var questionDiv = buttonElement.parentNode;
        questionDiv.remove();
    }
</script>
