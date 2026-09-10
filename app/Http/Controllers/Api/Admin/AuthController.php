<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Admin login.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
            ],
        ]);

        if (!Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ])) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }

        $user = $request->user();

        // Create API token
        $token = $user
            ->createToken('admin-token')
            ->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    /**
     * Get authenticated admin.
     */
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    /**
     * Logout current admin.
     */
    public function logout(Request $request)
    {
        $request->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'message' => 'Logout successful.',
        ]);
    }
}