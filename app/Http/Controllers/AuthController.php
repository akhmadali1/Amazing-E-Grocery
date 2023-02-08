<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Hash;
class AuthController extends Controller
{

    public function profilePage()
    {
        $data = Auth::user();
        return view('profile', compact('data'));
    }

    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validateCredentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($request->remember) {
            Cookie::queue('email_cookie', $request->email, 120);
            Cookie::queue('password_cookie', $request->password, 120);
        }

        if (Auth::attempt($validateCredentials, true)) {
            $products = DB::table('products')->paginate(10);
            return view('welcome', compact('products'));
        }

        return redirect()->back()->withErrors(['auth' => 'Wrong Email/Password. Please Check Again']);
    }

    public function logout()
    {
        Auth::logout();
        return view('logout');
    }

    public function registerPage()
    {
        App::setlocale('en');
        return view('register');
    }
    public function registerPageIndo()
    {
        App::setlocale('id');
        return view('register');
    }

    public function register(Request $request)
    {
        $validateCredentials = $request->validate([
            'name' => 'required|max:25',
            'lname' => 'required|max:25',
            'email' => 'required|email',
            'role' => 'required',
            'gender' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png',
            'password' => 'required|min:8|regex:/[0-9]/',
            'confirmPassword' => 'required|same:password',
        ]);
        $user = new User();
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('image'), $fileName);
            $user->display_picture_link = $fileName;
        }
        $user->first_name = $request->name;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;
        try {
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['auth' => 'Email already exists']);
        }

        return redirect('/login');
    }
    public function update(Request $request, $id)
    {
        $validateCredentials = $request->validate([
            'name' => 'required|max:25',
            'lname' => 'required|max:25',
            'email' => 'required|email',
            'gender' => 'required',
            'file' => 'mimes:jpeg,jpg,png',
            'password' => 'required|min:8|regex:/[0-9]/',
            'confirmPassword' => 'required|same:password',
        ]);
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('image'), $fileName);
            $user->display_picture_link = $fileName;
        }
        $user = User::find($id);
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['auth' => 'password incorrect']);
        }
        $user->first_name = $request->name;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->save();
        return view('save');
    }
}
