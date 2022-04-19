<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends MY_Model
{

    public $table = 'orders';

    // Get Tahun
    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(transaction_time) AS tahun FROM orders WHERE status = 'paid' OR status = 'process' OR status = 'delivered' GROUP BY YEAR(transaction_time) ORDER BY YEAR(transaction_time) ASC");

        return $query->result();
    }

    // Filter Tanggal
    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM orders WHERE transaction_time BETWEEN '$tanggalawal' AND '$tanggalakhir' AND status_code IN ('200')  ORDER BY transaction_time ASC");

        return $query->result();
    }

    // Filter Bulan
    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * FROM orders WHERE YEAR(transaction_time) = '$tahun1' AND MONTH(transaction_time) BETWEEN '$bulanawal' AND '$bulanakhir' AND status_code IN ('200') ORDER BY transaction_time ASC");

        return $query->result();
    }

    // Filter Tahun
    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * FROM orders WHERE YEAR(transaction_time) = '$tahun2' AND status_code IN ('200') ORDER BY transaction_time ASC");

        return $query->result();
    }
}

/* End of file Report_model.php */