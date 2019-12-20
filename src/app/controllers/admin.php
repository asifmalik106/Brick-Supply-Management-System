<?php
include 'system/Controller.php';
class admin extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function sessionVerify($data){
		if($data=='verify'){
			if (!(array_key_exists('data', $_SESSION) && $_SESSION['data']['userRank'] == 'admin')){
				$this->load->redirectIn();
			}
		}
	}

	public function index(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Home | Brick Management'
				);
		$this->load->model("adminModel");
		$adminModel = new adminModel();
		$data['order'] = $adminModel->getOrderList();
		//$data['order123'] = $adminModel->getBrick();
		$this->load->view('admin/home', $data);
	}
	
		public function approve(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Home | Brick Management'
				);
		$this->load->model("adminModel");
		$reqData = func_get_arg(0);
		$adminModel = new adminModel();
		$data['order'] = $adminModel->getOrderInfo($reqData[0])->fetch_assoc();
			$newStock = $data['order']['brickQuantity'] - $data['order']['orderQuantity'];
			$r1 = $adminModel->updateStock($data['order']['brickID'], $newStock);
			$r2 = $adminModel->updateOrder($data['order']['orderID'], 'approved');
			if($r1 && $r2){
				$data['result'] = "approve";
			}
			$mobile = $adminModel->getCustomerInfo($data['order']['customerID'])->fetch_assoc();
			$text = "Congratulations ".$mobile['customerName']."! Your order is approved and will be delivered soon!";
			
			SMS::sendSMS($mobile['customerMobile'], $text);
		//$data['order123'] = $adminModel->getBrick();
		$this->load->view('admin/orderResult', $data);
	}
	
	public function delete(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Home | Brick Management'
				);
		$this->load->model("adminModel");
		$reqData = func_get_arg(0);
		$adminModel = new adminModel();
		$data['result'] = $adminModel->deleteBrick($reqData[0]);
		$this->load->view("admin/brickDeleteResult", $data);
	}		
	
	public function cancel(){
		$this->sessionVerify('verify');
		$data = array(
				'title'=> 'Home | Brick Management'
				);
		$this->load->model("adminModel");
		$reqData = func_get_arg(0);
		$adminModel = new adminModel();
		$r = $adminModel->updateOrder($reqData[0], 'cancelled');
		if($r){
			$data['result'] = 'cancel';
		}
			$data['order'] = $adminModel->getOrderInfo($reqData[0])->fetch_assoc();
			$mobile = $adminModel->getCustomerInfo($data['order']['customerID'])->fetch_assoc();
			$text = "Sorry ".$mobile['customerName']."! Your order is cancelled! We will reach you soon!";
			
			SMS::sendSMS($mobile['customerMobile'], $text);
		//$data['order123'] = $adminModel->getBrick();
		$this->load->view('admin/orderResult', $data);
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
	
	
	public function customer(){
		$this->sessionVerify('verify');
		if(func_get_arg(0)==null){
				$data = array(
					'title'=> 'Customer | Brick Management'
				);
				$this->load->model('adminModel');
				$adminModel = new adminModel();
				$data['customer'] = $adminModel->getCustomer();
			$this->load->view('admin/customer', $data);
			//$this->load->view('admin/customerList', $data);
		}else{ 
			$reqData = func_get_arg(0);

			/*
			echo "<pre>";
			print_r($reqData);
			echo "</pre>";
			*/
		}
	}
	
	

}