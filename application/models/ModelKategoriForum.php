<?php

require APPPATH . "core/BaseModel.php";

class ModelKategoriForum extends BaseModel
{
    protected $table = 'kategori_forum';

    public function rules()
    {
        return [
            [
                'field' => 'nama_kategori',
                'label' => 'Nama Kategori',
                'rules' => 'required|max_length[255]',
            ]
        ];
    }
}