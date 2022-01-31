
<?php
class Konekcija {
	private $connection;
	function __construct()
	{
		$this->connection = new mysqli('localhost','root','');
		if($this->connection->error) {
			die("Greska pri povezivanju: $this->connection->error");
		}
		$this->connection->query("CREATE DATABASE IF NOT EXISTS `phpproject01");
		$this->connection->select_db('phpproject01');
		$this->connection->query("CREATE TABLE IF NOT EXIStS `users` (`usersId` INT NOT NULL AUTO_INCREMENT , `userName` VARCHAR(128) NOT NULL, `usersEmail` VARCHAR(128) NOT NULL, `usersUid` VARCHAR(128) NOT NULL, `usersPwd`VARCHAR(128) NOT NULL, PRIMARY KEY ('usersId'), UNIQUE `uname`(`username` (50))) ENGINE = innoDB;");
		$this->connection->query("INSERT IGNORE INTO `users` (`usersName`,`usersPwd`) VALUES ('admin@admin','adminpass')");
	}
}
?>
<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpproject01";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
?>
