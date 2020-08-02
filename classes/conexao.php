<?php

class Connection
{
	private $host = "localhost";
	private $user = "root";
	private $password = "vertrigo";
	private $data_base = "warren";

	public function connect_db()
	{
		$connection = mysqli_connect($this->host, $this->user, $this->password, $this->data_base);
		if (mysqli_connect_errno()) {
			echo "failing to try to connect to data_base" . mysqli_Connect_error();
		}
		return $connection;
	}

	public function close_db($connection)
	{
		mysqli_close($connection) or die(mysqli_error($connection));
	}
}
