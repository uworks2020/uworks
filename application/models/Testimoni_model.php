<?php


defined('BASEPATH') or exit('No direct script access allowed');

class testimoni_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('testimoni.*,client.lembaga');
        $this->db->from('testimoni');
        $this->db->join('client', 'client.id = testimoni.id_client', 'left');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('testimoni')->row();
        
        
    }

    public function tambah($data)
    {
        return $this->db->insert('testimoni', $data);
        
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('testimoni');
        
        
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('testimoni', $data);
        
        
    }
}

/* End of file testimoni_model.php */
