<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn'))
        {
            return redirect()
                ->to('/login');
        }

        // Check the user's role
        $userRole = session()->get('role');

        // Define the allowed roles for the route
        $allowedRoles = $arguments['roles'] ?? [0, 1, 2, 3, 4];

        // If the user's role is not in the allowed roles, redirect or deny access
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->to('/denied'); // Redirect to a denied page or any other action
        }

        return $request;
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}