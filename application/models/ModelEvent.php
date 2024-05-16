<?php

class ModelEvent extends BaseModel
{
    protected $table = 'event';
    public $tipe = [
        'offline' => 'Offline', 
        'online' => 'Online'
    ];

    public function rules()
    {
        return [
            [
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'required|max_length[255]',
            ],  
            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required|max_length[1000]',
            ],  
            [
                'field' => 'kategori_event_id',
                'label' => 'Kategori Forum',
                'rules' => 'required',
            ],
            [
                'field' => 'waktu_mulai',
                'label' => 'Waktu Mulai',
                'rules' => 'required',
            ],
            [
                'field' => 'waktu_selesai',
                'label' => 'Waktu Selesai',
                'rules' => 'required',
            ],
            [
                'field' => 'tipe',
                'label' => 'Tipe',
                'rules' => 'required|in_list[online,offline]',
            ],
            [
                'field' => 'kapasitas',
                'label' => 'Kapasitas',
                'rules' => 'required|numeric',
            ]
        ];
    }
}