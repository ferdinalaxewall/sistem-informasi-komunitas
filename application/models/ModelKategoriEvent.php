<?php

class ModelKategoriEvent extends BaseModel
{
    protected $table = 'kategori_event';

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