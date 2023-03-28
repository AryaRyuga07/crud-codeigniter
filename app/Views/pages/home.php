<?= $this->extend('layout/template'); ?> 
 
    <?= $this->section('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-3">Welcome Master</h2>
                <?= $test[0] ?>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>