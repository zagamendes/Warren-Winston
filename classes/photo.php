<?php

include_once("conexao.php");


class photo
{
	private $id = 0;
	private $table = "";
	private $photo = "";
	private $oldphoto = "";
	private $title = "";
	private $description = "";
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getTable()
	{
		return $this->table;
	}

	public function setTable($table)
	{
		$this->table = $table;
	}

	public function getPhoto()
	{
		return $this->photo;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setPhoto($photo)
	{
		$this->photo = $photo;
	}

	public function getOldPhoto()
	{
		return $this->oldphoto;
	}

	public function setOldPhoto($photo)
	{
		$this->oldphoto = $photo;
	}
}

class photoDAO
{
	public function save($photo)
	{
		$db = new Connection();
		$connection = $db->connect_db();
		$table = $photo->getTable();
		$id = $photo->getId();




		if ($photo->getId() == 0) {
			if ($table == "photo_slideshow") {
				$stmt = $connection->prepare("insert into $table (title,description,photo) values(?,?,?)");
				$stmt->bind_param("sss", $photo->getTitle(), $photo->getDescription(), $photo->getPhoto());
			} else {
				$stmt = $connection->prepare("insert into $table (photo) values(?)");
				$stmt->bind_param("s", $photo->getPhoto());
			}
		} else {
			$photo1 = $photo->getOldPhoto();
			$title = $photo->getTitle();
			$description = $photo->getDescription();
			$photo = $photo->getPhoto();
			echo $photo1 . $title . $description . $photo . $id;

			if ($table == "photo_slideshow" || $table == "photo_slideshow_workshop") {

				if (empty($photo)) {

					$stmt = $connection->prepare("update $table set title = ?, description = ? where id =?");
					$stmt->bind_param("ssi", $title, $description, $id);
				} else {
					$stmt = $connection->prepare("update $table set title = ?, description = ?, photo = ? where id =?");
					$stmt->bind_param("sssi", $title, $description, $photo, $id);

					unlink("../img/" . $photo1);
				}
			} else {
				$stmt = $connection->prepare("update $table set photo = ? where id=?");
				$stmt->bind_param("si", $photo->getPhoto(), $id);
				unlink("../img/" . $photo1);
			}
		}
		$error = null;
		if (!$stmt->execute()) {
			$error = $stmt->error;
		}
		$db->close_db($connection);
		return $error;
	}

	public function listContent($tabela)
	{
		$db = new Connection();
		$connection = $db->connect_db();
		$result = $connection->query("select *from $tabela");
		$photos = array();
		while ($content = $result->fetch_assoc()) {
			$photo = new photo();
			$photo->setId($content["id"]);
			$photo->setPhoto($content["photo"]);
			$photo->setTitle($content["title"]);
			$photo->setDescription($content["description"]);
			$photos[] = $photo;
		}

		$db->close_db($connection);
		return $photos;
	}
	public function listContentProgram($tabela)
	{
		$db = new Connection();
		$connection = $db->connect_db();
		$result = $connection->query("select *from $tabela");
		$photos = array();
		while ($content = $result->fetch_assoc()) {
			$photo = new photo();
			$photo->setId($content["id"]);
			$photo->setPhoto($content["photo"]);

			$photos[] = $photo;
		}

		$db->close_db($connection);
		return $photos;
	}
	public function listContent2($tabela)
	{
		$db = new Connection();
		$connection = $db->connect_db();
		$result = $connection->query("select *from $tabela");
		$content = $result->fetch_assoc();
		$photo = new photo();
		$photo->setId($content["id"]);
		$photo->setPhoto($content["photo"]);
		$photo->setOldPhoto($content["photo"]);
		$db->close_db($connection);
		return $photo;
	}
}
