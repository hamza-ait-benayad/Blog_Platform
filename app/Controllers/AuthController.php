<?php
namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $model = new UserModel();

        if ($this->request->getMethod() == 'POST') {
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            ];
    
            if ($model->insert($data)) {
                return redirect()->to('/auth/login')->with('success', 'Inscription réussie !');
            } else {
                return redirect()->back()->with('errors', $model->errors());
            }
        }
        return view('auth/register');
    }
    

    public function login()
    {
        $model = new UserModel();
        

        if ($this->request->getMethod() == 'POST') {

            $rules = [
                'email'    => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]',
            ];
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ];

                $user = $model->where('email', $data['email'])->first();
                
                if ($user && password_verify($data['password'], $user['password'])) {
                    // Set session
                    $sessionData = [
                        'user_id'   => $user['id'],
                        'username'  => $user['username'],
                        'email'     => $user['email'],
                        'logged_in' => true
                    ];
                    session()->set($sessionData);
                
                    return redirect()->to('/')->with('success', 'You are logged in.');
                } else {
                   // $data['error'] = 'Invalid email or password';
                    return redirect()->back()->with('errors', ["Invalid email or password"]);
                }
        
        }
        log_message('info',$this->request->getMethod() == 'POST');
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'You have been logged out.');
    }
}
