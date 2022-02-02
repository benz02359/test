<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Album;
use App\Models\Album_tag;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        $albums=Album::paginate(20);
        return view('Album.index',compact('albums'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('Album.create',compact('categories','tags'));
    }

    public function store(Request $request){
        $request->validate([
            'album_name'=>'required|unique:albums|max:255',
            'category_id'=>'required|',
            ],
            [
                'album_name.required'=>"Please enter Album name",
                'album_name.max'=>"Max number of Letter is 255 ",
                'album_name.unique'=>"The Album name is already used",
                'category_id.required'=>'Please Select Category',
            ]
        );

        $album = new Album;
        $album->album_name = $request->album_name;
        $album->category_id = $request->category_id;
        $tags = $request->tag;
        $tagNames = [];
        $album->save();

        if (!empty($tags)) {
        foreach ($tags as $tagName)
        {
        $tag = Tag::firstOrCreate(['tag_name'=>$tagName]);
        if($tag)
        {
        $tagNames[] = $tag->id;
        }
        }
        $album->tags()->syncWithoutDetaching($tagNames);
        }
        //dd($tag);
        return redirect()->route('album')->with('success','Submit Successful');
    }

    public function show($id){
        $album = Album::find($id);
        $images = Image::where('album_id','=' ,$id)->get();
        return view('album.show',compact('album','images'));
    }

    public function uploadimg(Request $request, $id){
        $request->validate([
            'image_id'=>'required|mimes:jpg,jpeng,png',
        ],
    );

    $image_id = $request->file('image_id');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($image_id->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;

    $upload_location = 'image/images/';
    $full_path = $upload_location.$img_name;


    $imagedata = Image::create([
        'image_name'=>$full_path,
        'album_id'=>$id,
        'created_at'=>Carbon::now()
    ]);
    $imagedata->save();
        $image_id->move($upload_location,$img_name);
        //dd($imagedata->id,$id);

            $albumdata = Album::find($id)->update([
                'image_id'=>$imagedata->id,
            ]);
            return redirect()->back()->with('success','Submit Successful');
    }

    public function edit($id){
        $album = Album::find($id);
        $categories = Category::all();
        $albumcate = Category::where('id','=',$album->category_id)->first();
        $tags = Tag::all();
        return view('album.edit',compact('album','categories','tags','albumcate'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'album_name'=>'required|max:255', $request->album_name
            ],
            [
                'album_name.required'=>"Please enter Album name",
                'album_name.max'=>"Max number of Letter is 255 ",
                'album_name.unique'=>"The Album name is already used",
            ]
        );
        $update = Album::find($id)->update([
                    'album_name'=>$request->album_name,
                ]);
        return redirect()->route('album')->with('success','Submit Successful');
    }

    public function delete($id) {
        $delete = Album::find($id)->Delete();
        $album = Album::find($id);
        //$deletealbumtag = Album_tag::where('album_id','=',$id)->delete();
        return redirect()->route('album')->with('success','Delete Success');
    }
}
