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

    public function reportForum(array $filters = [])
    {
        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
            $sqlQuery = "SELECT forum.code, forum.judul, COUNT(DISTINCT user_join_forum.id) AS total_join, COUNT(DISTINCT forum_diskusi.id) AS total_diskusi, users.nama AS dibuat_oleh, forum.tgl_dibuat FROM forum 
            LEFT JOIN user_join_forum ON forum.id=user_join_forum.forum_id 
            LEFT JOIN forum_diskusi ON forum.id=forum_diskusi.forum_id 
            LEFT JOIN users ON forum.user_id=users.id 
            WHERE DATE(forum.tgl_dibuat) >= '{$filters['start_date']}' AND DATE(forum.tgl_dibuat) <= '{$filters['end_date']}'
            GROUP BY forum.code,forum.judul,forum.tgl_dibuat,users.nama;";
        } elseif (!empty($filters['start_date'])) {
            $sqlQuery = "SELECT forum.code, forum.judul, COUNT(DISTINCT user_join_forum.id) AS total_join, COUNT(DISTINCT forum_diskusi.id) AS total_diskusi, users.nama AS dibuat_oleh, forum.tgl_dibuat FROM forum 
            LEFT JOIN user_join_forum ON forum.id=user_join_forum.forum_id 
            LEFT JOIN forum_diskusi ON forum.id=forum_diskusi.forum_id 
            LEFT JOIN users ON forum.user_id=users.id 
            WHERE DATE(forum.tgl_dibuat) >= '{$filters['start_date']}'
            GROUP BY forum.code,forum.judul,forum.tgl_dibuat,users.nama;";
        } elseif (!empty($filters['end_date'])) {
            $sqlQuery = "SELECT forum.code, forum.judul, COUNT(DISTINCT user_join_forum.id) AS total_join, COUNT(DISTINCT forum_diskusi.id) AS total_diskusi, users.nama AS dibuat_oleh, forum.tgl_dibuat FROM forum 
            LEFT JOIN user_join_forum ON forum.id=user_join_forum.forum_id 
            LEFT JOIN forum_diskusi ON forum.id=forum_diskusi.forum_id 
            LEFT JOIN users ON forum.user_id=users.id 
            WHERE DATE(forum.tgl_dibuat) <= '{$filters['end_date']}'
            GROUP BY forum.code,forum.judul,forum.tgl_dibuat,users.nama;";
        } else {
            $sqlQuery = "SELECT forum.code, forum.judul, COUNT(DISTINCT user_join_forum.id) AS total_join, COUNT(DISTINCT forum_diskusi.id) AS total_diskusi, users.nama AS dibuat_oleh, forum.tgl_dibuat FROM forum 
            LEFT JOIN user_join_forum ON forum.id=user_join_forum.forum_id 
            LEFT JOIN forum_diskusi ON forum.id=forum_diskusi.forum_id 
            LEFT JOIN users ON forum.user_id=users.id 
            GROUP BY forum.code,forum.judul,forum.tgl_dibuat,users.nama;";
        }

        $data = $this->db->query($sqlQuery)->result();
        $this->db->reset_query();

        return $data;
    }
}