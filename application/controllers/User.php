<?php
	class User extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			session_start();
			if(!isset($_SESSION['userID']) || $_SESSION['userID']==1){
				header("location:".base_url());
			}
			$this->load->database();
			$this->load->model("UserModel");
		}

		function personal_center(){
			if(isset($_SESSION['userID'])){
				$data['result']=$this->UserModel->showInfo();
				$this->load->view("User/personal_center",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function update(){
			if(isset($_SESSION['userID'])){
				$data['result']=$this->UserModel->showInfo();
				$this->load->view("User/update.php",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function updateDB(){
			if(isset($_POST['sbt'])){
				if($this->UserModel->update()){
					$this->personal_center();
				}
				else{
					echo "Update Falied!";
				}	
			}
			else{
				$this->update();
			}
		}

		function suggestion(){
			if(isset($_SESSION['userID'])){
				$this->load->view("User/suggestion");
			}
			else{
				header("location:".base_url());
			}
		}

		function addSuggestion(){
			if(isset($_POST['sbt'])){
				if($this->UserModel->addSugg()){
					$this->suggestion();
				}
				else{
					echo "Add Falied!";
				}	
			}
			else{
				$this->suggestion();
			}			
		}

		function showSuggestion(){
			if(isset($_SESSION['userID'])){
				$data['result']=$this->UserModel->showSugg();
				$this->load->view("User/showSuggestion",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function game_wallpaper(){
			if(isset($_SESSION['userID'])){
				$data['result'] = $this->UserModel->showWallpaper();
				$this->load->view("User/wallpaper",$data);
			}
			else{
				header("location:".base_url());
			}
			
		}

		function game_video(){
			if(isset($_SESSION['userID'])){
				$data['result'] = $this->UserModel->showVideo();
				$this->load->view("User/video",$data);
			}
			else{
				header("location:".base_url());
			}
			
		}

		function game_heroes(){
			if(isset($_SESSION['userID'])){
				$data['result'] = $this->UserModel->showHero();
				$this->load->view("User/heroes",$data);
			}
			else{
				header("location:".base_url());
			}
			
		}

		function heroDetail(){
			if(isset($_GET['hero_id'])){
				$data['result'] = $this->UserModel->heroDetail();
				$this->load->view("User/heroDetail",$data);
			}
			else{
				$this->game_heroes();
			}
		}
		
	}
?>