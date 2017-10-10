<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/10/10
 * Time: 10:22
 */

namespace App\Users;


abstract class Model {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
}