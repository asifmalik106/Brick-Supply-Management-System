<?php
include 'system/Controller.php';


/* File: Main Controler
 * Handle all primary requests. It handles Login Requests and authenticate users.
 * Asif Salman Malik
 * Incresome Inc.
 *
 */
class main extends Controller
{
	function __construct()
	{
		parent::__construct();
	}


	/* Main Function.
	 * 	If user is not logged in then show login page.
	 * 	Else redirect to authorized page.
	 */
	public function index($msg = null){
		
		if(isset($_SESSION['data'])){
			$this->load->redirectIn($_SESSION['data']['userRank']);
		}
		else{
			$data = array(
				'title'=> 'Login | Retail Manager'
			);
			$data['js'] = array('js/page/login.js'
							);
			if(isset($msg)){
				$data = array_merge($data, array('msg'=>'Invalid Login Information!!! Try Again...'));
			}
			$this->load->view('login',$data);
		}
		
		//echo "Framework is Ready!";
	}


	/* Login Verify Function.
	 *	Verify an user's login information.
	 *	If user is verified then set session data and redirect to authorized page.
	 * 	Else show login page.	
	 */
	public function loginVerify(){
		//echo "Login Verify";
		$login = Validation::verify($_POST['login']);
		$password = Validation::verify($_POST['password']);
		//echo $login." ".$password;
		$_SESSION['temp'] = $login;
		$loginData = '';
		$this->load->model('mainModel');
		$dbModel = new mainModel();
		$result = $dbModel->loginVerify($login, $password);
		/*echo "<pre>";
		print_r($result);
		echo "</pre>";
		echo $result->num_rows;*/
		if($result->num_rows==1){
			$_SESSION['temp'] = '';
			$loginData = $result->fetch_assoc();
			Session::setSession($loginData);
			$this->load->redirectIn();
		}
		else{
			$this->load->redirectIn('main/index/error/');
		}
	}
	
	public function signup(){
		$data = array(
				'title'=> 'Login | Retail Manager'
			);
		$this->load->view('signup',$data);
	}
	
	public function customer(){
		
		$name = $_POST['customerName'];
		$address = $_POST['customerAddress'];
		$mobile = $_POST['customerMobile'];
		$userName = $_POST['customerEmail'];
		$userPass = $_POST['customerPassword'];
		$this->load->model('mainModel');
		$dbModel = new mainModel();
		$r1 = $dbModel->addCustomer($name, $address, $mobile);
		$res = $dbModel->getCustomerID($name, $address, $mobile)->fetch_assoc();
		$r2 = $dbModel->addCustomerCredential($res['customerID'], $name, $userName, $userPass);
		if($r1 && $r2){
			echo 'Congratulations!!! Registration Successful. <a href="'.BASE_URL.'">CLICK HERE</a> to Login!';
		}
		/*
		$data = array(
				'title'=> 'Login | Retail Manager'
			);
		$this->load->view('signup',$data);
		*/
	}

	
	/* Logout Function
	 *	Destroy all session Data and redirect to login page.
	 */
	public function logout()
	{
		Session::destroySession();
		$this->load->redirectIn();
	}
}