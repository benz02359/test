<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create new Album</div>
            <div class="card-body">
                <form action="{{route('addalbum')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="album_name">Album Name</label>
                        <input type="text" class="form-control" name="album_name">
                    </div>
                    @error('album_name')
                    <div class="my-2">
                        <span class="text-danger my-2">{{$message}}</span>
                    </div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $cate)
                                    <option value="{{$cate->id}}" >{{$cate->category_name}}</option>
                            @endforeach

                          </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for='formrow-email-input' class='control-label'>Tags</label>
                            <select class="form-control select-tags" name="tag[]" id="tags" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <input type="submit" value="Create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
