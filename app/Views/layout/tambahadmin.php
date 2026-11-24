<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-header">
                <h3>Admin Baru</h3>
            </div>

            <form action="<?= base_url('/admin/save') ?>" method="post">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="1" class="form-control">
                    <?php //echo form_error('nama'); ?>
                </div>
                <div class="form-group">
                    <label>No. Handphone</label>
                    <textarea name="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="3" class="form-control">
                    <?php //echo form_error('nama'); ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="4" class="form-control">
                    <?php //echo form_error('nama'); ?>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="4" class="form-control">
                    <?php //echo form_error('nama'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="4" class="form-control">
                    <?php //echo form_error('nama'); ?>
                </div>

                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
                
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
