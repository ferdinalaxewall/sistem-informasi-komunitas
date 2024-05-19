<?php

class ModelForum extends BaseModel
{
    protected $table = 'forum';
    protected $prefix_code = 'FRM';

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
        ];
    }

    public function findOneWithJoinCategory($id)
    {
        $this->db->from($this->table);
        $this->db->join('kategori_forum', 'kategori_forum.id = forum.kategori_forum_id');
        $this->db->where([
            'forum.id' => $id
        ]);

        return $this->db->get()->row();
    }

    public function countJoinForum()
    {
        $data = $this->db->query("SELECT forum.judul, COUNT(user_join_forum.forum_id) as total_join FROM forum LEFT JOIN user_join_forum ON user_join_forum.forum_id = forum.id GROUP BY forum.id, forum.judul")->result();
        $this->db->reset_query();
        
        return $data;
    }
}