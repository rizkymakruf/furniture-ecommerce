<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $params = array('server_key' => 'SB-Mid-server-VAdPbbeXdO_Twl4sYamzahnq', 'production' => false);
        $this->load->library('veritrans');
        $this->veritrans->config($params);
        $this->load->helper('url');

        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index($page = null)
    {
        $data['title']          = 'Order';
        $data['page']           = 'pages/order/index';
        $data['content']        = $this->order->orderBy('transaction_time', 'DESC')->paginate($page)->get();
        $data['total_rows']     = $this->order->count();
        $data['pagination']     = $this->order->makePagination(
            base_url('order'),
            2,
            $data['total_rows']
        );

        $this->view($data);
    }


    public function cekstatus()
    {
        $orderid    = $this->input->post('order_id');

        if ($orderid) {
            $this->status($orderid);
        } else {
            echo 'Order id tidak ditemukan';
        }
    }

    private function status($orderid)
    {
        $result = $this->veritrans->status($orderid);
        $dataupdate = [
            'transaction_status' => $result->transaction_status,
            'date_modified' => time()

        ];

        $where = [
            'order_id' => $orderid
        ];

        $update = $this->db->update('orders', $dataupdate, $where);
        return $this->db->affected_rows;

        if ($update > 0) {
            $this->session->set_flashdata('messagetransaksi', 'Data transaksi berhasil di update');
        } else {
            $this->session->set_flashdata('messagetransaksi', 'Server sedang sibuk coba beberapa saat lagi');
        }

        redirect('order');
    }


    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('order'));
        }

        $keyword    = $this->session->userdata('keyword');
        $data['title']          = 'Admin: Order';
        $data['total_rows']     = $this->order->like('id', $keyword)->count();
        $data['content']        = $this->order
            ->like('id', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('transaction_time', $keyword)
            ->orderBy('transaction_time', 'DESC')
            ->paginate($page)->get();
        $data['pagination']     = $this->order->makePagination(
            base_url('order/search'),
            3,
            $data['total_rows']
        );
        $data['page']        = 'pages/order/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('order'));
    }

    public function detail($id)
    {
        $data['order']            = $this->order->where('id', $id)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('order'));
        }

        $this->order->table    = 'orders';
        $data['orders']    = $this->order->select([
            'orders.id', 'orders.gross_amount', 'orders.transaction_time',
            'orders.nama', 'orders.alamat', 'orders.custom', 'orders.status', 'orders.email', 'orders.telp', 'orders.payment_type', 'orders.bank', 'orders.id_user', 'orders.ongkir', 'orders.qty', 'orders.product_title', 'orders.alamat_api', 'orders.status_code'

        ])

            ->where('orders.id', $id)
            ->get();

        $data['page']            = 'pages/order/detail';

        $this->view($data);
    }
    public function print($id)
    {
        $data['order']          = $this->order->where('id', $id)->first();
        $data['title']          = 'Print Order | FurnitureCustom';
        $this->order->table     = 'orders';
        $data['ordersp']    = $this->order->select([
            'orders.id', 'orders.gross_amount', 'orders.transaction_time',
            'orders.nama', 'orders.alamat', 'orders.custom', 'orders.status', 'orders.email', 'orders.telp', 'orders.payment_type', 'orders.bank', 'orders.id_user', 'orders.ongkir', 'orders.qty', 'orders.product_title', 'orders.alamat_api'

        ])

            ->where('orders.id', $id)
            ->get();

        $data['page'] = 'pages/order/print';
        $this->view($data);
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

/* End of file Order.php */