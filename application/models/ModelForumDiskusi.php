<?php

class ModelForumDiskusi extends BaseModel
{
    protected $table = 'forum_diskusi';

    public function rules()
    {
        return [
            [
                'field' => 'pesan',
                'label' => 'Pesan Diskusi',
                'rules' => 'required|max_length[1000]',
            ],
        ];
    }

    public function groupDiskusi($where = [])
    {
        $this->db->from($this->table);
        $this->db->select([
            'forum_diskusi.id as id',
            'forum_diskusi.user_id as user_id',
            'forum_diskusi.forum_id as forum_id',
            'forum_diskusi.parent_id as parent_id',
            'forum_diskusi.pesan as pesan',
            'forum_diskusi.tgl_dibuat as tgl_dibuat',
            'forum_diskusi.tgl_diubah as tgl_diubah',
            'users.nama as nama_user',
            'users.image as image_user',
        ]);
        $this->db->join('users', 'users.id = forum_diskusi.user_id');
        $this->db->where($where);
        
        $data = $this->db->get()->result();
        return $this->remappingGroupDiskusi($data);
    }

    private function remappingGroupDiskusi(array $data)
    {
        $temp = [];
    
        foreach ($data as $index => $item) {
            if (is_null($item->parent_id)) {
                if (array_key_exists($item->id, $temp) && !empty($temp[$item->id] && property_exists($temp[$item->id], 'comments'))) {
                    $item->comments = $temp[$item->id]->comments;
                    $temp[$item->id] = $item;
                } else {
                    $item->comments = [];
                    $temp[$item->id] = $item;
                }
            } else {
                if (!empty($temp[$item->parent_id])) {
                    $temp[$item->parent_id]->comments[] = $item;
                } else {
                    $temp[$item->parent_id] = (object) [
                        'comments' => [$item]  
                    ];
                }
            }
        }

        return $temp;
    }
}