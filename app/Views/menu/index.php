<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="mt-4">Search & Pagination Test</h2>
            <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="keyword" autocomplete="off">
                <button class="input-group-text" name="submit">Search</button>
            </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
            <?php endif; ?>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (1 * ($currentPage - 1)); ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['jenis']; ?></td>
                            <td><a href="" class="btn btn-primary">Detailed</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('menu', 'menu_page'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>