<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{

    // JUMLAH TAMPIL PERHALAMAN
    protected $perPage = 10;

    public function getDefaultValues()
    {
        return [
            'slug'   => '',
            'title'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'     => 'slug',
                'label'     => 'Slug',
                'rules'     => 'trim|required|callback_unique_slug'
            ],
            [
                'field'     => 'title',
                'label'     => 'Kategori',
                'rules'     => 'trim|required'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Category_model.php */