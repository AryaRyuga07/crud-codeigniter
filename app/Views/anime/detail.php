<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4">Anime Detailed</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $anime['sampul']; ?>" class="img-fluid rounded mt-5 mx-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fs-3"><?= $anime['judul']; ?></h5>
                            <p class="card-text"> <b>Studio : </b> <?= $anime['studio']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Genre : </b><?= $anime['genre']; ?></small></p>

                            <a href="/Anime/edit/<?= $anime['slug']; ?>" class="btn btn-primary">Edit</a>

                            <form action="/Anime/<?= $anime['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this data?')">Delete</button>
                            </form>
                            <br><br>
                            <a href="/anime" class="btn btn-info">Back to Menu</a>
                        </div>
                    </div>
                </div>
            </div>
            <audio controls style="width: 545px;">
                <source src="/audio/<?= $anime['audio']; ?>" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>