<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-header">
                <h3>Data Admin</h3>
            </div>
            <a href="<?= base_url('admin/create'); ?>" class="btn btn-primary btn-sm"><span
                    class="glyphicon glyphicon-plus"></span> Tambah Admin</a>
            <br /><br />
            <?php if (session()->getFlashdata('Pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('Pesan'); ?>
                </div>
            <?php endif; ?><br />

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama Admin</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>

                    <?php foreach ($admin as $s): ?>
                        <tr>
                            <td><?= $s['nama_admin']; ?></td>
                            <td><?= $s['umur']; ?></td>
                            <td>
                            <form action="<?php echo '/ci4/public/admin/edit/' . $s['nama_admin']; ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                 <input type="hidden" name="_method" value="edit">
                  <button type="submit" class="btn btn-primary btn-sm btn-edit" onclick="return confirm('Apakah yakin ingin mengedit?');">Edit</button>
                    </form>
                                <form action="<?= base_url('admin/delete/' . $s['nama_admin']); ?>" method="post"
                                    class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete"
                                        onclick="return confirm('Apakah yakin ingin menghapus?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
