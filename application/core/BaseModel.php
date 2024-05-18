<?php

class BaseModel extends CI_Model
{
    protected $table;

    public function all()
    {
        $this->db->order_by('tgl_dibuat', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function find($where = [], $limit = null)
    {
        $this->db->order_by('tgl_dibuat', 'DESC');
        if (!is_null($limit)) $this->db->limit($limit);
        return $this->db->get_where($this->table, $where);
    }
    
    public function findAll($where = [])
    {
        return $this->find($where)->result();
    }

    public function findOne($where = [])
    {
        return $this->find($where)->row();
    }

    public function findWithLimit($where = [], $limit = null)
    {
        return $this->find($where, $limit)->result();
    }

    public function findOneById($id)
    {
        return $this->find([
            'id' => $id
        ])->row();
    }

    public function create(array $request)
    {
        $request['id'] = generate_uuid();
        $this->db->insert($this->table, $request);
    }

    public function update($where = [], $request = [])
    {
        $this->db->update($this->table, $request, $where);
    }

    public function updateById($id, $request = [])
    {
        $this->update([
            'id' => $id
        ], $request);
    }

    public function delete($where = [])
    {
        $this->db->delete($this->table, $where);
    }

    public function deleteById($id)
    {
        $this->delete([
            'id' => $id
        ]);
    }
}