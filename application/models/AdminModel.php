<?php
	class AdminModel extends CI_Model{

		function systemInfo(){
			$result[] = $this->db->count_all('dzdz_userinfo');
			$result[] = $this->db->count_all('dzdz_opinion');
			$result[] = $this->db->count_all('dzdz_hero');
			return $result;
		}

		//UserOperation
		function showUser(){
			$query = $this->db->select('dzdz_userinfo.*,count_opinion.count')->where('dzdz_userinfo.id=count_opinion.user_id')->from('dzdz_userinfo,count_opinion')->get();
			return $query->result();    
		}

		function selectUser(){
			$this->db->where("id=".$_GET['user_id']);
			$query = $this->db->get("dzdz_userinfo");
			return $query->result();
		}

		function updateUser(){
			$data = array("id" => $_POST['user_id'], "name" => $_POST['name'], "game_field" => $_POST['game_field'], "common_heroes" => $_POST['common_heroes'], "qq" => $_POST['qq'], "phone" => $_POST['phone']);
			return $this->db->replace("dzdz_userinfo",$data);
		}

		/*
		function deleteUser(){
			$this->db->where("id=".$_GET['user_id']);
			$bool1 = $this->db->delete("dzdz_userinfo");
			$this->db->where("id=".$_GET['user_id']);
			$bool2 = $this->db->delete("dzdz_login");
			return ($bool1 && $bool2);
		}
		*/

		//SuggestionOperation
		function showSugg(){
			$query = $this->db->select('dzdz_userinfo.name,dzdz_opinion.*')->where('dzdz_userinfo.id=dzdz_opinion.user_id')->from('dzdz_userinfo,dzdz_opinion')->get();
			return $query->result();
		}

		function selectSugg(){
			$this->db->where("opin_id=".$_GET['opin_id']);
			$query = $this->db->get("dzdz_opinion");
			return $query->result();
		}

		function handleSugg(){
			$this->db->set("situation",$_POST['situation']);
			$this->db->set("note",$_POST['note']);
			$this->db->where("opin_id=".$_POST['opin_id']);
			return $this->db->update("dzdz_opinion");
		}

		function deleteSugg(){
			$this->db->where("opin_id=".$_GET['opin_id']);
			return $this->db->delete("dzdz_opinion");
		}

		//HeroOperation
		function showHero(){
			$query = $this->db->select('dzdz_hero.hero_id,dzdz_hero.heroName,dzdz_heroinfo.heroType,dzdz_heroinfo.viability,dzdz_heroinfo.attackDamage,dzdz_heroinfo.skillEffect,dzdz_heroinfo.difficultStarted')->where('dzdz_hero.hero_id=dzdz_heroinfo.hero_id')->from('dzdz_hero,dzdz_heroinfo')->get();
			return $query->result();
		}

		function selectHero(){
			$query = $this->db->select('dzdz_hero.hero_id,dzdz_hero.heroName,dzdz_heroinfo.heroType,dzdz_heroinfo.viability,dzdz_heroinfo.attackDamage,dzdz_heroinfo.skillEffect,dzdz_heroinfo.difficultStarted')
			->where('dzdz_hero.hero_id=dzdz_heroinfo.hero_id and dzdz_hero.hero_id='.$_GET['hero_id'])
			->from('dzdz_hero,dzdz_heroinfo')->get();
			return $query->result();
		}

		function updateHero(){
			$data1 = array("hero_id" => $_POST['hero_id'], "heroType" => $_POST['heroType'], 
				"viability" => $_POST['viability'], "attackDamage" => $_POST['attackDamage'], 
				"skillEffect" => $_POST['skillEffect'], "difficultStarted" => $_POST['difficultStarted']);
			$bool1 = $this->db->replace("dzdz_heroinfo",$data1);

			$this->db->set("heroName",$_POST['heroName']);
			$this->db->where("hero_id=".$_POST['hero_id']);
			$bool2 = $this->db->update("dzdz_hero");

			return ($bool1 && $bool2);
		}

		function deleteHero(){
			$this->db->where("hero_id=".$_GET['hero_id']);
			$info = $this->db->get("dzdz_hero")->result();
			$dir = "D:/wamp/www/CI_Forum/images/heroes/".$info[0]->heroName."/";

			$bool3 = false;
			if(is_dir($dir)){
				unlink(rtrim($dir,"/").".jpg");
				$handle = opendir($dir);
			    while (($file = readdir($handle)) !== false) {
			        if ($file != "." && $file != "..") {
			            unlink($dir.$file);
			        }
			    }
			    closedir($handle);
		        $bool3 = rmdir($dir);
			}
			else{
				$bool3 = true;
			}

			$this->db->where("hero_id=".$_GET['hero_id']);
			$bool1 = $this->db->delete("dzdz_heroinfo");

			$this->db->where("hero_id=".$_GET['hero_id']);
			$bool2 = $this->db->delete("dzdz_hero");

			return ($bool1 && $bool2 && $bool3);
		} 

		function addHero(){

			$result = array();
			if(empty($_FILES['logURL']['tmp_name']) || empty($_FILES['log1']['tmp_name']) || empty($_FILES['log2']['tmp_name']) || empty($_FILES['bg1']['tmp_name']) || empty($_FILES['bg2']['tmp_name'])){
				$result['error'] = "File don't upload.";
				return $result;
			}
			if (!( ($_FILES['logURL']['type'] == "image/jpeg") && ($_FILES['log1']['type'] == "image/jpeg") 
				&& ($_FILES['log2']['type'] == "image/jpeg") && ($_FILES['bg1']['type'] == "image/jpeg") 
				&& ($_FILES['bg2']['type'] == "image/jpeg") )){
				$result['error'] = "File type illegal.";
				return $result;
			}
			if($_FILES['logURL']['error'] > 0){
				$result['error'] = "Main log has error.Num is: ".$_FILES['logURL']['error'];
				return $result;
			}
			if($_FILES['log1']['error'] > 0){
				$result['error'] = "Log1 has error.Num is: ".$_FILES['log1']['error'];
				return $result;
			}
			if($_FILES['log2']['error'] > 0){
				$result['error'] = "Log2 has error.Num is: ".$_FILES['log2']['error'];
				return $result;
			}
			if($_FILES['bg1']['error'] > 0){
				$result['error'] = "Background1 has error.Num is: ".$_FILES['bg1']['error'];
				return $result;
			}
			if($_FILES['bg2']['error'] > 0){
				$result['error'] = "Background2 has error.Num is: ".$_FILES['bg2']['error'];
				return $result;
			}

			else{
				if (basename($_FILES['logURL']['name'], ".jpg") != $_POST['heroName']) {
					$return['error'] = "Main log name must be equal with Hero Name.";
					return $result;
				}
				if (file_exists("/CI_Forum/images/heroes/".$_FILES['logURL']['name'])) {
					$result['error'] = "Main log already exists.";
					return $result;
				}
				if (file_exists("/CI_Forum/images/heroes/".basename($_FILES['logURL']['name'],".jpg")."/"
					.$_FILES['log1']['name'])) {
					$result['error'] = "Log1 already exists.";
					return $result;
				}
				if (file_exists("/CI_Forum/images/heroes/".basename($_FILES['logURL']['name'],".jpg")."/"
					.$_FILES['log2']['name'])) {
					$result['error'] = "Log2 already exists.";
					return $result;
				}
				if (file_exists("/CI_Forum/images/heroes/".basename($_FILES['logURL']['name'],".jpg")."/"
					.$_FILES['bg1']['name'])) {
					$result['error'] = "Background1 already exists.";
					return $result;
				}
				if (file_exists("/CI_Forum/images/heroes/".basename($_FILES['logURL']['name'],".jpg")."/"
					.$_FILES['bg2']['name'])) {
					$result['error'] = "Background2 already exists.";
					return $result;
				}

				else{
					$path = "D:/wamp/www/CI_Forum/images/heroes/".$_POST['heroName'];
					if(!mkdir($path)){
						$result['error'] = "Create folder faield.";
						return $result;
					}
					move_uploaded_file($_FILES['logURL']['tmp_name'], 
						"D:/wamp/www/CI_Forum/images/heroes/".$_FILES['logURL']['name']);
					move_uploaded_file($_FILES['log1']['tmp_name'], $path."/".$_FILES['log1']['name']);
					move_uploaded_file($_FILES['log2']['tmp_name'], $path."/".$_FILES['log2']['name']);
					move_uploaded_file($_FILES['bg1']['tmp_name'], $path."/".$_FILES['bg1']['name']);
					move_uploaded_file($_FILES['bg2']['tmp_name'], $path."/".$_FILES['bg2']['name']);
					$url = "/CI_Forum/images/heroes/";
					$logURL = $url.$_FILES['logURL']['name'];
					$log1 = $url.$_POST['heroName']."/".$_FILES['log1']['name'];
					$log2 = $url.$_POST['heroName']."/".$_FILES['log2']['name'];
					$bg1 = $url.$_POST['heroName']."/".$_FILES['bg1']['name'];
					$bg2 = $url.$_POST['heroName']."/".$_FILES['bg2']['name'];
				}
			}

			$data1 = array('heroName' => $_POST['heroName'], 'logURL' => $logURL);
			$bool1 = $this->db->insert("dzdz_hero",$data1);

			$hero_id = $this->db->insert_id();
			$data2 = array('hero_id' => $hero_id, 'heroType' => $_POST['heroType'], "viability" =>$_POST['viability'], 
				'attackDamage' => $_POST['attackDamage'], 'skillEffect' => $_POST['skillEffect'], 
				'difficultStarted' => $_POST['difficultStarted'], 'log1' => $log1, 'log2' => $log2, 
				'bg1' => $bg1, 'bg2' => $bg2);
			$bool2 = $this->db->insert("dzdz_heroinfo",$data2);
			if($bool1 && $bool2){
				$result['error'] = "Insert sucessful.";
			}
			else{
				$result['error'] = "Insert database error.";
			}
			return $result;
		}

		//wallpaperOperation
		function showWallpaper(){
			$query = $this->db->get("dzdz_wallpaper");
			return $query->result();
		}

		function deleteWallpaper(){
			$this->db->where("wp_id=".$_GET['wp_id']);
			$info = $this->db->get("dzdz_wallpaper")->result();
			$dir = "D:/wamp/www/CI_Forum/images/wallpaper/".$info[0]->wpName.".jpg";
			if(file_exists($dir)){
				$bool_file = unlink($dir);
			}
			else {
				$bool_file = true;
			}			

			$this->db->where("wp_id=".$_GET['wp_id']);
			$bool_db = $this->db->delete("dzdz_wallpaper");

			return ($bool_file && $bool_db);
		}

		function addWallpaper(){
			$result = array();
			if(empty($_FILES['wallpaper']['tmp_name'])){
				$result['error'] = "File don't upload.";
				return $result;
			}
			if ($_FILES['wallpaper']['type'] != "image/jpeg"){
				$result['error'] = "File type illegal.";
				return $result;
			}
			if($_FILES['wallpaper']['error'] > 0){
				$result['error'] = "Wallpaper has error.Num is: ".$_FILES['wallpaper']['error'];
				return $result;
			}
			
			else{
				if (file_exists("/CI_Forum/images/wallpaper/".$_FILES['wallpaper']['name'])) {
					$result['error'] = "Wallpaper already exists.";
					return $result;
				}

				else{
					$path = "D:/wamp/www/CI_Forum/images/wallpaper/".$_FILES['wallpaper']['name'];
					move_uploaded_file($_FILES['wallpaper']['tmp_name'], $path);
					$wpName = rtrim($_FILES['wallpaper']['name'], ".jpg");
					$wpURL = substr($path, 11);
				}
			}

			$data = array('wpName' => $wpName, 'wpURL' => $wpURL);
			$bool = $this->db->insert("dzdz_wallpaper",$data);

			if($bool){
				$result['error'] = "Insert sucessful.";
			}
			else{
				$result['error'] = "Insert database error.";
			}
			return $result;
		}

		//videoOperation
		function showVideo(){
			$query = $this->db->get("dzdz_video");
			return $query->result();
		}

		function deleteVideo(){
			$this->db->where("v_id=".$_GET['v_id']);
			$info = $this->db->get("dzdz_video")->result();
			$dir1 = "D:/wamp/www/CI_Forum/images/video/".$info[0]->vName.".mp4";
			$dir2 = "D:/wamp/www/CI_Forum/images/video/".$info[0]->vName.".jpg";
			if(file_exists($dir1)){
				$bool_file_pic = unlink($dir1);
			}
			else {
				$bool_file_pic = true;
			}
			if(file_exists($dir2)){
				$bool_file_v = unlink($dir2);
			}
			else {
				$bool_file_v = true;
			}

			$this->db->where("v_id=".$_GET['v_id']);
			$bool_db = $this->db->delete("dzdz_video");

			return ($bool_file_pic && $bool_file_v && $bool_db);
		}

		function addVideo(){
			$result = array();
			if(empty($_FILES['video']['tmp_name']) || empty($_FILES['picture']['tmp_name'])){
				$result['error'] = "File don't upload.";
				return $result;
			}
			if (($_FILES['video']['type'] != "video/mp4") || ($_FILES['picture']['type'] != "image/jpeg")){
				$result['error'] = "File type illegal.";
				return $result;
			}
			if($_FILES['picture']['error'] > 0){
				$result['error'] = "Picture has error.Num is: ".$_FILES['picture']['error'];
				return $result;
			}
			if($_FILES['video']['error'] > 0){
				$result['error'] = "Video has error.Num is: ".$_FILES['video']['error'];
				return $result;
			}
			
			else{
				if (file_exists("/CI_Forum/images/video/".$_FILES['picture']['name'])) {
					$result['error'] = "Picture already exists.";
					return $result;
				}
				if (file_exists("/CI_Forum/images/video/".$_FILES['video']['name'])) {
					$result['error'] = "Video already exists.";
					return $result;
				}

				if(rtrim($_FILES['picture']['name'], ".jpg") != rtrim($_FILES['video']['name'], ".mp4")){
					$result['error'] = "Picture and Video isn't same.";
					return $result;
				}

				else{
					$path = "D:/wamp/www/CI_Forum/images/video/";
					move_uploaded_file($_FILES['picture']['tmp_name'], $path.$_FILES['picture']['name']);
					move_uploaded_file($_FILES['video']['tmp_name'], $path.$_FILES['video']['name']);
					$vName = rtrim($_FILES['picture']['name'], ".jpg");
					$picURL = substr($path, 11).$_FILES['picture']['name'];
					$vURL = substr($path, 11).$_FILES['video']['name'];
				}
			}

			$data = array('vName' => $vName, 'picURL' => $picURL, 'vURL' => $vURL);
			$bool = $this->db->insert("dzdz_video",$data);

			if($bool){
				$result['error'] = "Insert sucessful.";
			}
			else{
				$result['error'] = "Insert database error.";
			}
			return $result;
		}

	}
?>