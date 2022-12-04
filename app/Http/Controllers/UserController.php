<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.user', [
            'users' => User::get()
        ]);
    }

    public function create()
    {

        return view('users.create', [
            'groups' => Group::orderBy('title', 'asc')->get()
        ]);
    }

    public function store(Request $request)
    {

        $formRequest = $request->validate([
            'group_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z- ]*$/|min:4',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users|numeric|min:11',
            'address' => 'required',
        ]);

        User::create($formRequest);
        return redirect()->route('users.index')->with('message', 'User created successfully!');
    }

    public function edit($id){
        return view('users.edit', [
            'user' => User::where('id', $id)->first(),
            'groups' => Group::all()
        ]);
    }

    public function update(Request $request, $id){

        $formRequest = $request->validate([
            'group_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z- ]*$/|min:4',
            'email' => 'required',
            'phone' => 'required|numeric|min:11',
            'address' => 'required',
        ]);



        User::where('id', $id)->update($formRequest);
        return redirect()->route('users.index')->with('message', 'User updated successfully!');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('message', 'User deleted successfully!');
    }
}
