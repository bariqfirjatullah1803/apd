<?php
class M_sandbox extends CI_Model {

    public function getKodeKegiatan($idBag)
    {
        $sql = "select * from resource_kegiatan where idBagian = '".$idBag."'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // public function getKodeSubKegiatan($idKegiatan){
        
    //     $sql = "select descSubKegiatan from resource_sub_kegiatan where idKegiatan = '".$idKegiatan."'";

    //     $query = $this->db->query($sql);

    //     return $query->result_array();
    // }

    public function getSubKegiatan($idKegiatan){

        $sql = "select descSubKegiatan from resource_sub_kegiatan where idKegiatan = '".$idKegiatan."'";

        $query = $this->db->query($sql);

        $output = '<option value="">-- Pilih Kegiatan --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option>' . $row->descSubKegiatan . '</option>';
        }
        //return data kabupaten
        return $output;
    }

    // function get_kabupaten($provinsi_id)
    // {
    //     //ambil data kabupaten berdasarkan id provinsi yang dipilih
    //     $this->db->where('province_id', $provinsi_id);
    //     $this->db->order_by('name', 'ASC');
    //     $query = $this->db->get('regencies');

    //     $output = '<option value="">-- Pilih Kabupaten --</option>';

    //     //looping data
    //     foreach ($query->result() as $row) {
    //         $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
    //     }
    //     //return data kabupaten
    //     return $output;
    // }

}?>