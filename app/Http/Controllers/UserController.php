<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function getAllUsers(Request $request) {
        try {
            $sortParam = $request->query('sort', '');

            $sortDirection = Str::startsWith($sortParam, '-') ? 'desc' : 'asc';
            $columnName = ltrim($sortParam, '-');

            if (!in_array($sortDirection, ['asc', 'desc'])) {
                throw new \InvalidArgumentException('Invalid sort direction');
            }

            $users = DB::table('users')
            ->orderBy($columnName, $sortDirection)
            ->get();

            return response()->json(["users" => $users]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    function getUserById($id) {
        try {
            $user = User::find($id);
            return response()->json(["user" => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    function createUser(Request $request) {
        try {
            $request->validate([
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'hobby' => 'required',
            ]);
            $user = new User;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->hobby = $request->hobby;
            $user->save();
            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    function updateUser(Request $request, $id) {
        try {
            $request->validate([
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'hobby' => 'required',
            ]);
            $user = User::find($id);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->hobby = $request->hobby;
            $user->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    function deleteUser($id) {
        try {
            $user = User::find($id);
            $user->delete();
            return response()->json(["success" => true, 'user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
