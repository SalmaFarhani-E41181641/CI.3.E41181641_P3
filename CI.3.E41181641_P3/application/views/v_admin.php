<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<!-- menampilkan session login -->
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<!-- menampilkan fungsi Logout -->
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>