<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Tag</div>
                    <div class="card-body">
                        <form action="{{ url('/tag/update/'.$tag->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tag_name">Tag Name</label>
                                <input type="text" class="form-control" name="tag_name" value="{{$tag->tag_name}}">
                            </div>
                            @error('tag_name')
                            <div class="my-2">
                                <span class="text-danger my-2">{{$message}}</span>
                            </div>
                            @enderror
                            <br>
                            <input type="submit" value="Update" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>


