<body onload="window.print()">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Pengguna</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($content as $row) : $no++; ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->id ?></td>
                        <td>
                            <p>
                                <img src="<?= $row->image ? base_url("images/user/$row->image") : base_url("images/user/avatar.jpg") ?>" alt="" height="50">
                                <?= $row->name ?>
                            </p>
                        </td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->role ?></td>
                        <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>