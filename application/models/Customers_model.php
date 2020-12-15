<?php
class Customers_model extends CI_Model{
    public function tampilkanSemua(){
        return $this->db->get('pelanggan')->result();
    }

    public function doneTambahBaru($idPelanggan, $namaPelanggan, $daya, $jenis){
        $query = $this->db->query("INSERT INTO pelanggan(`idPelanggan`, `namaPelanggan`, `daya`, `jenis`, `bulanIni`) VALUES('$idPelanggan', '$namaPelanggan', '$daya', '$jenis', '0')");
        return $query;
    }

    public function doneHapusData($id){
		$hasil = $this->db->query("DELETE FROM pelanggan WHERE id='$id'");
		return $hasil;
    }
    
    public function getDetailPelanggan($idne){
        $hsl = $this->db->query("SELECT * FROM pelanggan WHERE id='$idne'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
					'idPelanggan' => $data->idPelanggan,
					'namaPelanggan' => $data->namaPelanggan,
					'daya' => $data->daya,
					'jenis' => $data->jenis,
					);
			}
		}
		return $hasil;
    }

    public function startUpdatePelanggan($idPelanggan, $namaPelanggan, $daya, $jenis, $bulanIni){
        $data = [
            'namaPelanggan' => $namaPelanggan,
            'daya' => $daya,
            'jenis' => $jenis,
            'bulanIni' => $bulanIni
        ];
        $this->db->where('idPelanggan', $idPelanggan);
        return $this->db->update('pelanggan', $data);

        // $hasil=$this->db->query("UPDATE `listrik`.`pelanggan` SET 
        //                             `namaPelanggan` = '$namaPelanggan', 
        //                             `daya` = '$daya', 
        //                             `jenis` = '$jenis', 
        //                             `bulanIni` = $bulanIni
        //                             WHERE `idPelanggan` = '$idPelanggan'");
		// return $hasil;
    }
}