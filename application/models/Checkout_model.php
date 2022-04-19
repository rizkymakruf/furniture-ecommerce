<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends MY_Model
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'nama'          => '',
            'alamat'       => '',
            'telp'         => '',
            'email'        => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'nama',
                'label'    => 'Nama',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'alamat',
                'label'    => 'Alamat',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'telp',
                'label'    => 'Telp/WA',
                'rules'    => 'trim|required|max_length[15]'
            ],
            [
                'field'    => 'email',
                'label'    => 'E-Mail',
                'rules'    => 'trim|required'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Checkout_model.php */