<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function get($id = null) 
    {
        if ($id) {
            return User::select($id);
        } else {
            return User::selectAll();
        }
    }

    public function post() 
    {
        $data = json_decode(file_get_contents("php://input"), true);
        return User::insert($data);
    }

    public function put($id) 
    {
        $data = json_decode(file_get_contents("php://input"), true);
        return User::update($data, $id);
    }

    public function delete($id) 
    {
        return User::delete($id);
    }
}
