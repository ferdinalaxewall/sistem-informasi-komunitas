<?php

class BaseModel extends CI_Model
{
    protected $table;
    protected $prefix_code = 'TDA';

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

    public function create(array $request, bool $with_unique_code = false)
    {
        $request['id'] = generate_uuid();
        if ($with_unique_code) $request['code'] = $this->generateUniqueCode();

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

    public function generateUniqueCode()
    {
        $this->db->select("RIGHT({$this->table}.code,5) as code", FALSE);
        $this->db->order_by("code","DESC");    
        $this->db->limit(1);    

        $query = $this->db->get("{$this->table}");
            if ($query->num_rows() <> 0) {      
                $data = $query->row();
                $kode = intval(substr($data->code, -3)) + 1; 
            } else {      
                $kode = 1;  
            }
        $number = str_pad($kode, 3, "0", STR_PAD_LEFT);

        return generate_code($this->prefix_code, $number);
    }
}