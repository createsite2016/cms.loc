<?php


namespace Engine\Core\Database;

use \PDO;
use Engine\Core\Config\Config;

/**
 * Данный класс осуществляет подключение к базе данных и выполняет некоторые запросы
*/
class Connection
{
    private $link;

    /**
     * Создает соединение с базой данных
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Устанавливает соединение с базой данных
     */
    private function connect()
    {
        $config = Config::file('database');

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        // возвращаю текущее подключение
        return $this;
    }

    /**
     * Подготавливает SQL запрос и возвращает индинтификатор запроса
     * @param $sql
     * @param array $values
     * @return mixed
     */
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql); // prepare подготавливает запрос к его выполнению

        return $sth->execute($values); // возвращаю подготовленный запрос
    }

    /**
     * Выполняет запрос, получает ассоциативный массив
     * @param $sql
     * @param array $values
     * @return array
     */
    public function query($sql, $values = [])
    {
        $sth = $this->link->prepare($sql); // prepare подготавливает запрос к его выполнению

        $sth->execute($values); // возвращаю подготовленный запрос

        $result = $sth->FetchAll(PDO::FETCH_ASSOC); // передаю параметр FETCH_ASSOC - получить асоциативный массив

        if($result === false){
            return [];
        }

        return $result;
    }
}