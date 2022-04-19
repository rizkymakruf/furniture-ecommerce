<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-VAdPbbeXdO_Twl4sYamzahnq', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->database();
		$this->id    = $this->session->userdata('id');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}


	public function token()
	{

		$nama 		= $this->input->post('nama');
		$alamat1 	= $this->input->post('alamat1');
		$telp 		= $this->input->post('telp');
		$jmlbayar 	= $this->input->post('jmlbayar');
		$email 		= $this->input->post('email');
		$custom 	= $this->input->post('custom');
		$ongkir 	= $this->input->post('ongkir');
		$alamat 	= $this->input->post('almt');
		$pkt 		= $this->input->post('pkt');

		$total_bayar = $jmlbayar + $ongkir;


		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $total_bayar, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $total_bayar,
			'quantity' => 1,
			'name' => "FurnitureShop   Total Bayar :"
		);

		// Optional
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 20000,
		// 	'quantity' => 2,
		// 	'name' => "Orange"
		// );

		// Optional
		$item_details = array($item1_details);

		// Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
		// 	'country_code'  => 'IDN'
		// );


		// // Optional
		$shipping_address = array(
			// 'first_name'    => "Obet",
			// 'last_name'     => "Supriadi",
			'address'       => $alamat1,
			// 'city'          => $almt,
			// 'postal_code'   => "16601",
			// 'phone'         => "08113366345",
			// 'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $nama,
			'phone'         => $telp,
			'email'         => $email,
			// 'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 1440
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function success()
	{
		$data['title']		= 'Checkout Success';
		$data['page']       = '/pages/checkout/success';

		$this->view($data);
	}

	public function finish()
	{

		$nama 				= $this->input->post('nama');
		$alamat1	 		= $this->input->post('alamat1');
		$telp 				= $this->input->post('telp');
		$email 				= $this->input->post('email');
		$custom 			= $this->input->post('custom');
		$ongkir				= $this->input->post('ongkir');
		$qty				= $this->input->post('qty');
		$product_title		= $this->input->post('product_title');
		$pkt 				= $this->input->post('pkt');
		$alamat 			= $this->input->post('alamat');
		$cost	 			= $this->input->post('cost');

		$result = json_decode($this->input->post('result_data'), true);


		$data = [
			'id'				=> $result['order_id'],
			'gross_amount'		=> $result['gross_amount'],
			'payment_type'		=> $result['payment_type'],
			'transaction_time'	=> $result['transaction_time'],
			'bank'				=> $result['va_numbers'][0]['bank'],
			'va_number'			=> $result['va_numbers'][0]['va_number'],
			'status_code'		=> $result['status_code'],
			'pdf_url'			=> $result['pdf_url'],
			'status'			=> $result['transaction_status'],
			'id_user'    		=> $this->id,
			'nama'				=> $nama,
			'alamat'			=> $alamat1,
			'alamat_api'		=> $alamat,
			'custom'			=> $custom,
			'email' 			=> $email,
			'telp'				=> $telp,
			'ongkir'			=> $ongkir,
			'qty'				=> $qty,
			'product_title'		=> $product_title,
			'ekspedisi'			=> $pkt,
			'cost'				=> $cost,
		];


		$simpan = $this->db->insert('orders', $data);

		if ($simpan) {
			redirect(base_url('snap/success'));
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		} else {
			// redirect(base_url('checkout/failed'));
		}

		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>';
	}



	public function update($id)
	{
		if (!$_POST) {
			$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan!');
			redirect(base_url("order/detail/$id"));
		}

		if ($this->order->where('id', $id)->update(['status' => $this->input->post('status')])) {
			$this->session->set_flashdata('success', 'Data berhasil diperbaharui.');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan!');
		}

		redirect(base_url("order/detail/$id"));
	}
}
