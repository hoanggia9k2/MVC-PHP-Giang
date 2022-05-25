<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];
}else{
	$actione = '';
}
switch ($action) {
	case 'add':
		if(isset($_POST['add'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullname = $_POST['fullname'];
			$gioitinh = $_POST['gioitinh'];
			$ngaysinh = $_POST['ngaysinh'];
			$diachi = $_POST['diachi'];
			$email = $_POST['email'];
			$sdt = $_POST['sdt'];
			$db->insert($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt);
		}
		require "./mvc/views/danhsachnhanvien/add.php";
		break;
	case 'update':
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			if(isset($_POST['update'])){
				$fullname = $_POST['fullname'];
				$gioitinh = $_POST['gioitinh'];
				$ngaysinh = $_POST['ngaysinh'];
				$diachi = $_POST['diachi'];
				$email = $_POST['email'];
				$sdt = $_POST['sdt'];
				$db->update($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt);
			}
			$rows = $db->getAllDataID($id);
		}
		require "./mvc/views/danhsachnhanvien/update.php";
		break;
	case 'delete':
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$db->delete($id);
		}
		require "./mvc/views/danhsachnhanvien/delete.php";
		break;
	default:
		require "./mvc/views/danhsachnhanvien/list.php";
		break;
}
?>