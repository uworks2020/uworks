<?php


defined('BASEPATH') or exit('No direct script access allowed');

class client_model extends CI_Model
{

    public function listing()
    {
        $this->db->order_by('id', 'desc');

        return $this->db->get('client')->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('client', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('client');
        
        
    }

    public function hapus_testimoni($id)
    {
        $this->db->where('id_client', $id);
        return $this->db->delete('testimoni');
        
        
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('client')->row();
        
        
    }

    public function edit($id,$data)
    {
        $this->db->where('id', $id);
        return $this->db->update('client', $data);
        
        
    }

    public function updategambar($id,$namafile){
        $this->db->where('id', $id);
        $this->db->set('gambar',$namafile);
        return $this->db->update('client');
        
        
    }
}

/* End of file client_model.php */
