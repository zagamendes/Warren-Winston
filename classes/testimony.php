<?php
	include_once("conexao.php");
	class Testimony{
		private $id=0;
		private $name;
		private $occupation;
		private $photo;
		private $testimony;
		private $changedPicture=false;
		private $oldPhoto;

		public function getOldPhoto(){
			return $this->oldPhoto;
		}

		public function setOldPhoto($oldPhoto){
			$this->oldPhoto = $oldPhoto;
		}

		public function getId(){
			return $this->id;
		}

		public function getName(){
			return $this->name;
		}

		public function getOccupation(){
			return $this->occupation;
		}

		public function getPhoto(){
			return $this->photo;
		}

		public function getTestimony(){
			return $this->testimony;
		}

		public function getChangedPicture(){
			return $this->changedPicture;
		}


		public function setId($id){
			$this->id = $id;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function setOccupation($occupation){
			$this->occupation = $occupation;
		}

		public function setPhoto($photo){
			$this->photo = $photo;
		}

		public function setTestimony($testimony){
			$this->testimony = $testimony;
		}

		public function setChangedPicture($value){
			$this->changedPicture = $value;
		}
	}

	class TestimonyDAO{
		

		public function save($testimony){
			$bd = new Connection();
			$connection = $bd->connect_db();

			$id=$testimony->getId();
			$changedPicture = $testimony->getChangedPicture();

			$name = $testimony->getName();
			$occupation = $testimony->getOccupation();
			$photo = $testimony->getPhoto();
			$testimony = $testimony->getTestimony();


			if($id==0){

				$stmt = $connection->prepare("insert into testimony (name,occupation,photo,testimony) values (?,?,?,?)");
				$stmt->bind_param("ssss",$name,$occupation,$photo,$testimony);

			}else{

				if($changedPicture){
					unlink("../img/".$testimony->getOldPhoto());

					$stmt = $connection->prepare("update testimony set name=?, occupation=?, photo=?, testimony=? where id=?");
				

					$stmt->bind_param("ssssi",$name,$occupation,$photo,$testimony,$id);

				}else{
					$stmt = $connection->prepare("update testimony set name=?, occupation=?, testimony=? where id=?");
				

					$stmt->bind_param("sssi",$name,$occupation,$testimony,$id);
				}
				
				

			}

			$error=null;
			if(!$stmt->execute()){
				$error=$stmt->error;
			}
			$bd->close_db($connection);
			return $error;	
		}

		public function listTestimonies(){
			$db = new Connection();
			$connection = $db->connect_db();
			$testimonies = array();
			$result=$connection->query("select * from testimony");
			while($data=$result->fetch_assoc()){
				$testimony = new Testimony();
				$testimony->setId($data["id"]);
				$testimony->setName($data["name"]);
				$testimony->setOccupation($data["occupation"]);
				$testimony->setPhoto($data["photo"]);
				$testimony->setTestimony($data["testimony"]);
				$testimonies[] = $testimony;
			}
			$db->close_db($connection);
			return $testimonies;
		}

		public function listTestimoniesById($id){
			$db = new Connection();
			$connection = $db->connect_db();
			$result = $connection->query("select *from testimony where id=$id");
			$data= mysqli_fetch_assoc($result);
			
			$testimony = new Testimony();
			$testimony->setId($data["id"]);
			$testimony->setName($data["name"]);
			$testimony->setOccupation($data["occupation"]);
			$testimony->setPhoto($data["photo"]);
			$testimony->setTestimony($data["testimony"]);

			$db->close_db($connection);

			return $testimony;
		}
	}
?>