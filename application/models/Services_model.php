<?php


defined('BASEPATH') or exit('No direct script access allowed');

class services_model extends CI_Model
{

    public function listing()
    {
        $this->db->order_by('id', 'asc');
        
        return $this->db->get('services')->result();
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('services')->row();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('services');
    }

    public function tambah($data)
    {
        return $this->db->insert('services', $data);
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('services', $data);
    }
}

/* End of file services_model.php */
