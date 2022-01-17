<?php
namespace classes\user;

use classes\db\ConnectDB;

class User
{
    private $id;
    private $firstName;
    private $lastName;
//    private $db;

    function __construct($id, $firstName, $lastName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
//        $this->db =  new ConnectDB();
    }

    /**
     * Получение id пользователя
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Получение имени пользователя
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Получение фамилии пользователя
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}
