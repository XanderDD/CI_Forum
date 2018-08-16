<?php
	class IndexModel extends CI_Model{
		function login(){
			$check = array('err' => 0,'userType' => 0);
			$name=trim($_POST['username']);
			$pasd=md5(trim($_POST['password']));
			if( $name == "" || $pasd == "" ){
				$check['err'] = 1;
				return $check;
			}

			$info=$this->db->get_where("dzdz_login",array("userName"=>"$name"));
			
			$user = $info->result();
			if(!empty($user)){
				if( $user[0]->password == $pasd ){
					$check['userID'] = $user[0]->id;
					$check['userType'] = $user[0]->userType;
					return $check;
				}
			}
			$check['err'] = 2;
			return $check;
		}

		function register(){
			$check = array('err' => -1);
			$username = trim($_POST['usernameTxt']);
			$pasd = md5(trim($_POST['pasdTxt1']));
			$cpasd = md5(trim($_POST['pasdTxt2']));
			$name = trim($_POST['nameTxt']);
			$game_field = $_POST['game_field'];
			$common_heroes = $_POST['common_heroes'];
			$QQ = $_POST['QQ'];
			$phone = $_POST['phone_number'];

			if($username == "" or $pasd =="" or $name == "" or $cpasd == ""){
				$check['err'] = 1;
				return $check;
			}
			if($pasd != $cpasd){
				$check['err'] = 2;
				return $check;
			}

			$data = array("username"=>$username,"password"=>$pasd,"userType"=>"0");
			$insertBoolL = $this->db->insert("dzdz_login",$data);

			$id = $this->db->insert_id();

			$data = array("id"=>$id,"name"=>$name,"game_field"=>$game_field,"common_heroes"=>$common_heroes,
				"qq"=>$QQ,"phone"=>$phone);
			$insertBoolU = $this->db->insert("dzdz_userinfo",$data);

			if($insertBoolU == false || $insertBoolL == false){
				$check['err'] = 3;
			}

			return $check;
		}
	}
?>