<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Myorder extends MY_Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $is_login    = $this->session->userdata('is_login');
        $this->id    = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        $data['title']          = 'Daftar Order';
        $data['midtrans']       = $this->myorder->where('id_user', $this->id)
            ->orderBy('transaction_time', 'DESC')->get();
        $data['page']           = 'pages/myorder/index';
        $this->view($data);
    }

    public function detail($id)
    {
        $data['order']            = $this->myorder->where('id', $id)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('order'));
        }

        $this->myorder->table    = 'orders';
        $data['orders']    = $this->myorder->select([
            'orders.id', 'orders.gross_amount', 'orders.transaction_time',
            'orders.nama', 'orders.alamat', 'orders.custom', 'orders.status', 'orders.email', 'orders.telp', 'orders.payment_type', 'orders.bank', 'orders.id_user', 'orders.ongkir', 'orders.qty', 'orders.product_title', 'orders.ekspedisi', 'orders.alamat_api', 'orders.status_code'
        ])

            ->where('orders.id', $id)
            ->get();

        $data['page']            = 'pages/myorder/detail';

        $this->view($data);
    }

    public function confirm($invoice)
    {
        $data['order']    = $this->myorder->where('invoice', $invoice)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('/myorder'));
        }

        if ($data['order']->status !== 'waiting') {
            $this->session->set_flashdata('warning', 'Bukti transfer sudah dikiirm.');
            redirect(base_url("myorder/detail/$invoice"));
        }

        if (!$_POST) {
            $data['input']    = (object) $this->myorder->getDefaultValues();
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName    = url_title($invoice, '-', true) . '-' . date('YmdHis');
            $upload        = $this->myorder->uploadImage('image', $imageName);
            if ($upload) {
                $data['input']->image    = $upload['file_name'];
            } else {
                redirect(base_url("myorder/confirm/$invoice"));
            }
        }

        if (!$this->myorder->validate()) {
            $data['title']            = 'Konfirmasi Order';
            $data['form_action']    = base_url("myorder/confirm/$invoice");
            $data['page']            = 'pages/myorder/confirm';

            $this->view($data);
            return;
        }

        $this->myorder->table = 'orders_confirm';

        if ($this->myorder->create($data['input'])) {
            $this->myorder->table = 'orders';
            $this->myorder->where('id', $data['input']->id_orders)->update(['status' => 'paid']);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url("myorder/detail/$invoice"));
    }

    public function image_required()
    {
        if (empty($_FILES) || $_FILES['image']['name'] === '') {
            $this->session->set_flashdata('image_error', 'Bukti transfer tidak boleh kosong!');
            return false;
        }
        return true;
    }
}

/* End of file Myorder.php */