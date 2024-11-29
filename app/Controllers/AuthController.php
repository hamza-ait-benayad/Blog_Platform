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
                $sessionData = [
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'email'     => $user['email'],
                    'logged_in' => true
                ];
                session()->set($sessionData);

                return redirect()->to('/')->with('success', 'You are logged in.');
            } else {
                return redirect()->back()->with('errors', ["Invalid email or password"]);
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'You have been logged out.');
    }

    public function forgotPassword()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if ($user) {
                $token = bin2hex(random_bytes(16)); // Generate reset token
                $userModel->saveResetToken($email, $token);

                $resetLink = base_url("auth/resetPassword?token=$token");

                $emailService = \Config\Services::email();
                $emailService->setFrom('hamza.aitbenayad.32@edu.uiz.ac.ma', 'YourAppName');
                $emailService->setTo($email);
                $emailService->setSubject('Password Reset Request');
                $emailService->setMessage("Click here to reset your password: <a href='$resetLink'>$resetLink</a>");

                if (!$emailService->send()) {
                    log_message('error', 'Failed to send email: ' . $emailService->printDebugger(['headers']));
                    return redirect()->back()->with('error', 'Danger alert! Failed to send reset link. Please try again.');
                }

                return redirect()->back()->with('success', 'Reset link sent successfully!');
            } else {
                return redirect()->back()->with('error', 'Email not registered.');
            }
        }

        return view('auth/forgotPassword');
    }

    public function resetPassword()
    {
        $token = $this->request->getPost('token');
        $newPassword = $this->request->getPost('password');
        $passwordConfirmation = $this->request->getPost('password_confirmation');

        if ($newPassword !== $passwordConfirmation) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        $userModel = new UserModel();
        $user = $userModel->verifyResetToken($token);

        if (!$user) {
            return redirect()->to('auth/login')->with('error', 'Invalid or expired token.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $userModel->update($user['id'], [
            'password' => $hashedPassword,
            'reset_token' => null,
            'token_expiry' => null,
        ]);

        return redirect()->to('auth/login')->with('message', 'Password reset successfully.');
    }

    public function showResetForm()
    {
        $token = $this->request->getGet('token');
        $userModel = new UserModel();
        $user = $userModel->verifyResetToken($token);

        if (!$user) {
            return redirect()->to('auth/login')->with('error', 'Invalid or expired token.');
        }

        return view('resetPassword', ['token' => $token]);
    }
}
