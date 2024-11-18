<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:30',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!is_null($user)) {
            if (Hash::check($request->password, $user->password)) {
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                if (Auth::check()) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->back()->with(['message' => 'Credentials does not match', 'type' => 'info']);
                }
            } else {
                return redirect()->back()->with(['message' => 'Credentials does not match', 'type' => 'info']);
            }
        } else {
            return redirect()->back()->with(['message' => 'User not found', 'type' => 'info']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function studentLoginPage()
    {
        return view('student.login');
    }

    public function studentLoginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:30',
        ]);

        $user = Student::where('email', $request->email)->first();

        if (!is_null($user)) {
            if (Hash::check($request->password, $user->password)) {
                Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password]);
                if (Auth::guard('student')->check()) {
                    return redirect()->route('student.university.search');
                } else {
                    return redirect()->back()->with(['message' => 'Credentials does not match', 'type' => 'info']);
                }
            } else {
                return redirect()->back()->with(['message' => 'Credentials does not match', 'type' => 'info']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Student not found', 'type' => 'info']);
        }
    }

    public function studentLogout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.university.search');
    }
}
