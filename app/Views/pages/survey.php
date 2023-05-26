<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Survey</h1>
            <br>

            <!-- Tambahkan kodingan untuk menampilkan form survei di sini -->
            <h2>Buat Survei Baru</h2>
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

                <!-- Tambahkan kodingan untuk pertanyaan -->
                <h3>Pertanyaan</h3>
                <div id="pertanyaan-container">
                    <div class="pertanyaan">
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
                <label><input type="radio" name="skala_likert[]" value="Sangat Tidak Setuju">Sangat Tidak Setuju</label><br>
                <label><input type="radio" name="skala_likert[]" value="Tidak Setuju">Tidak Setuju</label><br>
                <label><input type="radio" name="skala_likert[]" value="Netral">Netral</label><br>
                <label><input type="radio" name="skala_likert[]" value="Setuju">Setuju</label><br>
                <label><input type="radio" name="skala_likert[]" value="Sangat Setuju">Sangat Setuju</label><br><br>
            `;
            optionsDiv.appendChild(likertScaleDiv);
        }
    }

    function removeQuestion(buttonElement) {
        var questionDiv = buttonElement.parentNode;
        questionDiv.remove();
    }
</script>
<?= $this->endSection('konten'); ?>