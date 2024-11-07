<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url']); // Added 'url' helper for redirection.
        $data = [];
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'email'    => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'password_confirm' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $model->save([
                    'username' => $this->request->getVar('username'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ]);
                return redirect()->to('/auth/login')->with('success', 'Registration successful. You can now log in.');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/register', $data); // Changed echo to return
    }

    public function login()
    {
        helper(['form', 'url']); // Added 'url' helper for redirection.
        $data = [];
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email'    => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]',
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                
                if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
                    // Set session
                    $sessionData = [
                        'user_id'   => $user['id'],
                        'username'  => $user['username'],
                        'email'     => $user['email'],
                        'logged_in' => true
                    ];
                    session()->set($sessionData);
                    
                    return redirect()->to('/dashboard')->with('success', 'You are logged in.');
                } else {
                    $data['error'] = 'Invalid email or password';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/login', $data); // Changed echo to return
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'You have been logged out.');
    }
}
