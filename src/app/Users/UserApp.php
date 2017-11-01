<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/10/10
 * Time: 0:11
 */

namespace App\Users;

use App\Libs\Config;
use App\Users\Models\UserModel;

class UserApp
{
    private $db = null;
    public function __construct(){}

    public function getDB()
    {
        if ($this->db === null) {
            $db = null;
            try {
                $this->db = Config::getInstance('db')->getDB();
            } catch (\Exception $e) {}
        }
        return $this->db;
    }

    public function addUser($args)
    {
        $model = new UserModel($this->getDB());
        $args['name'] = filter_var($args['name'], FILTER_SANITIZE_STRING);
        $args['email'] = filter_var($args['email'], FILTER_SANITIZE_EMAIL);
        $args['age'] = filter_var($args['age'], FILTER_SANITIZE_STRING);
        $args['description'] = filter_var($args['description'], FILTER_SANITIZE_STRING);
        $args['password'] = filter_var($args['password'], FILTER_SANITIZE_STRING);
        return $model->addUser($args);
    }

    public function getUsers()
    {
        $model = new UserModel($this->getDB());
        return $model->getUsers();
    }
}