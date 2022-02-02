<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Album Management <a href="{{ route('category') }}" class="btn btn-primary">Category</a><a href="{{ route('tag') }}" class="btn btn-primary">Tag</a></h1>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="card ">
                    <div class="card-header">Album <a href="{{ route("createalbum") }}"><button class="btn btn-success" >+Album </button></a><a href="{{ route("createimage") }}"><button class="btn btn-primary">+Image</button></a></div>

                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Album Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($albums as $row)
                            <tr>
                                <th>{{$albums->firstItem()+$loop->index}}</th>
                                <td><a href="{{url('/album/show/'.$row->id)}}">{{$row->album_name}}</a></td>
                                <td>{{ $row->category->category_name }}</td>
                                <td>@foreach ($row->tags as $tag)
                                    <a href="#" class="btn btn-primary">{{$tag->tag_name}}</a>
                                    @endforeach</td>
                                <td>
                                    <a href="{{url('/album/edit/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('/album/delete/'.$row->id)}}" class="btn btn-warning"
                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                      </table>
                        {{$albums->links()}}
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
