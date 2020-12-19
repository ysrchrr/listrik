<?php
class Rekap_model extends CI_Model{
    public function tampilkanSemua(){
        $tampil =  $this->db->query('SELECT
										pembayaran.id,
										pelanggan.namaPelanggan,
										pembayaran.tanggal,
										pembayaran.keTokped,
										pembayaran.kePerson
									FROM
										pembayaran
									JOIN pelanggan ON pelanggan.idPelanggan = pembayaran.idPelanggan
									WHERE pelanggan.jenis = "Listrik"');
		return $tampil->result();
	}
	
	public function tampilkanIndihome(){
		$tampil =  $this->db->query('SELECT
										pembayaran.id,
										pelanggan.namaPelanggan,
										pembayaran.tanggal,
										pembayaran.keTokped,
										pembayaran.kePerson
									FROM
										pembayaran
									JOIN pelanggan ON pelanggan.idPelanggan = pembayaran.idPelanggan
									WHERE pelanggan.jenis = "Indihome"');
		return $tampil->result();
	}

    public function goGetData($id){
        $hsl = $this->db->query("SELECT * FROM pelanggan WHERE idPelanggan = '$id'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil = array(
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
	
	public function goAddTagihan($idPelanggan, $tanggal, $keTokped, $kePerson, $status){
		$query = $this->db->query("INSERT INTO `persons`.`pembayaran`(`idPelanggan`, `tanggal`, `keTokped`, `kePerson`, `status`) VALUES ('$idPelanggan', '$tanggal', '$keTokped', '$kePerson', '$status')");
        return $query;
	}

	public function dataBulanan($ngene){
		$query = $this->db->query("SELECT
									pembayaran.idPelanggan,
									pelanggan.namaPelanggan,
									pelanggan.daya,
									pembayaran.tanggal,
									pembayaran.keTokped AS UangKeluar 
								FROM
									`pembayaran`
									JOIN pelanggan ON pelanggan.idPelanggan = pembayaran.idPelanggan 
								WHERE
									tanggal LIKE '%$ngene%' AND pelanggan.jenis = 'Listrik'");
		return $query->result();
	}

	public function dataSemua(){
		$query = $this->db->query("SELECT
									pembayaran.id,
									pembayaran.idPelanggan,
									pelanggan.namaPelanggan,
									pelanggan.daya,
									pembayaran.tanggal,
									pembayaran.keTokped AS UangKeluar 
								FROM
									`pembayaran`
									JOIN pelanggan ON pelanggan.idPelanggan = pembayaran.idPelanggan
									WHERE pelanggan.jenis = 'Listrik'");
		return $query->result();
	}

	public function allIndihome(){
		$query = $this->db->query("SELECT
									pembayaran.id,
									pembayaran.idPelanggan,
									pelanggan.namaPelanggan,
									pelanggan.daya,
									pembayaran.tanggal,
									pembayaran.keTokped AS UangKeluar 
								FROM
									`pembayaran`
									JOIN pelanggan ON pelanggan.idPelanggan = pembayaran.idPelanggan
									WHERE pelanggan.jenis = 'Indihome'");
		return $query->result();
	}
}