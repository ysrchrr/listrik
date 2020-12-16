<?php
class Rekap_model extends CI_Model{
    public function tampilkanSemua(){
        return $this->db->get('pembayaran')->result();
    }

    public function goGetData($id){
        $hsl = $this->db->query("SELECT * FROM pelanggan WHERE id='$id'");
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
}