<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-success">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Akun</h4>
                </div>
                <div class="col-md-6">
                    <button href="<?= base_url('index.php/admin/tambahAkun') ?>" class="btn btn-success btn-icon-split float-right" data-toggle="modal" data-target="#modal-tambah-akun">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Akun</span>
                    </button>
                </div>
            </div>
            <hr>
            <table id="table-akun" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th scope="col" width="20%">Username</th>
                        <th scope="col" width="60%">Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($akun as $a) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($a->username) ?></td>
                            <td><?= strip_tags($a->role) ?></td>
                            <td align="center">
                                <button class="btn btn-outline-warning btn-sm confirm-edit" data-id="<?= $a->id_user ?>" data-username="<?= $a->username ?>" data-toggle="modal" data-target="#modal-edit-akunn"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $a->id_user ?>" data-username="<?= $a->username ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-tambah-akun" tabindex="-1" role="dialog" aria-labelledby="modalTambahAkun" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAkun">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/admin/tambahAkun'), ['id' => 'tambahAkun']); ?>
                <div class="form-group">
                    <?= form_label('Username', 'username', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control', 'value' => strip_tags($username), 'readonly' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('username'); ?></small>
                </div>
                <?= form_label('Role', 'role', ['class' => 'h6']); ?>
                <?= form_dropdown('role', $role, '', [
                    'id' => 'role',
                    'class' => 'form-control chosen schosen-select',
                    'selected' => set_value('role'),
                ]); ?>
                <small class="form-text text-danger ml-3"><?= form_error('role'); ?></small>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <?= form_submit('btnTambahAkun', 'Simpan', ['class' => 'btn btn-outline-success float-right']); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-edit-akun" tabindex="-1" role="dialog" aria-labelledby="modalEditAkun" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAkun">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('index.php/admin/editAkun'), ['id' => 'editAkun']); ?>
                <input type="hidden" id="id-user" name="id-user">
                <div class="form-group">
                    <?= form_label('Username', 'username-edit', ['class' => 'h6']); ?>
                    <?= form_input(['name' => 'username-edit', 'id' => 'username-edit', 'class' => 'form-control', 'readonly' => 'on']); ?>
                    <small class="form-text text-danger ml-3"><?= form_error('username-edit'); ?></small>
                </div>
                <div class="form-group">
                    <?= form_label('Role', 'role-edit', ['class' => 'h6']); ?>
                    <div id="role-dropdown">


                    </div>

                    <small class="form-text text-danger ml-3"><?= form_error('role-edit'); ?></small>
                </div>
            </div>
            <div class="modal-footer footer-edit">
                <button class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Kembali</button>
                <?= form_submit('btnEditAkun', 'Simpan', ['class' => 'btn btn-outline-success float-right', 'id' => 'btnEditAkun']); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>





<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-akun').DataTable();

        $('.confirm-edit').click(function(e) {
            e.preventDefault();
            id = $(this).data('id');
            $('#modal-edit-akun').modal('show');

            $.ajax({
                url: '<?= base_url("index.php/admin/getAkun") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                success: function(data) {

                    $('#id-user').val(data.akun.id_user);
                    $('#role-edit').val(data.akun.role_id);
                    $('#username-edit').val(data.akun.username);
                    if (data.akun.role_id == '3') {
                        $('#role-dropdown').html('<input type="text" disabled class="form-control" value="Role tidak bisa diedit">');
                    } else {
                        var html = '<select class="form-control chosen schosen-select" id="role-edit" name="role-edit">';
                        Object.keys(data.role).forEach(function(key) {
                            // console.table('Key : ' + key + ', Value : ' + data[key])
                            html += '<option value="' + key + '">' + data.role[key] + '</option>';
                        })
                        html += '</select>';
                        $('#role-dropdown').html(html);
                        $('#role-edit').val(data.akun.role_id);
                    }
                }
            })

        });
    });

    $('.confirm-hapus').on('click', function() {
        Swal.fire({
            title: 'Hapus ' + $(this).data('username') + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                hapus($(this).data('id'));
            }
        })
    });

    function hapus(id) {
        $.ajax({
            url: '<?= base_url() ?>index.php/admin/hapusAkun/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('index.php/admin/akun') ?>';
            }
        });
    }
</script>