<?php
class Database{
	public $servername = "localhost";
	public $user = "root";
	public $pass = "";
	public $data = "quanlycongty";

	public $conn = NULL;
	
	public function connect(){
		$this->conn= new mysqli($this->servername,$this->user,$this->pass,$this->data);
		if(!$this->conn){
			echo "Kết nối thất bại";
			exit();
		}else{
			mysqli_set_charset($this->conn,'utf-8');
		}
		return $this->conn;
	}
	public function execute($sql){
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}

	// public function getData(){
	// 	$sql = "SELECT * FROM thongtinnhanvien";
	// 	// $this->execute($sql);
	// 	$result = mysqli_query($this->conn, $sql);
	// 	return $result;
	// }

	public function getAllData(){
		$sql = "SELECT * FROM thongtinnhanvien";
		$result = mysqli_query($this->conn, $sql);
		if(mysqli_num_rows($result)>0){
			while($rows = mysqli_fetch_assoc($result)){
				$date= date_create($rows['ngaysinh']);
				echo '	<tr>
						<td>'.$rows['id'].'</td>
						<td>'.$rows['fullname'].'</td>
						<td>'.$rows['gioitinh'].'</td>
						<td>'.date_format($date,"d/m/Y").'</td>
						<td>'.$rows['diachi'].'</td>
						<td>'.$rows['email'].'</td>
						<td>'.$rows['sdt'].'</td>
						<td>'.$rows['note'].'</td>
						<td>';
				echo "<a href = 'database.php?id=".$rows[id]."' title='Xem thông tin' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'>Xem</span></a>";
				echo "<a href = '?controller=tv&action=update&id=".$rows[id]."' title='Sửa thông tin' data-toggle='tooltip'><i class='bi bi-box'></i>Sửa</a>";
				echo "<a href = '?controller=tv&action=delete&id=".$rows[id]."' title='Xoá thông tin' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>Xoá</span></a>";
				echo '</td>
				</tr>';
    		}
    	}
	}
	public function insert($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "INSERT INTO thongtinnhanvien(fullname,gioitinh,ngaysinh,diachi,email,sdt) VALUES ('$fullname','$gioitinh','$ngaysinh','$diachi','$email','$sdt')";
		$this->execute($sql);
		if ($this->conn->query($sql)===true) {
			header('Location: ?controller=tv');
		}else{
			echo "Lỗi:" .$conn->error;
		}
	}
	public function update($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "UPDATE thongtinnhanvien SET fullname = '$fullname',gioitinh = '$gioitinh',ngaysinh = '$ngaysinh',diachi = '$diachi',email = '$email',sdt='$sdt' WHERE id ='$id'";
		$this->execute($sql);
		if ($this->conn->query($sql)===true) {
			header('Location: ?controller=tv');
		}else{
			echo "Lỗi:" .$conn->error;
		}
	}
	public function delete($id){
		$sql = "DELETE FROM thongtinnhanvien WHERE id = $id";
		$this->execute($sql);
		if ($this->conn->query($sql)===true) {
			header('Location: ?controller=tv');
		}else{
			echo "Lỗi:" .$conn->error;
		}
	}
	public function getAllDataID($id){
		$sql = "SELECT * FROM thongtinnhanvien WHERE id = $id";
		$result = mysqli_query($this->conn, $sql);
		$dataID = mysqli_fetch_array($result);
	}
}
?>