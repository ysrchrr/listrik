<?php
class Rekap_model extends CI_Model{
    public function tampilkanSemua(){
        return $this->db->get('pembayaran')->result();
    }
}