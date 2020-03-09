<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		// construct yg berisi session
		// untuk mengecek apakah sudah login atau belum
		// jika berhasil login maka secara otomatis memiliki session login
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$this->load->view('v_admin');
    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}