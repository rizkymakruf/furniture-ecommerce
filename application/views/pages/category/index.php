<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header">

                    <div class="float-start">
                        <h3>Kategori</h3>
                    </div>

                    <div class="float-end">
                        <?= form_open(base_url('category/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>" aria-describedby="button-addon2">
                            <button class="btn" type="submit" id="button-addon2" style="background-color: tan; color: #5C3D2E;">
                                <i class="fas fa-search"></i>
                            </button>
                            <a href="<?= base_url("category/reset") ?>" class="btn" type="submit" id="button-addon2" style="background-color: tan; color: #5C3D2E;">
                                <i class="fas fa-eraser"></i>
                            </a>
                        </div>
                        <?= form_close() ?>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($content as $row) :  $no++; ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row->title ?></td>
                                    <td><?= $row->slug ?></td>
                                    <td>
                                        <?= form_open("category/delete/$row->id", ['method' => 'POST']) ?>
                                        <?= form_hidden('id', $row->id) ?>
                                        <a href="<?= base_url("category/edit/$row->id") ?>" class="btn btn-sm">
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
                            <a href="<?= base_url('category/create') ?>" class="">
                                <button type="submit" class="btn" style="background-color: tan; color: #5C3D2E;">
                                    <i class="fas fa-plus-circle"></i> Tambah
                                </button>
                            </a>
                        </div>
                        <div class="float-end">
                            <nav aria-label="Page navigation example">
                                <?= $pagination ?>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>