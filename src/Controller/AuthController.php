<?php

namespace App\Controller;

use App\Services\Auth;

class AuthController extends Controller
{
    public function register(): void
    {
        $auth = new Auth();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formType = $_POST['form_type'] ?? '';

            if ($formType === 'sign') {
                $errors = $auth->signin(); // récupère les erreurs
            } elseif ($formType === 'log') {
                $result = $auth->login();
                if ($result['success']) {
                    $redirect = $result['role'] === 'admin' ? '/adminDashboard' : '/dashboardUser';
                    header("Location: $redirect");
                    exit();
                } else {
                    $errors[] = $result['message'];
                }
            }
        }

        // Appelle la vue avec les erreurs
        $this->render('View/page/register', [
            'errors' => $errors
        ]);
    }
}

