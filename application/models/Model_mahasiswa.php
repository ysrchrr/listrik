<?php
Class Model_mahasiswa extends CI_Model
{
  function TampilMahasiswa() 
    {
        $this->db->order_by('nim', 'ASC');
        return $this->db->from('mahasiswa')
          ->get()
          ->result();
    }

    function Getnim($nim = '')
    {
      return $this->db->get_where('mahasiswa', array('nim' => $nim))->row();
    }
    function HapusMahasiswa($nim)
    {
        $this->db->delete('mahasiswa',array('nim' => $nim));
    }
}
?>