<?php

namespace classes\db;

use classes\log\Log;

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
            $DBConnect = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, [\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION]);

            $stmt = $DBConnect->prepare("INSERT INTO user_checklist (USER_ID, START_CHECK, TEHN_CHECK) VALUES (:user_id, ' ', ' ')" );
            $stmt->execute(['user_id'=>$id]);

            return true;

        }catch(\PDOException $ex)
        {
            Log::writeLog('Не удалось записать значения в базу данных');
            return false;
        }
	}

    /**Проверка на существования пользователя в базе
     * @param string $id - id пользователя
     * @return bool - true - в случае успеха false- если нет
     */
    public function getUserByUserId(string $id): bool
    {
        try
        {
            $DBConnect = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, [\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION]);

            $stmt = $DBConnect->prepare("SELECT COUNT(*) FROM user_checklist WHERE user_id = :user_id");
            $stmt->execute(['user_id'=>$id]);

            if($stmt->fetch(\PDO::FETCH_ASSOC))
            {
                return true;
            }

            return false;
        }catch (\PDOException $ex)
        {
            Log::writeLog('Не удалось получить данные о пользователе');
            return false;
        }
    }

    /**Обновления колонки START_CHECK
     * @param string $id - id пользователя
     * @param string $input - состояние чекбоксов
     * @return bool - true - если успешно, false - если нет
     */
    public function updateStartCheck(string $id, string $input): bool
    {
        try
        {
            $DBConnect = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, [\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION]);

            $stmt = $DBConnect->prepare("UPDATE user_checklist SET START_CHECK = :start_check WHERE user_id = :user_id");
            $stmt->execute(['start_check'=>$input, 'user_id'=>$id]);

            return true;
        }catch (\PDOException $ex)
        {
            Log::writeLog('Не удалось обновить значения в колонке START_CHECK');
            return false;
        }
    }

    /**Обновления колонки TEHN_CHECK
     * @param string $id - id пользователя
     * @param string $input - состояние чекбоксов
     * @return bool - true - если успешно, false - если нет
     */
    public function updateTehnCheck(string $id, string $input): bool
    {
        try
        {
            $DBConnect = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, [\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION]);

            $stmt = $DBConnect->prepare("UPDATE user_checklist SET TEHN_CHECK = :tehn_check WHERE user_id = :user_id");
            $stmt->execute(['tehn_check'=>$input, 'user_id'=>$id]);

            return true;
        }catch (\PDOException $ex)
        {
            Log::writeLog('Не удалось обновить значения в колонке TEHN_CHECK');
            return false;
        }
    }

    /**
     * Получение состояния чекбоксов по id пользователя
     * @param string $id - id пользователя
     * @return array|int - ассоциативный массив с данными или -1 в случае неудачи
     */
    public function getValuesCheckboxById(string $id)
    {
        try
        {
            $DBConnect = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass, [\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION]);

            $stmt = $DBConnect->prepare("SELECT * FROM user_checklist WHERE user_id = :user_id");
            $stmt->execute(['user_id'=>$id]);

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        }catch (\PDOException $ex)
        {
            Log::writeLog('Не удалось получить состояние чеклистов');
            return -1;
        }
    }


}