<?php

class ModelUserJoinForum extends BaseModel
{
    protected $table = 'user_join_forum';

    public function countJoinForum($where = [])
    {
        $this->db->where($where);
        return $this->db->count_all_results($this->table);
    }

    public function isUserJoinedForum($user_id, $forum_id)
    {
        return !is_null($this->findOne([
            'user_id' => $user_id,
            'forum_id' => $forum_id
        ]));
    }
}