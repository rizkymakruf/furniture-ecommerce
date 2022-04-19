<!DOCTYPE html>
<head>
  <title>Fitur Ongkos Kirim Menggunakan API RajaOngkir</title>
  <script src="jquery-3.6.0.min.js"></script>
</head>
<body>
<?php 
    //Get Data Provinsi
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "key:81d4424e2b099f8b8ea33708087f4b8c"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
?>
    <label>Provinsi</label><br>
    <select name='provinsi' id='provinsi'>";
        <option>Pilih Provinsi</option>
        <?php
        $get = json_decode($response, true);
        for ($i=0; $i < count($get['rajaongkir']['results']); $i++):
        ?>
            <option  value="<?php echo $get['rajaongkir']['results'][$i]['province_id']; ?>"  ><?php echo $get['rajaongkir']['results'][$i]['province']; ?></option>
        <?php endfor; ?>
    </select><br>

    <label>Kabupaten</label><br>
    <select id="kabupaten" name="kabupaten" >
    <!-- Data kabupaten akan diload menggunakan AJAX -->
    </select> <br>

    <label>Kurir</label><br>
    <select class="form-control" id="kurir" name="kurir" >
        <option value="">Pilih Kurir</option>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">POS INDONESIA</option>
    </select>

    <div id="tampil_ongkir"> </div>

    <script>
	$('#provinsi').change(function(){
 
        //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
        var prov = $('#provinsi').val();
        var nama_provinsi = $(this).attr("nama_provinsi");
        $.ajax({
            type : 'GET',
            url : 'ambil-kabupaten.php',
            data :  'prov_id=' + prov,
                success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                $("#kabupaten").html(data);
            }
        });
    });


    $('#kurir').change(function(){

        //Mengambil value dari option select provinsi asal, kabupaten, kurir kemudian parameternya dikirim menggunakan ajax
        var kab = $('#kabupaten').val();
        var kurir = $('#kurir').val();
   
        $.ajax({
            type : 'POST',
            url : 'tabel-ongkir.php',
            data :  {'kab_id' : kab, 'kurir' : kurir},
                success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam element div tampil_ongkir
                $("#tampil_ongkir").html(data);
            }
        });
    });

    </script>
</body>
</html>




