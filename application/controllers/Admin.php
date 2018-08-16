<?php
	class Admin extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model("AdminModel");
			session_start();
			if(!isset($_SESSION['userID']) || $_SESSION['userID'] != 1){
				header("localhost:".base_url());
			}
		}

		function home(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$data['result'] = $this->AdminModel->systemInfo();
				$this->load->view("/Admin/welcome",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function userManagement(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$data['result'] = $this->AdminModel->showUser();
				$this->load->view("/Admin/userManagement",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function userUpdate(){
			if(isset($_GET['user_id'])){
				$data['result'] = $this->AdminModel->selectUser();
				$this->load->view("/Admin/userUpdate",$data);
			}
			else{
				$this->userManagement();
			}
		}

		function userUpdateDB(){
			if(isset($_POST['user_id'])){
				if($this->AdminModel->updateUser()){
					$this->userManagement();
				}
				else{
					echo "Update Failed.";
				}
			}
			else{
				$this->userManagement();
			}
		}

		/*
		function userDelete(){
			if(isset($_GET['user_id'])){
				if($this->AdminModel->deleteUser()){
					$this->userManagement();
				}
				else{
					echo "Delete Faield.";
				}
			}
			else{
				$this->userManagement();
			}
		}
		*/

		function suggestionManagement(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$data['result'] = $this->AdminModel->showSugg();
				$this->load->view("/Admin/suggestionManagement",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function suggestionHandle(){
			if(isset($_GET['opin_id'])){
				$data['result'] = $this->AdminModel->selectSugg();
				$this->load->view("/Admin/suggestionHandle",$data);
			}
			else{
				$this->suggestionManagement();
			}
		}

		function suggestionHandleDB(){
			if(isset($_POST['opin_id'])){
				if($this->AdminModel->handleSugg()){
					$this->suggestionManagement();
				}
				else{
					echo "Handle Failed.";
				}
			}
			else{
				$this->suggestionManagement();
			}
		}

		function suggestionDelete(){
			if(isset($_GET['opin_id'])){
				if($this->AdminModel->deleteSugg()){
					$this->suggestionManagement();
				}
				else{
					echo "Delete Faield.";
				}
			}
			else{
				$this->suggestionManagement();
			}
		}

		//GameHeroesOperation
		function gameHeroesManagement(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$data['result'] = $this->AdminModel->showHero();
				$this->load->view("/Admin/gameHeroesManagement",$data);
			}
			else{
				header("location:".base_url());
			}
		}

		function gameHeroesUpdate(){
			if(isset($_GET['hero_id'])){
				$data['result'] = $this->AdminModel->selectHero();
				$this->load->view("/Admin/gameHeroesUpdate",$data);
			}
			else{
				$this->gameHeroesManagement();
			}
		}

		function gameHeroesUpdateDB(){
			if(isset($_POST['hero_id'])){
				if($this->AdminModel->updateHero()){
					$this->gameHeroesManagement();
				}
				else{
					echo "Update Failed.";
				}
			}
			else{
				$this->gameHeroesManagement();
			}
		}

		function gameHeroesDelete(){
			if(isset($_GET['hero_id'])){
				if($this->AdminModel->deleteHero()){
					$this->gameHeroesManagement();
				}
				else{
					echo "Delete Faield.";
				}
			}
			else{
				$this->gameHeroesManagement();
			}
		}

		function gameHeroesAdd(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$this->load->view("/Admin/gameHeroesAdd");
			}
			else{
				$this->gameHeroesManagement();
			}
		}

		function gameHeroesAddDB(){
			if(isset($_POST['sbt'])){
				$result = $this->AdminModel->addHero();
				if($result['error'] != "Insert sucessful."){
					$this->load->view("/Admin/gameHeroesAdd",$result);		
				}
				else{
					$this->gameHeroesManagement();
				}
			}
			else{
				$this->gameHeroesAdd();
			}
		}

		//WallpaperOperation
		function wallpaperManagement(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$data['result'] = $this->AdminModel->showWallpaper();
				$this->load->view("/Admin/wallpaperManagement",$data);
			}
			else{
				header("location:".base_url());
			}
			
		}

		function wallpaperDelete(){
			if(isset($_GET['wp_id'])){
				if($this->AdminModel->deleteWallpaper()){
					$this->wallpaperManagement();
				}
				else{
					echo "Delete Faield.";
				}
			}
			else{
				$this->wallpaperManagement();
			}
		}

		function wallpaperAdd(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$this->load->view("/Admin/wallpaperAdd");
			}
			else{
				header("location:".base_url());
			}
			
		}

		function wallpaperAddDB(){
			if(isset($_POST['sbt'])){
				$result = $this->AdminModel->addWallpaper();

				if($result['error'] != "Insert sucessful."){
					$this->load->view("/Admin/wallpaperAdd",$result);					
				}
				else{
					$this->wallpaperManagement();		
				}
			}
			else{
				$this->wallpaperAdd();
			}
		}

		//VideoOperation
		function gameVideoManagement(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$data['result'] = $this->AdminModel->showVideo();
				$this->load->view("/Admin/gameVideoManagement",$data);
			}
			else{
				header("location:".base_url());
			}
			
		}

		function gameVideoDelete(){
			if(isset($_GET['v_id'])){
				if($this->AdminModel->deleteVideo()){
					$this->gameVideoManagement();
				}
				else{
					echo "Delete Faield.";
				}
			}
			else{
				$this->gameVideoManagement();
			}
		}

		function gameVideoAdd(){
			if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
				$this->load->view("/Admin/gameVideoAdd");
			}
			else{
				header("location:".base_url());
			}
			
		}

		function gameVideoAddDB(){
			if(isset($_POST['sbt'])){
				$result = $this->AdminModel->addVideo();

				if($result['error'] != "Insert sucessful."){
					$this->load->view("/Admin/gameVideoAdd",$result);					
				}
				else{
					$this->gameVideoManagement();		
				}
			}
			else{
				$this->gameVideoAdd();
			}
		}
	}
?>