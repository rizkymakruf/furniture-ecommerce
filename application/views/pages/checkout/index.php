<html>
<title>Checkout</title>

<head>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-inGq5pwckQ2LxcXi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Checkout
                </div>
                <div class="card-body">
                    <form id="payment-form" method="POST" action="<?= site_url('/snap/finish') ?>">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">

                        <div class="form-group pb-3">
                            <label for="">Nama Penerima</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penerima" value="" required>
                        </div>


                        <div class="form-group pb-3">
                            <label for="">Alamat Lengkap Tujuan</label>
                            <textarea name="alamat1" id="alamat1" cols="30" rows="5" class="form-control" placeholder="Example : Rt 01, Rw 02, Jl Anggrek, Sleman, Yogyakarta" required></textarea>
                        </div>

                        <!-- API raja ongkir -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <select name="nama_provinsi" id="" class="form-control" required>
                                        <!-- Menggunakan javascript -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Kota</label>
                                    <select name="nama_distrik" id="" class="form-control" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Ekspedisi</label>
                                    <select name="nama_ekspedisi" id="" class="form-control" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Paket</label>
                                    <select name="nama_paket" id="" class="form-control" required>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <?php $qty = array_sum(array_column($cart, 'qty')) ?>
                        <?php foreach ($cart as $row) { ?>
                            <?php $total_weight = ($qty * $row->weight) * 1000 ?>
                        <?php } ?>

                        <!-- JIKA BERAT LEBIH 30KG -->
                        <?php if ($total_weight >= 30000) { ?>
                            <?php $total_weight = 30000 ?>
                        <?php } ?>

                        <!-- <input type="text" readonly name="kodepos">
                    <input type="text" readonly name="distrik">
                    <input type="text" readonly name="provinsi">
                    <input type="text" readonly name="tipe">
                    <input type="text" readonly name="ekspedisi">
                    <input type="text" readonly name="paket"> -->


                        <!-- TOTAL BERAT -->
                        <input type="hidden" readonly name="total_berat" value="<?= $total_weight; ?>">

                        <!-- INPUT TUJUAN -->
                        <div class="">
                            <label for="alamat">Tujuan</label>
                            <input type="text" readonly name="alamat" id="alamat" class="form-control">
                        </div>

                        <!-- INPUT PAKET EKSPEDISI -->
                        <div class="">
                            <label for="pkt">Ekspedisi</label>
                            <input type="text" readonly name="pkt" id="pkt" class="form-control" onFocus="startCalc();" onBlur="stopCalc();">
                        </div>

                        <!--  END API  -->

                        <div class="form-group pb-3">
                            <label for="">Custom Barang?</label>
                            <textarea name="custom" id="custom" cols="30" rows="5" class="form-control" placeholder="Contoh : Custom warna merah, tinggi 1.2M"></textarea>
                            <small>*Boleh kosong</small>
                        </div>

                        <div class="form-group pb-3">
                            <label for="">E-Mail Penerima</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan E-mail telepon penerima" required>
                        </div>

                        <div class="form-group pb-3">
                            <label for="">No. Hp Penerima</label>
                            <input type="text" name="telp" class="form-control" id="telp" placeholder="Masukkan nomor telepon penerima" required>
                        </div>

                        <!-- input sub total -->
                        <input type="hidden" name="jmlbayar" id="jmlbayar" value="<?= array_sum(array_column($cart, 'subtotal')) ?>">

                        <!-- Input jumlah ongkir -->
                        <input type="hidden" readonly id="ongkir" name="ongkir">

                        <!-- input nilai qty -->
                        <?php $qty = array_sum(array_column($cart, 'qty')) ?>
                        <input type="hidden" name="qty" id="qty" value="<?= $qty; ?>">

                        <?php $cost = array_sum(array_column($cart, 'production_cost')) ?>
                        <!-- input nilai cost -->
                        <input type="hidden" name="cost" id="cost" value="<?= $cost; ?>">

                        <!-- input nilai item product -->
                        <?php foreach ($cart as $row) { ?>
                            <?php $items[] = $row->title ?>
                        <?php } ?>
                        <?php $title = implode(", ", $items) ?>
                        <input type="hidden" name="product_title" id="product_title" value="<?= $title; ?>">
                        <hr>
                        <small style="color: blue;">*Jika data belum lengkap, maka tidak akan diproses!</small><br>
                        <button id="pay-button" class="btn btn-success" style="font-weight: bold; width: 200px;">
                            <i class="fas fa-dollar-sign"></i> Bayar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 p-2">
                    <div class="card mb-3">
                        <div class="card-header">
                            Rincian
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Jumlah Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->qty ?></td>
                                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php $total_weight = array_sum(array_column($cart, 'weight')) ?>
                                    <tr>
                                        <td>Total Berat</td>
                                        <td></td>
                                        <td><?= $total_weight; ?> Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Ongkir</td>
                                        <td></td>
                                        <td>
                                            <input type="text" readonly id="jumongkir" name="jumongkir" style="border: none; width: 110px;">
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'dataprovinsi.php',
                success: function(hasil_provinsi) {
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });

            $("select[name=nama_provinsi]").on("change", function() {
                // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: 'post',
                    url: 'datadistrik.php',
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_distrik) {
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                })
            });

            $.ajax({
                type: 'post',
                url: 'jasaekspedisi.php',
                success: function(hasil_ekspedisi) {
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });

            $("select[name=nama_ekspedisi]").on("change", function() {
                // Mendapatkan data ongkos kirim

                // Mendapatkan ekspedisi yang dipilih
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                // Mendapatkan id_distrik yang dipilih
                var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
                // Mendapatkan toatal berat dari inputan
                $total_berat = $("input[name=total_berat]").val();
                $.ajax({
                    type: 'post',
                    url: 'datapaket.php',
                    data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + $total_berat,
                    success: function(hasil_paket) {
                        // console.log(hasil_paket);
                        $("select[name=nama_paket]").html(hasil_paket);

                        // Meletakkan nama ekspedisi terpilih di input ekspedisi
                        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    }
                })
            });

            $("select[name=nama_distrik]").on("change", function() {
                var prov = $("option:selected", this).attr('nama_provinsi');
                var dist = $("option:selected", this).attr('nama_distrik');
                var tipe = $("option:selected", this).attr('tipe_distrik');
                var kodepos = $("option:selected", this).attr('kodepos');

                var almt = kodepos + ", " + tipe + ", " + dist + ", " + prov;

                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dist);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
                $("input[name=alamat]").val(almt);
            });

            $("select[name=nama_paket]").on("change", function() {
                var paket = $("option:selected", this).attr("paket");
                var ongkir = $("option:selected", this).attr("ongkir");
                var jumongkir = "Rp " + $("option:selected", this).attr("ongkir");
                var etd = $("option:selected", this).attr("etd");
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();

                var pakt = ekspedisi_terpilih.toUpperCase() + ", " + paket + ", " + "Rp." + ongkir + ", " + "Estimasi : " + etd + " hari";

                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=jumongkir]").val(jumongkir);
                $("input[name=estimasi]").val(etd);
                $("input[name=pkt]").val(pakt);

            })
        });


        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            var nama = $("#nama").val();
            var alamat1 = $("#alamat1").val();
            var telp = $("#telp").val();
            var custom = $("#custom").val();
            var email = $("#email").val();
            var jmlbayar = $("#jmlbayar").val();
            var qty = $("#qty").val();
            var product_title = $("#product_title").val();
            var ongkir = $("#ongkir").val();
            var alamat = $("#alamat").val();
            var pkt = $("#pkt").val();
            var cost = $("#cost").val();

            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>/snap/token',
                data: {
                    nama: nama,
                    alamat1: alamat,
                    telp: telp,
                    email: email,
                    custom: custom,
                    jmlbayar: jmlbayar,
                    qty: qty,
                    product_title: product_title,
                    ongkir: ongkir,
                    alamat: alamat,
                    pkt: pkt,
                    cost: cost
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>

</main>