<?php	
	class Index extends CI_Controller {
		function __construct(){
			session_start();
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model("IndexModel");
		}

		//The system entrance
		function index(){
			$this->load->view("SignIN");
		}

		//For user/admin to login the system 
		function login(){
			if(isset($_POST['sbt'])){				
				$check = $this->IndexModel->login();
				if($check['err'] == 0){
					$_SESSION['userID'] = $check['userID'];
					switch ($check['userType']) {
						case 0:
							$this->UserHome();
							break;	

						case 1:
							$this->AdminHome();
							break;
					}
				}
				else{
					$this->load->view("SignIN",$check);	
				}
			}
			else{
				$this->index();
			}		
		}

		//To register new user
		function register(){			
			if(isset($_POST['sbt'])){				
				$check = $this->IndexModel->register();
				if($check['err'] == -1){
					$this->load->view("SignIN",$check);
				}
				else{
					$this->load->view("Register",$check);	
				}			
			}
			else {
				$this->load->view("Register");
			}			
		}

		//The User home page
		function UserHome(){
			if(isset($_SESSION['userID'])){
				$this->load->view("User/welcome.html");	
			}
			else{
				$this->index();
			}	
		}

		//The Admin home page
		function AdminHome(){			
			header("location:".base_url('/Admin/home'));
		}

		//Logout the system
		function logout(){
			//session_start();
			session_destroy();
			$this->index();
		}
	}
?>