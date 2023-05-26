<?= $this->extend('layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Daftar Anime Favorit</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="/img/Hunter x Hunter.jpeg" alt="" class="sampul"></td>
                        <td>Hunter x Hunter</td>
                        <td>
                            <a href="" class="btn btn-success">Detail Anime</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><img src="/img/One Piece.jpg" alt="" class="sampul"></td>
                        <td>One Piece</td>
                        <td>
                            <a href="" class="btn btn-success">Detail Anime</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><img src="/img/Solo Leveling.jpg" alt="" class="sampul"></td>
                        <td>Solo Leveling</td>
                        <td>
                            <a href="" class="btn btn-success">Detail Anime</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>