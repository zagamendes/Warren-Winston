<?php
	
	include_once("conexao.php");


	class content_workshop_right_side{
		private $id=0;
		private $content="";
	

		public function getId(){
			return $this->id;

		}

		public function setId($id){
			$this->id=$id;
		}

		public function getContent(){
			return $this->content;
		}

		public function setContent($content){
			$this->content=$content;
		}

	
	}

	class content_workshop_right_sideDAO{
		public function save($content){
			$db = new Connection();
			$connection=$db->connect_db();
			
			if($content->getId()==0){
				$stmt=$connection->prepare("insert into content_workshop_right_side(content) values(?)");
				$stmt->bind_param("s",$content->getContent());
			}else{
				$id=$content->getId();
				$stmt=$connection->prepare("update content_workshop_right_side set content = ? where id=?");
				$stmt->bind_param("si",$content->getContent(),$id);
			}
			$error = null;
			if(!$stmt->execute()){
				$error=$stmt->error;
				
			}
			$db->close_db($connection);
			return $error;
		}

		public function listContent(){
			$db = new Connection();
			$connection=$db->connect_db();
			$result=$connection->query("select *from content_workshop_right_side");
			$content=mysqli_fetch_assoc($result);
			
			$content_workshop_right_side = new content_workshop_right_side();

			$content_workshop_right_side->setId($content["id"]);
			$content_workshop_right_side->setContent($content["content"]);
			
			$db->close_db($connection);
			return $content_workshop_right_side;
		}
	}
?>