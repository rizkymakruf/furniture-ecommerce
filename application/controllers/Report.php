<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Report_model');

        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }
    public function index()
    {
        $data['tahun']      = $this->Report_model->gettahun();

        $data['page']       = 'pages/report/index';
        $this->view($data);
    }

    function filter()
    {
        $tanggalawal    = $this->input->post('tanggalawal');
        $tanggalakhir   = $this->input->post('tanggalakhir');
        $tahun1         = $this->input->post('tahun1');
        $bulanawal      = $this->input->post('bulanawal');
        $bulanakhir     = $this->input->post('bulanakhir');
        $tahun2         = $this->input->post('tahun2');
        $nilaifilter    = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Penjualan Filter By Tanggal";
            $data['subtitle'] = "Tanggal " . $tanggalawal . " - " . $tanggalakhir;
            $data['datafilter'] = $this->Report_model->filterbytanggal($tanggalawal, $tanggalakhir);

            $this->load->view('pages/report/print_laporan', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = "Laporan Penjualan Filter By Bulan";
            $data['subtitle'] = "Bulan " . $bulanawal . " - " . $bulanakhir . " - " . $tahun1;
            $data['datafilter'] = $this->Report_model->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('pages/report/print_laporan', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = "Laporan Penjualan Pertahun";
            $data['subtitle'] = "Tahun " . $tahun2;
            $data['datafilter'] = $this->Report_model->filterbytahun($tahun2);

            $this->load->view('pages/report/print_laporan', $data);
        }
    }
}
