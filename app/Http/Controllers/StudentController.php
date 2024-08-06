<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = DB::table('students')->where('username', $credentials['username'])->first();

        if ($student && $student->password === $credentials['password']) {
            Auth::guard('student')->loginUsingId($student->id);
            return redirect()->route('student.home');
        }

        return redirect()->back()->with('error', 'Invalid Username or Password');
    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
}
