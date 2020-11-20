<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_Model {

    public function listing()
    {
        return $this->db->get('menu')->result();
        
    }

}

/* End of file menu_model.php */
