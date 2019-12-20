<?php
include 'system/Model.php';
class adminModel extends Model
{
	public function addBrick($name, $price, $qty){
		$sql = "INSERT INTO brick (brickName, brickPrice, brickQuantity) VALUES ('$name', '$price', '$qty')";
		return $this->db->fetch($sql);
	}	
	public function editBrick($id, $name, $price, $qty){
		$sql = "UPDATE brick SET brickName = '$name', brickPrice = '$price', brickQuantity = '$qty' WHERE brickID = '$id'";
		return $this->db->fetch($sql);
	}
	public function getBrick(){
		$sql = "SELECT * FROM brick";
		return $this->db->fetch($sql);
	}
	public function getBrickInfo($brickID){
		$sql = "SELECT * FROM brick where brickID = '$brickID'";
		return $this->db->fetch($sql);
	}
	public function getCustomerInfo($customerID){
		$sql = "SELECT * FROM customer where customerID = '$customerID'";
		return $this->db->fetch($sql);
	}
		public function getCustomer(){
		$sql = "SELECT * FROM customer";
		return $this->db->fetch($sql);
	}
	public function getOrderList(){
		$sql = "SELECT * FROM orderTable inner JOIN customer on orderTable.customerID = customer.customerID inner join brick on brick.brickID = orderTable.brickID";
		return $this->db->fetch($sql);
	}
	
	
	public function getOrderInfo($orderID){
		$sql = "SELECT * FROM orderTable INNER JOIN customer on orderTable.customerID = customer.customerID inner JOIN brick on brick.brickID = orderTable.brickID WHERE orderTable.orderID = '$orderID'";
		return $this->db->fetch($sql);
	}
	
	public function updateStock($brickID, $newQuantity){
		$sql = "UPDATE brick SET brickQuantity = '$newQuantity' WHERE brickID = '$brickID'";
		return $this->db->execute($sql);
	}
	
	public function updateOrder($orderID, $status){
		$sql = "UPDATE orderTable SET orderStatus = '$status' WHERE orderID = '$orderID'";
		return $this->db->execute($sql);
	}
	public function deleteBrick($brickID){
		$sql = "DELETE FROM brick WHERE brickID = '$brickID'";
		return $this->db->execute($sql);
	}
	
}