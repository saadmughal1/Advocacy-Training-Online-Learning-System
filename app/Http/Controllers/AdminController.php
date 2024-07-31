<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function createAdvisorAccount(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:advisors,username',
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num:ascii',
        ]);

        DB::table('advisors')->insert([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Advisor account created successfully.');
    }

    public function viewAdvisorAccounts()
    {
        $advisors = DB::table('advisors')->get();
        return view('admin.view-advisors', ['advisors' => $advisors]);
    }

    public function deleteAdvisor(string $id)
    {
        $deleted = DB::table('advisors')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.view-advisors')->with('message', 'Advisor deleted successfully.');
        } else {
            return redirect()->route('admin.view-advisors')->with(['error' => 'Advisor not found.']);
        }
    }

    public function editAdvisorAccount(string $id)
    {
        $advisor = DB::table('advisors')->where('id', $id)->first();

        if (!$advisor) {
            return redirect()->route('admin.view-advisors')->with('error', 'Advisor not found.');
        }

        return view('admin.edit-advisor-account', ['advisor' => $advisor]);
    }

    public function saveEditAdvisorAccount(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'username' => 'required|string|unique:advisors,username,' . $id,
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num',
        ]);

        $updateData = [
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
        ];

        DB::table('advisors')
            ->where('id', $id)
            ->update($updateData);

        return redirect()->route('admin.view-advisors')
            ->with('message', 'Advisor account updated successfully.');
    }
    public function createStudentAccount(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:students,username',
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num:ascii',
        ]);

        DB::table('students')->insert([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Student account created successfully.');
    }

    public function viewStudentAccounts()
    {
        $students = DB::table('students')->get();
        return view('admin.view-students', ['students' => $students]);
    }

    public function deleteStudent(string $id)
    {
        $deleted = DB::table('students')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.view-students')->with('message', 'Student deleted successfully.');
        } else {
            return redirect()->route('admin.view-students')->with(['error' => 'Student not found.']);
        }
    }

    public function editStudentAccount(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        if (!$student) {
            return redirect()->route('admin.view-students')->with('error', 'Student not found.');
        }

        return view('admin.edit-student-account', ['student' => $student]);
    }

    public function saveEditStudentAccount(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'username' => 'required|string|unique:students,username,' . $id,
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num',
        ]);

        $updateData = [
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
        ];

        DB::table('students')
            ->where('id', $id)
            ->update($updateData);

        return redirect()->route('admin.view-students')
            ->with('message', 'Student account updated successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard("admin")->attempt($credentials)) {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('error', 'Invalid Username or password');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
