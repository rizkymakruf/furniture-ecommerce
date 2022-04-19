<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends MY_Model
{

    // jumlah data yang ditampilkan perhalaman
    protected $perPage = 10;

    protected $table = 'product';

    public function getDefaultValues()
    {
        return [
            'id_category'       => '',
            'slug'              => '',
            'title'             => '',
            'description'       => '',
            'production_cost'   => '',
            'price'             => '',
            'is_available'      => 1,
            'image'             => '',
            'weight'            => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'id_category',
                'label'    => 'Kategori',
                'rules'    => 'required'
            ],
            [
                'field'    => 'title',
                'label'    => 'Nama Produk',
                'rules'    => 'trim|required|callback_unique_title'
            ],
            [
                'field'    => 'description',
                'label'    => 'Deskripsi',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'production_cost',
                'label'    => 'Biaya produksi',
                'rules'    => 'trim|required|numeric|is_natural_no_zero'
            ],
            [
                'field'    => 'price',
                'label'    => 'Harga',
                'rules'    => 'trim|required|numeric|is_natural_no_zero'
            ],
            [
                'field'    => 'is_available',
                'label'    => 'Ketersediaan',
                'rules'    => 'required'
            ],
            [
                'field'    => 'weight',
                'label'    => 'Berat',
                'rules'    => 'trim|required|numeric|is_natural_no_zero'
            ],
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config    = [
            'upload_path'           => './images/product',
            'file_name'             => $fileName,
            'allowed_types'         => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'              => 10024,
            'max_width'             => 0,
            'max_height'            => 0,
            'overwrite'             => true,
            'file_ext_tolower'      => true
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./images/product/$fileName")) {
            unlink("./images/product/$fileName");
        }
    }
}

/* End of file Product_model.php */