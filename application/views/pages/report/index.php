<main role="main" class="container" onload="window.print()">
    <?php $this->load->view('layouts/_alert') ?>
    <div class=" row">
        <di class="mx-auto">
            <h5>Laporan Penjualan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="card col m-1">
                        <div class="card-header">Filter By Tanggal</div>
                        <div class="card-body">
                            <form action="<?= base_url(); ?>Report/filter" method="POST" target="_blank">

                                <input type="hidden" name="nilaifilter" value="1">

                                <div class="row">
                                    <div class="col">
                                        <span>Tangal Awal</span><br>
                                        <input type="date" name="tanggalawal" required><br>
                                    </div>
                                    <div class="col">
                                        <span>Tangal Akhir</span><br>
                                        <input type="date" name="tanggalakhir" required>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="" id="" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </button>
                            </form>
                        </div>
                    </div>
                    <div class="card col m-1">
                        <div class="card-header">Filter By Bulan</div>
                        <div class="card-body">
                            <form action="<?= base_url(); ?>Report/filter" method="POST" target="_blank">

                                <input type="hidden" name="nilaifilter" value="2">

                                <div class="row">
                                    <div class="col">
                                        <span>Bulan Awal</span><br>
                                        <select name="bulanawal" id="" required>
                                            <option value="1">Januari</option>
                                            <option value="2">Febuari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <span>Bulan Akhir</span><br>
                                        <select name="bulanakhir" id="" required>
                                            <option value="1">Januari</option>
                                            <option value="2">Febuari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <span>Pilih Tahun</span>
                                        <select name="tahun1" id="" required>
                                            <?php foreach ($tahun as $row) : ?>
                                                <option value="<?= $row->tahun; ?>"><?= $row->tahun; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="" id="" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </button>
                            </form>
                        </div>
                    </div>
                    <div class="card col-2 m-1">
                        <div class="card-header">Lap. Pertahun</div>
                        <div class="card-body">
                            <form action="<?= base_url(); ?>Report/filter" method="POST" target="_blank">

                                <input type="hidden" name="nilaifilter" value="3">

                                <span>Pilih Tahun</span><br>
                                <select name="tahun2" id="" required>
                                    <?php foreach ($tahun as $row) : ?>

                                        <option value="<?= $row->tahun; ?>"><?= $row->tahun; ?></option>

                                    <?php endforeach ?>
                                </select><br>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="" id="" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</main>