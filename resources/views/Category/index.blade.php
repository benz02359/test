<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Category Management </h1>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="card ">
                    <div class="card-header">Category</div>

                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $row)
                            <tr>
                                <th>{{$categories->firstItem()+$loop->index}}</th>
                                <td>{{$row->category_name}}</td>
                                <td>
                                    <a href="{{url('/category/edit/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('/category/delete/'.$row->id)}}" class="btn btn-warning"
                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                      </table>
                        {{$categories->links()}}
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Form</div>
                        <div class="card-body">
                            <form action="{{route('addcategory')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name">
                                </div>
                                @error('category_name')
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
