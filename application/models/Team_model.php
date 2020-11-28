<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class team_model extends CI_Model {

    
    public function listing()
    {
        return $this->db->get('team')->result();
        
    }

    public function tambah($data)
    {
        return $this->db->insert('team', $data);
        
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('team');
        
        
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('team')->row();
        
        
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('team', $data);
        
        
    }

    public function get_data_login($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('team')->row();
        
        
    }

}

/* End of file team_model.php */
