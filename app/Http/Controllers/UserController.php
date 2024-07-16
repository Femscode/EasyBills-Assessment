<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the all users.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create a new user with validated data
            $data = $request->all();
            $user = User::create([
                'uuid' => Str::uuid(),
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);

            // Return success response with user data
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'data' => new UserResource($user),
            ], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur during user creation
            return response()->json([
                'status' => false,
                'message' => 'User creation failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display a single user
     */
    public function show(User $user)
    {
        try {
            //Attempt to get the user details
            return response()->json([
                'status' => true,
                'message' => 'User Details Fetched successfully',
                'data' => new UserResource($user->load('transactions')),
            ], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur 
            return response()->json([
                'status' => false,
                'message' => 'User Details Not Fetched',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update a single user.
     */
    public function update(Request $request, User $user)
    {
        try {

            //Attempt to updte the user
            $user->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'User Updated successfully',
                'data' => new UserResource($user),
            ], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur 
            return response()->json([
                'status' => false,
                'message' => 'User Not Updated',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove a user
     */
    public function destroy(user $user)
    {
        try {
            $user->delete();
            return response()->json([
                'status' => true,
                'message' => 'User Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur 
            return response()->json([
                'status' => false,
                'message' => 'User deletion failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
