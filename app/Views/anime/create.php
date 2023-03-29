<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Add Anime Form</h2>

            <form action="/Anime/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control <?= (validation_show_error('judul') ? 'is-invalid' : ''); ?>" id="inputTitle" autofocus autocomplete="off" value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('judul') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputStudio" class="col-sm-2 col-form-label">Studio</label>
                    <div class="col-sm-10">
                        <input type="text" name="studio" class="form-control" id="inputStudio" autocomplete="off" value="<?= old('studio'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputGenre" class="col-sm-2 col-form-label">Genre</label>
                    <div class="col-sm-10">
                        <input type="text" name="genre" class="form-control" id="inputGenre" autocomplete="off" value="<?= old('genre'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputImg" class="col-sm-2 col-form-label">Img</label>
                    <div class="col-sm-2">
                        <img src="/img/def.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control <?= (validation_show_error('image') ? 'is-invalid' : ''); ?>"" id="inputImg" onchange="preview()">
                            <div class="invalid-feedback">
                                <?= validation_show_error('image') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputAudio" class="col-sm-2 col-form-label">Audio</label>
                    <div class="col-sm-10">
                        <input type="text" name="audio" class="form-control" id="inputAudio" autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Data</button></button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>