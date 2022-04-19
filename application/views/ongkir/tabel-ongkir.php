<?php

	$asal = 39; //Kabupaten asal ongkir akan dihitung dari kota/kabupaten ini ID 39 adalah kabupaten Bantul, Yogyakarta
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = 1000; //Berat barang menggunakan satuan gram

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key:81d4424e2b099f8b8ea33708087f4b8c"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $data = json_decode($response, true);
	}
	?>
	<?php
	 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
	?>
		 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
			 <table border="1">
				 <tr>
					 <th>No.</th>
					 <th>Jenis Layanan</th>
					 <th>ETD</th>
					 <th>Tarif</th>
					 <th>Pilih</th>
				 </tr>
				 <?php
	
				 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
				 ?>
				 <tr>
					 <td><?php echo $l+1;?></td>
					 <td>
						 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
						 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
					 </td>
					 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> hari</td>
					 <td align="right"><?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></td>
					 <td>
					
						 <div class="radio">
  							<label><input type="radio" tarif="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']; ?>"   name="pilih_ongkir" class="pilih_ongkir" ></label>
						</div>
					</td>
				 </tr>
				 <?php
				 }
				 ?>
			 </table>
		 </div>
	 <?php
	}
	?>

    <span id="ongkir"> </span>


<script type="text/javascript">
	$('.pilih_ongkir').on('click',function(){

		var tarif = parseInt($(this).attr("tarif"));

		$('#ongkir').text('Rp. '+format_rupiah(tarif));
	
	});

	function format_rupiah(nominal){
        var  reverse = nominal.toString().split('').reverse().join(''),
             ribuan = reverse.match(/\d{1,3}/g);
         return ribuan	= ribuan.join('.').split('').reverse().join('');
    }
</script>

