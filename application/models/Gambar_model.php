<?php


defined('BASEPATH') or exit('No direct script access allowed');

class gambar_model extends CI_Model
{


    public function listing($id)
    {
        $this->db->where('id_client', $id);
        return $this->db->get('gambar')->result();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('gambar');
        
        
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('gambar')->row();
        
        
    }
}

/* End of file gambar_model.php */
