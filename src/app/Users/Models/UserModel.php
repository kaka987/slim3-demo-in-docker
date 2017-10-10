<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/10/10
 * Time: 10:21
 */

namespace App\Users\Models;

use App\Users\Model;

class UserModel extends Model
{

    public function getUsers()
    {
        $sql = "SELECT * FROM user u";
        $stmt = $this->db->query($sql);
        $results = [];
        while ($row = $stmt->fetch()) {
            $results[] = $row;
        }
        return $results;
    }

    public function addUser($data)
    {
        $sql = "insert into user
            (`name`, email, description, age, password, salt) values
            (:name, :email, :description, :age, :password, :salt)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            "name" => $data['name'],
            "email" => $data['email'],
            "description" => $data['description'],
            "age" => $data['age'],
            "password" => $data['password'],
            "salt" => $data['password']
        ]);
        if(!$result) {
            throw new Exception("could not save record");
        }

        return $result;
    }
}