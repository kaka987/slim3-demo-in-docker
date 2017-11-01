<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/11/1
 * Time: 15:00
 */
namespace App\Libs;
class MysqlPdo
{

    private $db = null;
    private $dbConfig = [];

    public function __construct()
    {
        $this->dbConfig = Config::getSettings('db');
    }

    public function getDB()
    {
        if ($this->db != null) {
            return $this->db;
        } else {
            $db = $this->dbConfig;
            $pdo = new \PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            return $this->db = $pdo;
        }
    }
}