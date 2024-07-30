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
            return redirect()->route('admin.view-advisors')->withErrors(['error' => 'Advisor not found.']);
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
