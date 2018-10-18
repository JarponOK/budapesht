<?php 

class myDB
{
	var $dblogin = "admin";
	var $dbpass = "";
	var $dbname = "junction";
	var $dbhost = "localhost";
	var $tableName = "firstbd";

	var $db;
	var $itr = 0;
	var $err = "";

	function connect(){
		$this->db =mysqli_connect($this->dbhost, $this->dblogin, $this->dbpass, $this->dbname);
		mysqli_query($this->db, "SET NAMES utf8");
		if(mysqli_connect_errno($this->db)){
			$this->err = "Connect error MySQL: " . mysqli_connect_error();
			exit;
		}

		$strSQL = "SELECT itr FROM firstbd LIMIT 1";
		$sql = mysqli_query($this->db, $strSQL);
		if(mysqli_num_rows($sql) > 0){
			session_start();
			$row = mysqli_fetch_assoc($sql);
			$this->itr = $row['itr'];
			$this->err = "Переменная взята: ";
		}else{
			$this->err = "Проблемка";
		}
	}

	function up(){
		$strSQL = "UPDATE firstbd SET itr = '" . (int)($this->itr + 1) .  "' WHERE itr = '" . (int)$this->itr . "'";
		$sql = mysqli_query($this->db, $strSQL);
		$this->itr += 1;
	}

	function down(){
		$strSQL = "UPDATE firstbd SET itr = '" . (int)($this->itr - 1) .  "' WHERE itr = '" . (int)$this->itr . "'";
		$sql = mysqli_query($this->db, $strSQL);
		$this->itr -= 1;
	}

	function printitr(){
		echo $this->itr;
	}

	function close(){
		mysqli_close($this->db);
	}
}

?>