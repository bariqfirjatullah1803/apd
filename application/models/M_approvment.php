<?php

class M_approvment extends CI_Model
{
	public function getAll()
	{
		$sql = "
					SELECT gi.idSubmit as id,gi.status, peg.namaAll as pegawai, mon.nominalGtAll as nominal, dest.kotaKecamatan as tujuan
					FROM recap_all_general_information as gi
         			INNER JOIN recap_all_pegawai as peg on gi.idSubmit = peg.idSubmit
	 				INNER JOIN recap_all_destination_information as dest on gi.idSubmit = dest.idSubmit
         			INNER JOIN recap_all_money_details as mon on gi.idSubmit = mon.idSubmit
					ORDER BY gi.status DESC
        ";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function getByCategory($category)
	{
		$sql = "
					SELECT gi.idSubmit as id,gi.status, peg.namaAll as pegawai, mon.nominalGtAll as nominal, dest.kotaKecamatan as tujuan
					FROM recap_all_general_information as gi
         			INNER JOIN recap_all_pegawai as peg on gi.idSubmit = peg.idSubmit
	 				INNER JOIN recap_all_destination_information as dest on gi.idSubmit = dest.idSubmit
         			INNER JOIN recap_all_money_details as mon on gi.idSubmit = mon.idSubmit
					WHERE gi.idKategori = '$category'
					ORDER BY gi.status DESC
        ";

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function getById($id)
	{
		$sql   = "
			SELECT 
            gi.idSubmit AS id, assoc.idBagian AS id_bagian,
            dur.tanggalBerangkat AS tanggal_berangkat, dur.durasiDenganHari AS durasi_hari, 
            dest.lokasi, dest.kotaKecamatan AS tujuan, dest.dasarSurat AS dasar_surat, dest.acara,
            peg.jmlAll AS jumlah, peg.namaAll AS pegawai,
            mon.nominalGtAll AS nominal, gi.status
            FROM recap_all_general_information AS gi
            INNER JOIN recap_all_date_and_durations AS dur
                ON gi.idSubmit = dur.idSubmit
            INNER JOIN recap_all_destination_information AS dest
                ON gi.idSubmit = dest.idSubmit
            INNER JOIN recap_all_pegawai AS peg
                ON gi.idSubmit = peg.idSubmit
            INNER JOIN recap_all_money_details AS mon
                ON gi.idSubmit = mon.idSubmit
            INNER JOIN recap_associative_all_idsubmit_idbagian AS assoc
                ON gi.idSubmit = assoc.idSubmit
                WHERE gi.idSubmit = $id
		";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function getAllImageById($id)
	{
		$sql   = "SELECT * FROM recap_all_bukti WHERE idSubmit = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function update($id, $status)
	{
		$this->db->update('recap_all_general_information', ['status' => $status], ['idSubmit' => $id]);
	}

	public function upload($data)
	{
		$this->db->insert('recap_all_bukti', $data);
	}
}
