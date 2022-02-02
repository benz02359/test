<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Image Management</h1>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                @if (session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                @endif
                <div class="card ">
                    <div class="card-header">Image</div>

                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $row)
                            <tr>
                                <th>{{$images->firstItem()+$loop->index}}</th>
                                <td><img src="{{$row->image_name}}" alt="" width="100px" height="100px"></td>
                                <td>
                                    <a href="{{url('/image/delete/'.$row->id)}}" class="btn btn-warning"
                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                      </table>
                        {{$images->links()}}
                </div>
            </div>
            </div>
        </div>
</x-app-layout>
