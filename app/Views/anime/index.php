<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4">Anime List</h2>
            <a href="/Anime/create" class="btn btn-primary mb-3">+ Add Anime</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pict</th>
                        <th scope="col">Title</th>
                        <th scope="col">Act</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($anime as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $a['sampul']; ?>" class="pict"></td>
                            <td><?= $a['judul']; ?></td>
                            <td><a href="/anime/<?= $a['slug']; ?>" class="btn btn-primary">Detailed</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>