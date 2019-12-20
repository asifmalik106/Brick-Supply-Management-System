<?php
include 'system/Model.php';
class mainModel extends Model
{
	public function loginVerify($login, $password)
    {
        $sql = "SELECT * FROM Administration WHERE userName = '$login' AND userPass = MD5('$password')";
		return $this->db->fetch($sql);
    }
	
	public function updatePassword($userID, $password)
    {
        $sql = "UPDATE businessCredentials SET password = '$password' WHERE userID = '$userID'";
		return $this->db->execute($sql);
    }
	
    public function getDBAndTimezome($bID)
    {
        $sql = "SELECT businessName, businessNameSMS, businessAddress, businessPhone, businessDBName, businessTimeZone, businessCurrency FROM businessInfo WHERE businessID = '$bID'";
        return $this->db->fetch($sql);
    }
		public function addCustomer($name, $address, $mobile){
			$sql = "INSERT INTO customer (customerName, customerAddress, customerMobile) VALUES ('$name', '$address', '$mobile')";
			return $this->db->execute($sql);
		}
		public function getCustomerID($name, $address, $mobile){
			$sql = "SELECT * from customer where customerName = '$name' AND customerAddress = '$address' AND customerMobile = '$mobile'";
			return $this->db->fetch($sql);
		}
	public function addCustomerCredential($customerID, $name, $userName, $userPass){
		$sql = "INSERT INTO Administration (customerID, adminName, userRank, userName, userPass) VALUES ('$customerID', '$name', 'customer', '$userName', MD5('$userPass'))";
		return $this->db->execute($sql);
	}
    public function test(){
        $sql = "SELECT * FROM businessInfo";
        return $this->db->fetch($sql);
    }
    public function setPrimaryDB(){
        return $this->db->selectDB();
    }

    public function setSecondaryDB(){
        return $this->db->selectDB($_SESSION['data']['businessDBName']);
    }
}
