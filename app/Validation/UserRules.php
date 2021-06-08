<?php

namespace App\Validation;

use App\Models\UserModel;
use Exception;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new UserModel();
            $user = $model->getUserByEmailAddress($data['email']);
            return password_verify($data['password'], base64_decode($user['password']));
        } catch (Exception $e) {
            return false;
        }
    }
}