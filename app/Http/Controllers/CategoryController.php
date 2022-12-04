<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return view('categories.category', [
            'categories' => Category::all()
        ]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){

        $formRequest = $request->validate([
            'title' => 'required|unique:groups|regex:/^[a-zA-Z- ]*$/'
        ]);

        Category::create($formRequest);
        return redirect()->route('category.index')->with('message', 'Category created successfully!');
    }

    public function edit($id){

        return view('categories.edit', [
            'category' => Category::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id){

        $formRequest = $request->validate([
            'title' => 'required|regex:/^[a-zA-Z- ]*$/'
        ]);

        Category::where('id', $id)->update($formRequest);
        return redirect()->route('category.index')->with('message', 'Category updated successfully!');
    }

    public function destroy($id){
        Category::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Category deleted successfully!');
    }
}
