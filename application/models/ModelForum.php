<?php

class ModelForum extends BaseModel
{
    protected $table = 'forum';

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
                'field' => 'kategori_forum_id',
                'label' => 'Kategori Forum',
                'rules' => 'required',
            ],  
            [
                'field' => 'is_active',
                'label' => 'Status Aktif',
                'rules' => 'required|in_list[true,false]',
            ]
        ];
    }
}