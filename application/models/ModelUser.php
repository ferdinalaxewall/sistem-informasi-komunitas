<?php

class ModelUser extends BaseModel
{
    protected $table = 'users';

    public function globalRules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama Lengkap',
                'rules' => 'required|max_length[255]',
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required',
            ],
            [
                'field' => 'no_telp',
                'label' => 'Nomor Telepon',
                'rules' => 'trim|required|numeric|min_length[11]|max_length[15]',
            ],
        ];
    }

    public function newUserRules()
    {
        $globalRules = $this->globalRules();
        $globalRules[] = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|max_length[100]|valid_email|is_unique[users.email]',
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
            ]
        ];

        return $globalRules;
    }

    public function updateUserRules($id)
    {
        $globalRules = $this->globalRules();
        $globalRules[] = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => "trim|required|max_length[100]|valid_email|is_unique[users.email,id,{$id}]",
            ],
        ];

        if (!empty($this->input->post('password'))) {
            $globalRules[] = [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ];
            
            $globalRules[] = [
                'field' => 'password_confirmation',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
            ];

        }

        return $globalRules;
    }
}