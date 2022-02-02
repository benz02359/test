<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(20);
        return view('Category.index',compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories|max:255',
            ],
            [
                'category_name.required'=>"Please enter Category name",
                'category_name.max'=>"Max number of Letter is 255 ",
                'category_name.unique'=>"The Category name is already used",
            ]
        );
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('category')->with('success','Submit Successful');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name'=>'required|max:255',
            ],
            [
                'category_name.required'=>"Please enter Album name",
                'category_name.max'=>"Max number of Letter is 255 ",
                'category_name.unique'=>"The Album name is already used",
            ]
        );
        $update = Category::find($id)->update([
            'category_name'=>$request->category_name,
        ]);
        return redirect()->route('category')->with('success','Submit Successful');
    }

    public function delete($id) {
        $category = Category::find($id)->Delete();
        return redirect()->route('category')->with('success','Delete Success');
    }
}
