<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Tag Management</h1>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="card ">
                    <div class="card-header">Tag</div>

                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tag Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $row)
                            <tr>
                                <th>{{$tags->firstItem()+$loop->index}}</th>
                                <td>{{$row->tag_name}}</td>
                                <td>
                                    <a href="{{url('/tag/edit/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('/tag/delete/'.$row->id)}}" class="btn btn-warning"
                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                      </table>
                        {{$tags->links()}}
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Form</div>
                        <div class="card-body">
                            <form action="{{route('addtag')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tag_name">Tag Name</label>
                                    <input type="text" class="form-control" name="tag_name">
                                </div>
                                @error('tag_name')
                                <div class="my-2">
                                    <span class="text-danger my-2">{{$message}}</span>
                                </div>
                                @enderror
                                <br>
                                <input type="submit" value="Create" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
