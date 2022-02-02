<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images = Image::paginate(20);
        return view('Image.index',compact('images'));
    }

    public function create(){
        return view('Image.create');
    }

    public function store(Request $request){
        //validation
        $request->validate([
            'image_name'=>'required|mimes:jpg,jpeng,png',
        ],
        [
        'image_name.max'=>"Max number of Letter is 255 ",
        'image_name.required'=>"Please insert Image",
        ]
    );

        $image_name = $request->file('image_name');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image_name->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        $upload_location = 'image/images/';
        $full_path = $upload_location.$img_name;


        Image::insert([
            'image_name'=>$full_path,
            'created_at'=>Carbon::now()
        ]);
        $image_name->move($upload_location,$img_name);

        return redirect()->route('imageindex')->with('success','Submit Successful');
    }
    public function delete($id) {
        $img = Image::find($id);
        unlink($img);
        $delete = Image::find($id)->Delete();
        return redirect()->route('imageindex')->with('success','Delete Success');
    }
}
