<?php 
 
class M_data extends CI_Model{
	function tampil_data(){
  // mengambil data dari database dengan menginputkan nama tabel dan mengembalikan ke pemanggil fungsi dengan return  
		return $this->db->get('user');
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }

    // function hapus data pada model
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    // function edit data pada model
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }
    // function update data pada model
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}