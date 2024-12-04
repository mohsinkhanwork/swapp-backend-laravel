<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Broadcast;

class CustomBroadcastingAuthController extends Controller
{
    public function store(Request $request)
    {
        // Get the Sanctum token from the Authorization header
        $authorizationHeader = $request->header('Authorization');
        $token = null;

        if ($authorizationHeader && preg_match('/Bearer\s(\S+)/', $authorizationHeader, $matches)) {
            $token = $matches[1]; // Extract the token
        }

        // Check if the token is present
        if (!$token) {
            return response()->json(['message' => 'Authorization token not provided.'], 401);
        }

        Log::debug('token', [
            'token' => $token
        ]);

        // Use the token to authenticate the user
        $user = $this->getUserBySanctumToken($token);

        Log::debug('user from token', [
            'user' => $user,
        ]);

        if (!$user) {
            return response()->json(['message' => 'Invalid token or user not found.'], 401);
        }

        // Set the user as the authenticated user for this request
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        Log::debug('ran set user resolver');

        if ($request->hasSession()) {
            $request->session()->reflash();
        }

        Log::debug('ran reflash');

        return Broadcast::auth($request);
    }

    private function getUserBySanctumToken($token)
    {
        // Retrieve user by the token. You might need to modify this based on your database setup.
        $accessToken = PersonalAccessToken::findToken($token);
        if (!$accessToken) {
            Log::debug('no access token');
            abort(401, 'Invalid token.');
        }

        return $accessToken->tokenable;
    }
}
