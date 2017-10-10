<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/10/10
 * Time: 0:11
 */

namespace App\Users;

use App\Users\Models\UserModel;

class UserApp
{

    public $config = [];
    public $pdo = null;
    public $logger = null;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getPDO()
    {
        if ($this->pdo != null) {
            return $this->pdo;
        } else {
            $db = $this->config['db'];
            $pdo = new \PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            return $this->pdo = $pdo;
        }
    }

    public function getLogger()
    {
        return ($this->logger != null) ? $this->logger : ($this->logger = $this->config['logger']);
    }

    public function addUser($args)
    {
        $pdo = $this->getPDO();
        $model = new UserModel($pdo);
        $args['name'] = filter_var($args['name'], FILTER_SANITIZE_STRING);
        $args['email'] = filter_var($args['email'], FILTER_SANITIZE_EMAIL);
        $args['age'] = filter_var($args['age'], FILTER_SANITIZE_STRING);
        $args['description'] = filter_var($args['description'], FILTER_SANITIZE_STRING);
        $args['password'] = filter_var($args['password'], FILTER_SANITIZE_STRING);
        return $model->addUser($args);
    }

    public function getUsers()
    {
        $pdo = $this->getPDO();
        $model = new UserModel($pdo);
        return $model->getUsers();
    }
}