<?php


defined('BASEPATH') or exit('No direct script access allowed');

class site_model extends CI_Model
{

    public function listing()
    {
        return $this->db->get('site')->row();
    }

    public function update($data)
    {
        $this->db->where('id', 1);
        return $this->db->update('site', $data);
        
        
    }
}

/* End of file site_model.php */
