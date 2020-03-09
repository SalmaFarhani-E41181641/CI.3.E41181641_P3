<?php 
//  menampilkan form login, melakukan verifikasi uname dan pass dan membuat function logout
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
//  membuat function_login untuk meengecek uname dan pass yang akan dirahkan m_login
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
			// cek data yang telah diinputkan
			// fungsi num_rows untuk menghitung jumlah record
			// jika uname dan pass benar maka akan diarahkan ke hal admin
			// jika salah maka akan menampilkan pesan "username dan password salah"
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
//  fuction logout yang didalamnya terdapat methhod sess_destroy untuk menghapus session
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}