<?php

class M_show_titipan extends CI_Model
{

    public function showCountTitipan($idBag){
        // {QUERY}
            $sql = 
            "SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '1'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '2'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '3'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '4'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '5'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '6'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '7'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '8'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '9'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '10'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '11'
            
            UNION ALL
            
            SELECT resbag.namaBagian as namaBagian, COUNT(gi.idStatus) as Total
            from recap_all_general_information as gi 
            inner join recap_associative_all_idsubmit_idbagian as asbag
            on asbag.idSubmit = gi.idSubmit
            inner join resource_bagian as resbag
            on resbag.idBagian = asbag.idBagian
            where gi.idStatus = '1' and asbag.idBagian = '12';";
        // 

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}