<?= $this->extend('layout/template'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1>Daftar Survei</h1>

            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr bgcolor="yellow">
                        <th>Judul Survey</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                        <th>Pertanyaan</th>
                        <th>Tipe Pertanyaan</th>
                        <th>Jawaban</th>
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
                                    <?php foreach ($survey['pertanyaan'] as $pertanyaan) : ?>
                                        <?= $pertanyaan['pertanyaan'] ?><br>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($survey['pertanyaan'] as $pertanyaan) : ?>
                                        <?= $pertanyaan['tipe_pertanyaan'] ?><br>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($survey['pertanyaan'] as $pertanyaan) : ?>
                                        <?php if ($pertanyaan['tipe_pertanyaan'] === 'jawaban_pendek') : ?>
                                            <?= $pertanyaan['jawaban'] ?><br>
                                        <?php elseif ($pertanyaan['tipe_pertanyaan'] === 'skala_likert') : ?>
                                            <?php foreach ($pertanyaan['jawaban'] as $likert) : ?>
                                                <?= $likert ?><br>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">Tidak ada survei yang tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <a href="/pages/survey">Buat Survei Baru</a>
        </div>
    </div>
</div>
