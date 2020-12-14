<?php
class Customers_model extends CI_Model{
    public function tampilkanSemua(){
        return $this->db->get('pelanggan')->result();
    }

    public function doneTambahBaru($idPelanggan, $namaPelanggan, $daya, $jenis){
        $query = $this->db->query("INSERT INTO pelanggan(`idPelanggan`, `namaPelanggan`, `daya`, `jenis`, `bulanIni`) VALUES('$idPelanggan', '$namaPelanggan', '$daya', '$jenis', '0')");
        return $query;
    }
}