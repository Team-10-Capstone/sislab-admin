<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the user's role from your authentication system.
        $userRole = session()->get('role');

        // Define the roles and their corresponding access levels.
        $roles = [
            0 => 'Guest',
            1 => 'User',
            2 => 'Moderator',
            3 => 'Admin',
        ];

        // Specify the minimum role required to access the route.
        $requiredRole = $arguments[0] ?? null;

        if (!array_key_exists($requiredRole, $roles)) {
            throw new \InvalidArgumentException('Invalid role: ' . $requiredRole);
        }

        if ($userRole == $requiredRole) {
            // User has the required role or higher; allow access.
            return;
        } else {
            // Redirect or show an error message for unauthorized access.
            return redirect()->to('/unauthorized'); // Customize the redirect URL as needed.
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // After filter logic, if needed.
    }
}