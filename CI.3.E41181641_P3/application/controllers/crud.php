<?php 
 
class Crud extends CI_Controller{
 
  // memanggil atau membuka model m_data
	function __construct(){
		parent::__construct();		
    $this->load->model('m_data');
    
    //function untuk memanggil helper url melalui controller
                $this->load->helper('url');
	}
 
  //membuat function index untuk menampilkan data melalui tampil_data yang dibuat dalam m_data 
	function index(){
    $data['user'] = $this->m_data->tampil_data()->result();
  // memparsing ke dalam v_tampil  
		$this->load->view('v_tampil',$data);
    }

    // membuat function tambah untuk menampilkan v_input
    function tambah(){
		$this->load->view('v_input');
    }
    // membuat function tambah_aksi untuk menangkap data inputan dari form dan menjadikan array
    function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
      );
      
      // menginput data yang ada dan disimpan ke dalam tabel user dan mengalihkan ke dalam method idex
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    // parameter function hapus dengan variabel $id untuk menangkap id data yang dikirim melalui link
    // menjadikan inputan data ke dalam array dan mengirimkan ke m_data sesuai dengan id  dalam tabel pada $where
    function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }

    // function edit menjadikan id dalam bentuk array
    // function edit_data digunakan untuk mengambil id dalam model m_data
    // function result digunakan untuk generate hasil query kedalam array
    // variabel $where digunakan untuk menunjukkan id mana yang akan di edit
    function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $this->load->view('v_edit',$data);
    }
    // membuat function update untuk mengupdate data 
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
     
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
     
        $where = array(
            'id' => $id
        );
     // variabel $where digunakan untuk menunjukkan data mana yang akan di update setelah di edit
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
}