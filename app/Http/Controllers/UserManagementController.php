<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuser;

class UserManagementController extends Controller
{
    public function addView(){
        return view('usermanagement.add_newadmin', [
            'title' => 'Add New Admin'
        ]);
    }

    public function addUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255|alpha',
            'email' => 'required|email:dns|unique:tuser',
            'username' => 'required|min:4|max:255|unique:tuser',
            'password' => 'required|min:6|max:255',
            'access' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Tuser::create($validatedData);

        return redirect('login');

        // dd($request);
        //return $request->all();
    }
}
