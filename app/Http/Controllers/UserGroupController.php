<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index(){

        return view('groups.group', [
            'groups' => Group::get()
        ]);
    }

    public function create(){
        return view('groups.create');
    }

    public function store(Request $request){

        $formRequest = $request->validate([
            'title' => 'required|unique:groups|regex:/^[a-zA-Z- ]*$/'
        ]);

        Group::create($formRequest);
        return redirect()->route('groups.index')->with('message', 'Group created successfully!');
    }

    public function edit($id){

        return view('groups.edit', [
            'group' => Group::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id){

        $formRequest = $request->validate([
            'title' => 'required|regex:/^[a-zA-Z- ]*$/'
        ]);

        Group::where('id', $id)->update($formRequest);
        return redirect()->route('groups.index')->with('message', 'Group updated successfully!');
    }

    public function destroy($id){
        Group::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Group deleted successfully!');
    }
}
