<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/10/10
 * Time: 0:11
 */

namespace App\Admin\Users;

use App\Users\Models\UserModel;

class UserAdminApp
{

    public function getUsers()
    {
        $db = null;
        $model = new UserModel($db);
        return $model->getUsers();
    }
}