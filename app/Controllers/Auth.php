<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        
        $data = ['title' => 'Login | Admin Panel'];
        return view('auth/login', $data);
    }
    
    public function doLogin()
    {
        $userModel = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $userModel->verifyLogin($email, $password);
        
        if ($user) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'fullname' => $user['fullname'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/admin')->with('success', 'Welcome back, ' . $user['fullname'] . '!');
        }
        
        return redirect()->to('/auth/login')->with('error', 'Invalid email/username or password');
    }
    
    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        
        $data = ['title' => 'Create Account | Admin Panel'];
        return view('auth/register', $data);
    }
    
    public function doRegister()
    {
        $userModel = new UserModel();
        
        $rules = [
            'fullname' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }
        
        $userModel->insert([
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => 'editor',
            'is_active' => 1
        ]);
        
        return redirect()->to('/auth/login')->with('success', 'Account created! Please login.');
    }
    
    public function forgotPassword()
    {
        $data = ['title' => 'Forgot Password | Admin Panel'];
        return view('auth/forgot_password', $data);
    }
    
    public function doForgotPassword()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        
        $token = $userModel->setResetToken($email);
        
        if ($token) {
            // In production, send email here
            session()->setFlashdata('success', 'Reset link sent to your email. Use token: ' . $token);
            return redirect()->to('/auth/reset-password/' . $token);
        }
        
        return redirect()->back()->with('error', 'Email not found');
    }
    
    public function resetPassword($token = null)
    {
        $userModel = new UserModel();
        $user = $userModel->verifyResetToken($token);
        
        if (!$user) {
            return redirect()->to('/auth/login')->with('error', 'Invalid or expired reset token');
        }
        
        $data = [
            'title' => 'Reset Password',
            'token' => $token
        ];
        return view('auth/reset_password', $data);
    }
    
    public function doResetPassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm_password');
        
        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match');
        }
        
        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters');
        }
        
        $userModel = new UserModel();
        if ($userModel->resetPassword($token, $password)) {
            return redirect()->to('/auth/login')->with('success', 'Password reset successful! Please login.');
        }
        
        return redirect()->to('/auth/login')->with('error', 'Failed to reset password');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}