<?php
	class UserModel extends CI_Model{
		function showInfo(){
			$this->db->where("id=".$_SESSION['userID']);
			$query = $this->db->get("dzdz_userinfo");
			return $query->result();
		}

		function update(){
			$data = array("id" => $_POST['id'], "name" => $_POST['name'], "game_field" => $_POST['game_field'], "common_heroes" => $_POST['common_heroes'], "qq" => $_POST['qq'], "phone" => $_POST['phone']);
			return $this->db->replace("dzdz_userinfo",$data);
		}

		function addSugg(){
			$data = array('user_id' => $_SESSION['userID'], 'opin_name'=>$_POST['name'], 'content'=>$_POST['content']);
			return $this->db->insert("dzdz_opinion",$data);
		}

		function showSugg(){
			$this->db->where("user_id=".$_SESSION['userID']);
			$query = $this->db->get("dzdz_opinion");
			return $query->result();
		}

		function showWallpaper(){
			$query = $this->db->get("dzdz_wallpaper");
			return $query->result();
		}

		function showVideo(){
			$query = $this->db->get("dzdz_video");
			return $query->result();
		}

		function showHero(){
			$query = $this->db->get("dzdz_hero");
			return $query->result();
		}

		function heroDetail(){
			$query = $this->db->select("dzdz_hero.heroName,dzdz_heroinfo.*")
				->where("dzdz_hero.hero_id=dzdz_heroinfo.hero_id and dzdz_hero.hero_id=".$_GET['hero_id'])->from("dzdz_hero,dzdz_heroinfo")->get();
			return $query->result();
		}

	}
?>