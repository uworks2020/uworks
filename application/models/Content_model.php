<?php


defined('BASEPATH') or exit('No direct script access allowed');

class content_model extends CI_Model
{

    public function listing()
    {
        return $this->db->get('content')->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('content', $data);
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('content')->row();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('content');
        
        
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('content', $data); 
        
        
    }
}

/* End of file content_model.php */
