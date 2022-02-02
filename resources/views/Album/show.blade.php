<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Album {{ $album->album_name }} <a href="{{url('/album/edit/'.$album->id)}}" class="btn btn-primary">Edit</a></button></h1>
    <h2>Category : {{ $album->category->category_name}} </h2>
    <h2>@foreach ($album->tags as $tag)
        <a href="#" class="btn btn-primary">{{$tag->tag_name}}</a>
        @endforeach</td></h2>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="card" style="overflow-x:auto;">

                    @foreach ($images as $row )
                    <img src="{{asset($row['image_name'])}}"><br>
                    @endforeach



                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Upload Image</div>
                    <div class="card-body">
                        <form action="{{ url('/album/show/'.$album->id.'/uploadimg') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image_id">Image</label>
                                <input type="file" class="form-control" name="image_id">
                            </div>
                            @error('image_name')
                            <div class="my-2">
                                <span class="text-danger my-2">{{$message}}</span>
                            </div>
                            @enderror
                            <br>
                            <input type="submit" value="Upload" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
