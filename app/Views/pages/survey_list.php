<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <h1>Daftar Survei</h1>

            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($surveys) && count($surveys) > 0) : ?>
                        <?php foreach ($surveys as $survey) : ?>
                            <tr>
                                <td><?= $survey['judul_survey'] ?></td>
                                <td><?= $survey['deskripsi'] ?></td>
                                <td><?= $survey['tanggal_dibuat'] ?></td>
                                <td>
                                    <a href="/survey/edit/<?= $survey['id_survey'] ?>">Edit</a>
                                    <a href="/survey/delete/<?= $survey['id_survey'] ?>">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <h4>Pertanyaan</h4>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Pertanyaan</th>
                                                <th>Tipe Pertanyaan</th>
                                                <th>Jawaban</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($survey['pertanyaan'] as $survey) : ?>
                                                <tr>
                                                    <td><?= $survey['pertanyaan'] ?></td>
                                                    <td><?= $survey['tipe_pertanyaan'] ?></td>
                                                    <td>
                                                        <?php if ($survey['tipe_pertanyaan'] === 'jawaban_pendek') : ?>
                                                            <?= $survey['jawaban_pendek'] ?>
                                                        <?php elseif ($survey['tipe_pertanyaan'] === 'skala_likert') : ?>
                                                            <?php foreach ($survey['skala_likert'] as $likert) : ?>
                                                                <button><?= $likert ?></button>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">Tidak ada survei yang tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <a href="/pages/survey">Buat Survei Baru</a>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>