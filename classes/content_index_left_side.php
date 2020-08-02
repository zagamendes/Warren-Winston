<?php

include_once("conexao.php");


class content_index_left_side
{
	private $id = 0;
	private $content = "";


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}
}

class content_index_left_sideDAO
{
	public function save($content)
	{
		$db = new Connection();
		$connection = $db->connect_db();

		if ($content->getId() == 0) {
			$stmt = $connection->prepare("insert into content_index_left_side(content) values(?)");
			$stmt->bind_param("s", $content->getContent());
		} else {
			$id = $content->getId();
			$stmt = $connection->prepare("update content_index_left_side set content = ? where id=?");
			$stmt->bind_param("si", $content->getContent(), $id);
		}
		$error = null;
		if (!$stmt->execute()) {
			$error = $stmt->error;
		}
		$db->close_db($connection);
		return $error;
	}

	public function listContent()
	{
		$db = new Connection();
		$connection = $db->connect_db();
		$result = $connection->query("select *from content_index_left_side");
		$content = mysqli_fetch_assoc($result);

		$content_index_left_side = new content_index_left_side();

		$content_index_left_side->setId($content["id"]);
		$content_index_left_side->setContent($content["content"]);
		$db->close_db($connection);
		return $content_index_left_side;
	}
}
