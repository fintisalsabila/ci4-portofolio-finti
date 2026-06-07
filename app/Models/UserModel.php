<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'reset_token', 'reset_expires', 'role', 'fullname', 'avatar', 'is_active', 'last_login'];
    protected $useTimestamps = true;
    
    public function verifyLogin($email, $password)
    {
        $user = $this->where('email', $email)->orWhere('username', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            if (!$user['is_active']) return false;
            $this->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);
            return $user;
        }
        return false;
    }
    
    public function setResetToken($email)
    {
        $user = $this->where('email', $email)->first();
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $this->update($user['id'], ['reset_token' => $token, 'reset_expires' => $expires]);
            return $token;
        }
        return false;
    }
    
    public function verifyResetToken($token)
    {
        return $this->where('reset_token', $token)
                    ->where('reset_expires >', date('Y-m-d H:i:s'))
                    ->first();
    }
    
    public function resetPassword($token, $newPassword)
    {
        $user = $this->where('reset_token', $token)->first();
        if ($user) {
            $this->update($user['id'], [
                'password' => password_hash($newPassword, PASSWORD_BCRYPT),
                'reset_token' => null,
                'reset_expires' => null
            ]);
            return true;
        }
        return false;
    }
}