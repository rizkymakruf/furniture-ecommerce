<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="mx-auto">
            <div class="card mb-3">

                <div class="card-header">
                    <div class="float-start">
                        <h3>Pengguna</h3>
                    </div>

                    <div class="float-end">
                        <form action="<?= base_url("user/search") ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url("user/reset") ?>" class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pengguna</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($content as $row) : $no++; ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <p>
                                            <img src="<?= $row->image ? base_url("images/user/$row->image") : base_url("images/user/avatar.jpg") ?>" alt="" height="50">
                                            <?= $row->name ?>
                                        </p>
                                    </td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->role ?></td>
                                    <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                                    <td>
                                        <?= form_open(base_url("user/delete/$row->id"), ['method' => 'POST']) ?>
                                        <?= form_hidden('id', $row->id) ?>
                                        <a href="<?= base_url("user/edit/$row->id") ?>" class="btn btn-sm">
                                            <i class="fas fa-edit text-info"></i>
                                        </a>
                                        <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <div class="card-footer">
                        <div class="float-start">
                            <nav aria-label="Page navigation example">
                                <?= $pagination ?>
                            </nav>
                        </div>
                        <div class="float-end">
                            <a href="<?= base_url('user/print') ?>" target="popup">
                                <button class="btn btn-success">
                                    <i class="fa fa-print" aria-hidden="true"></i> Print Users
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>