<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-header">
                <h3>Admin Baru</h3>
            </div>

            <form action="<?php echo base_url().'admin/edit' ?>" method="post">
            <input type="hidden" name="nama_admin" value="<?= $admin['nama_admin']; ?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_admin" class="form-control" value="<?= $admin['nama_admin']; ?>" readonly>
                    <?php //echo form_error('nama'); ?>
                </div>
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input name="no_hp" class="form-control" value="<?= $admin['no_hp']; ?>"></input>
                </div>

                <div class="form-group">
                    <label>Usernamed</label>
                    <input name="username" class="form-control" value="<?= $admin['username']; ?>"></input>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" value="<?= $admin['password']; ?>"></input>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input name="jk" class="form-control" value="<?= $admin['jk']; ?>"></input>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" value="<?= $admin['alamat']; ?>"></input>
                </div>


                


                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>