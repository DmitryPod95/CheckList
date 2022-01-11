<?php

namespace classes\db;

class ConnectDB
{
	private $host;
	private $pass;
	private $user;
	private $db;

	function __construct()
	{
		include 'config/db/config.php';

		$this->host = HOST;
		$this->pass = PASS;
		$this->user = USER;
		$this->db = DB;
	}

	/**
	*Добавление значений в базу данных
	*@param $id - id пользователя
	*@return bool - true-если успешно, false - если нет.
	*/

	public function add(string $id): bool
	{
		try
		{
			$connectDB = new PDO("mysql:host={$this->host}; dbname={$this->db}, $this->user, $this->pass, [PDO::ATTR_ERRMODE => PDO:ERRMODE_EXCEPTION]");

			$statement = $connectDB->prepare("INSERT INTO user_db (USER_ID,TEHN_CHECK,START_CHECK) VALUES (":user_id", '' ,'')");
			$statement->execute(['user_id'->$id]);

			return true;

		}catch(PDOException $ex)
		{

		}
	}


	/**
	* Обновление значений в столбце StartCheck
	*@param id - id пользователя
	*@param input - полученые значения
	*@return bool - true - если запись успешна, false - если нет.
	*/

	public function UpdateStartCheck(string $id, string $input): bool
	{
		try{

			$connectDB = new PDO("mysql:host={$this->host}; dbname={$this->db}, $this->user, $this->pass, [PDO::ATTR_ERRMODE => PDO:ERRMODE_EXCEPTION]");

			$statement = $connectDB->prepare("UPDATE user_db SET START_CHECK = :start_check WHERE USER_ID = :user_id");
			$statement->execute(['user_id'=>$id, 'start_check'=> $input]);

			return true;

		}catch(PDOException $ex)
		{
			return false;
		}
	}

	/**
	* Обновление значений в столбце StartCheck
	*@param id - id пользователя
	*@param input - полученые значения
	*@return bool - true - ксли запись успешна, false - если нет.
	*/

	public function UpdateTehnCheck(string $id, string $input): bool
	{
		try
		{
			$connectDB = new PDO("mysql:host={$this->host}; dbname={$this->db}, $this->user, $this->pass, [PDO::ATTR_ERRMODE => PDO:ERRMODE_EXCEPTION]");

		$statement = $connectDB->prepare("UPDATE user_db SET TEHN_CHECK = :tehn_check WHERE USER_ID = :user_id");
		$statement->execute(['user_id'=>$id, 'tenh_check'=> $input]);

		}catch(PDOException $ex)
		{

		}
	}

	/**
	*Получение значений из базы
	*@param id - id - пользователя
	*@return array|int - ассоциативный массив с данными или -1,если неудача
	*/

	public function getValuesInUserId(string $id): bool
	{
		try
		{
			$connectDB = new PDO("mysql:host={$this->host}; dbname={$this->db}, $this->user, $this->pass, [PDO::ATTR_ERRMODE => PDO:ERRMODE_EXCEPTION]");
			$statement = $connectDB->prepare("SELECT * FROM user_db WHERE USER_ID = :user_id");
			$statement->execute(['user_id'=>$id]);

			return $statement->fetch(PDO::FETCH_ASSOC);
			
		}catch(PDOException $ex)
		{
			return -1;
		}
	}
}