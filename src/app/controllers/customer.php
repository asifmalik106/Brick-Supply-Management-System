<?php
include 'system/Controller.php';
class customer extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function sessionVerify($data){
		if($data=='verify'){
			if (!(array_key_exists('data', $_SESSION) && $_SESSION['data']['userRank'] == 'customer')){
				$this->load->redirectIn();
			}
		}
	}

	public function index(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Home | Brick Management'
				);
		$data['js'] = array('js/order.js');
		$this->load->model('customerModel');
		$customerModel = new customerModel();
		$data['brick'] = $customerModel->getBrick();
		$data['order'] = $customerModel->getOrderByCustomer();
		$this->load->view('customer/order', $data);
	}
	
	public function order(){
		$this->sessionVerify('verify');
		if($_POST['brickID']){
			$brickID = $_POST['brickID'];
			$quantity = $_POST['quantity'];
			$payment = $_POST['paymentInfo'];
			$data = array(
					'title'=> 'Home | Brick Management'
					);
			$data['js'] = array('js/order.js');
			$this->load->model('customerModel');
			$customerModel = new customerModel();
			$data['result'] = $customerModel->addOrder($brickID,$quantity,$payment,'pending');
			$this->load->view('customer/orderResult', $data);
		}
	}
	
	public function brick(){
		$this->sessionVerify('verify');
		if(func_get_arg(0)==null){
			$data = array(
					'title'=> 'Brick | Retail Manager'
					);
			$data['js'] = array('dataTables/js/jquery.dataTables.min.js',
							'dataTables/js/dataTables.bootstrap.min.js',
							'dataTables/js/dataTables.responsive.js',
						'js/brick.js'
						);
			$this->load->model("adminModel");
			$adminModel = new adminModel();
			$data['brick'] = $adminModel->getBrick();
			$this->load->view('admin/brickList', $data);
		}else{ 
			$reqData = func_get_arg(0);
			if($reqData[0]=='add')
			{
				$data = array(
					'title'=> 'Add New Brick | Brick Management'
				);
				$this->load->view('admin/addBrick',$data);
			}


			if($reqData[0]=='new')
			{
				if($_POST['brickName']){
				$data = array(
					'title'=> 'Add New Brick | Brick Management'
				);
				$name = Validation::verify($_POST['brickName']);
				$price = Validation::verify($_POST['brickPrice']);
				$quantity = Validation::verify($_POST['brickQuantity']);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['result'] = $adminModel->addBrick($name, $price, $quantity);
				$this->load->view('admin/brickResult',$data);
				}else{
					echo "Error!";
				}
			}
			
			if($reqData[0]=='editSubmit')
			{
				if($_POST['brickName']){
				$data = array(
					'title'=> 'Edit Brick | Brick Management'
				);
				$name = Validation::verify($_POST['brickName']);
				$price = Validation::verify($_POST['brickPrice']);
				$quantity = Validation::verify($_POST['brickQuantity']);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['result'] = $adminModel->editBrick($_POST['brickID'], $name, $price, $quantity);
				$this->load->view('admin/brickResult',$data);
				}else{
					echo "Error!";
				}
			}		
			
			if($reqData[0]=='edit')
			{
				
				$data = array(
					'title'=> 'Add New Brick | Brick Management'
				);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['result'] = $adminModel->getBrickInfo($reqData[1])->fetch_assoc();
				$this->load->view('admin/editBrick',$data);
			}
			/*
			echo "<pre>";
			print_r($reqData);
			echo "</pre>";
			*/
		}
	}
	
	public function change(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Change Phone Number | Brick Management'
				);
		$this->load->view("customer/changePhone", $data);
	}		
	
		public function changeMobile(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Home | Brick Management'
				);
		$this->load->model("customerModel");
		$customerModel = new customerModel();
		$result = $customerModel->updateMobile($_POST['newPhone'],$_SESSION['data']['customerID']);
		if($result){
			echo 'New Mobile Number Updated Successfully!!!<a href="'.BASE_URL.'">CLICK HERE</a> to go to HOME.';
		}else{
			echo 'Something Went Wrong! Please Try Again...<a href="'.BASE_URL.'/customer/change/">CLICK HERE</a> to Try Again.';
		}
	}		
	
	public function customer(){
		$this->sessionVerify('verify');
		if(func_get_arg(0)==null){
			$data = array(
					'title'=> 'Customer | Retail Manager'
					);
			$data['js'] = array('dataTables/js/jquery.dataTables.min.js',
							'dataTables/js/dataTables.bootstrap.min.js',
							'dataTables/js/dataTables.responsive.js',
						'js/brick.js'
						);
			$this->load->model("adminModel");
			$adminModel = new adminModel();
			$data['brick'] = $adminModel->getCustomer();
			$this->load->view('admin/customerList', $data);
		}else{ 
			$reqData = func_get_arg(0);
			if($reqData[0]=='add')
			{
				$data = array(
					'title'=> 'Add New Brick | Brick Management'
				);
				$this->load->view('admin/addCustomer',$data);
			}


			if($reqData[0]=='new')
			{
				if($_POST['brickName']){
				$data = array(
					'title'=> 'Add New Brick | Brick Management'
				);
				$name = Validation::verify($_POST['brickName']);
				$price = Validation::verify($_POST['brickPrice']);
				$quantity = Validation::verify($_POST['brickQuantity']);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['result'] = $adminModel->addBrick($name, $price, $quantity);
				$this->load->view('admin/brickResult',$data);
				}else{
					echo "Error!";
				}
			}
			
			if($reqData[0]=='editSubmit')
			{
				if($_POST['brickName']){
				$data = array(
					'title'=> 'Edit Brick | Brick Management'
				);
				$name = Validation::verify($_POST['brickName']);
				$price = Validation::verify($_POST['brickPrice']);
				$quantity = Validation::verify($_POST['brickQuantity']);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['result'] = $adminModel->editBrick($_POST['brickID'], $name, $price, $quantity);
				$this->load->view('admin/brickResult',$data);
				}else{
					echo "Error!";
				}
			}		
			
			if($reqData[0]=='edit')
			{
				
				$data = array(
					'title'=> 'Add New Brick | Brick Management'
				);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['result'] = $adminModel->getBrickInfo($reqData[1])->fetch_assoc();
				$this->load->view('admin/editBrick',$data);
			}
			/*
			echo "<pre>";
			print_r($reqData);
			echo "</pre>";
			*/
		}
	}
	
	

}