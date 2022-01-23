<?php
namespace classes\user;

use classes\db\ConnectDB;
use classes\exceptions\user\UserException;

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $db;

    private $startColumn = 'start_check';
    private $tehnColumn = 'tehn_check';

    public $startCheck;
    public $tehnCheck;

    function __construct($id, $firstName, $lastName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->db =  new ConnectDB();

        if(!$this->isUser())
        {
            if(!$this->addIdUser())
            {
                throw new UserException('Не удалось создать новую запись по полученным данным');
            }
            if(!$this->getValuesCheckbox())
            {
                throw new UserException('Не удалось получить значения из базы');
            }
        }else
        {
            return $this->getValuesCheckbox();
        }

    }


    /**Добавление пользователя в базу данных по id
     * @return bool
     */
    private function addIdUser(): bool
    {
        return $this->db->add($this->id);
    }

    /**
     * Получение обьект пользователя из базы
     * @return bool
     */
    private function isUser(): bool
    {
        return $this->db->getUserByUserId($this->id);
    }

    /**
     * @return bool - вернуть true в случае успеха
     * @throws UserException - если невозможно сохранить значение
     */
    public function saveValueStartCheck(): bool
    {
        $str = serialize($this->startCheck);
        $result = $this->db->updateStartCheck($this->id,$str);
        if(!$result)
        {
            throw new UserException('Невозможно сохранить значение в колонку StartCheck');
        }

        return true;
    }
    /**
     * @return bool - вернуть true в случае успеха
     * @throws UserException - если невозможно сохранить значение
     */
    public function saveValueTehnCheck(): bool
    {
        $str = serialize($this->tehnCheck);
        $result = $this->db->updateTehnCheck($this->id,$str);
        if(!$result)
        {
            throw new UserException('Невозможно сохранить значение в колонку TehnCheck');
        }

        return true;
    }

    /**
     * Получение состояние чекбоксов
     * @return bool - true - если успешно, false - если нет
     */
    public function getValuesCheckbox(): bool
    {
        $response = $this->db->getValuesCheckboxById($this->id);
        if($response == -1)
        {
            return false;
        }

        $this->startCheck = unserialize($response[$this->startColumn]);
        $this->tehnCheck = unserialize($response[$this->tehnColumn]);

        return true;
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
