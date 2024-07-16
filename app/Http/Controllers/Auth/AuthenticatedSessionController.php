<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TransactionController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
 
    
     public function store(LoginRequest $request)
{
    try {
        $request->authenticate(); // Authenticate user

        $user = $request->user(); // Get authenticated user

        $token = $user->createToken('AuthToken')->plainTextToken; // Generate authentication token

        return response()->json([
            'user' => $user, // Return user details
            'token' => $token, // Return authentication token
        ]);
    } catch (ValidationException $e) {
        return response()->json(['error' => 'Authentication failed.'], 401); // Handle validation errors
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500); // Handle other exceptions
    }
}
  

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
