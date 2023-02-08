<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function maintanancePage()
    {
        $users = User::all();
        return view('accountmanage', compact('users'));
    }
    public function maintananceAcc($id)
    {
        $roles = array("Admin", "User");
        $data = User::find($id);
        return view('accountdetail', compact('data','roles'));
    }
    public function changerole(Request $request, $id)
    {
        $validateCredentials = $request->validate([
            'role' => 'required',
        ]);
        $user = User::find($id);
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('message', 'Success change the role');
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('message', 'Success deleted account');
    }

}
