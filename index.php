
<?php
require "./mvc/models/DBConfig.php";
$db = new Database();
$db->connect();
if (isset($_GET['controller'])) {
	$controller = $_GET['controller'];
}else{
	$controller = '';
}
switch ($controller) {
	case 'tv':
		require "./mvc/controllers/danhsachnhanvien/index.php";
		break;
	
	default:
		// code...
		break;
}
?>