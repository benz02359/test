<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::paginate(20);
        return view('Tag.index',compact('tags'));
    }

    public function store(Request $request){
        $request->validate([
            'tag_name'=>'required|unique:tags|max:255',
            ],
            [
                'tag_name.required'=>"Please enter Tag name",
                'tag_name.max'=>"Max number of Letter is 255 ",
                'tag_name.unique'=>"The Tag name is already used",
            ]
        );
        $tag = new Tag;
        $tag->tag_name = $request->tag_name;
        $tag->save();
        return redirect()->route('tag')->with('success','Submit Successful');
    }

    public function edit($id){
        $tag = Tag::find($id);
        return view('Tag.edit',compact('tag'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'tag_name'=>'required|max:255',
            ],
            [
                'tag_name.required'=>"Please enter Tag name",
                'tag_name.max'=>"Max number of Letter is 255 ",
                'tag_name.unique'=>"The Tag name is already used",
            ]
        );
        $update = Tag::find($id)->update([
            'tag_name'=>$request->tag_name,
        ]);
        return redirect()->route('tag')->with('success','Submit Successful');
    }

    public function delete($id) {
        $tag = Tag::find($id)->Delete();
        return redirect()->route('tag')->with('success','Delete Success');
    }
}
